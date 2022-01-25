@include('components.form_errors')
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $heading }} Information</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}parent"
                                   class="form-label required">Parent</label>
                            <select class="form-control select2" name="parent_id"
                                    id="{{ isset($item) ? $item->id:'' }}parent" required>
                                <option value="">Search by Name</option>
                                <optgroup label="Company">
                                    @foreach(getCompanies() as $row)
                                        <option
                                            {{ isset($item) && $item->parent_id == $row->id ? 'selected' : '' }}
                                            value="{{ $row->id }}">{{ $row->show_name }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Unit">
                                    @foreach(\App\Models\Unit::all() as $row)
                                        <option
                                            {{ isset($item) && $item->parent_id == $row->id ? 'selected' : '' }}
                                            value="{{ $row->id }}">{{ $row->show_name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}rec_id" class="form-label required">ID</label>
                            <input type="text" value="{{ isset($item) ? $item->rec_id:old('rec_id') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}rec_id" name="rec_id"
                                   required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}name" class="form-label">Name</label>
                            <input type="text" value="{{ isset($item) ? $item->name:old('name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}name"
                                   name="name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}arabic_name" class="form-label">Arabic
                                Name</label>
                            <input type="text" value="{{ isset($item) ? $item->arabic_name:old('arabic_name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}arabic_name"
                                   name="arabic_name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}description" class="form-label">Description</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->description:old('description') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}description"
                                   name="description">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}location_google_link" class="form-label">Location(Google
                                Link)</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->location_google_link:old('location_google_link') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}location_google_link"
                                   name="location_google_link">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}location_dec_coordinate" class="form-label">Coordinates(DEC)</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->location_dec_coordinate:old('location_dec_coordinate') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}location_dec_coordinate"
                                   name="location_dec_coordinate">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}location_deg_coordinate" class="form-label">Coordinates(DEG)</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->location_deg_coordinate:old('location_deg_coordinate') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}location_deg_coordinate"
                                   name="location_deg_coordinate">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}descriptive_location" class="form-label">Descriptive
                                Location</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->descriptive_location:old('descriptive_location') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}descriptive_location"
                                   name="descriptive_location">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}main_process_equipment" class="form-label">Main
                                Process / Equipment</label>
                            <textarea class="form-control" name="main_process_equipment"
                                      id="{{ isset($item) ? $item->id:'' }}main_process_equipment" cols="30"
                                      rows="5">{{ isset($item) ? $item->main_process_equipment:old('main_process_equipment') ?? ''  }}  </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
