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
                            <label for="{{ isset($item) ? $item->id:'' }}short_name" class="form-label required">Parent</label>
                            <select class="form-control select2" name="parent" id="{{ isset($item) ? $item->id:'' }}short_name" required>
                                <option value="">Search by Name</option>
                                <optgroup label="Company">
                                    @foreach(getCompanies() as $row)
                                        <option
                                            {{ isset($item) && $item->parentable_type == \App\Models\Company::class && $item->parentable_id == $row->id ? 'selected' : '' }}
                                            value="{{\App\Models\Company::class}}??{{ $row->id }}">{{ $row->show_name }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Unit">
                                    @foreach(\App\Models\Unit::all() as $row)
                                        <option
                                            {{ isset($item) && $item->parentable_type == \App\Models\Unit::class && $item->parentable_id == $row->id ? 'selected' : '' }}
                                            value="{{\App\Models\Unit::class}}??{{ $row->id }}">{{ $row->show_name }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Site">
                                    @foreach(\App\Models\Site::all() as $row)
                                        <option
                                            {{ isset($item) && $item->parentable_type == \App\Models\Site::class && $item->parentable_id == $row->id ? 'selected' : '' }}
                                            value="{{\App\Models\Site::class}}??{{ $row->id }}">{{ $row->show_name }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="SubSite">
                                    @foreach(\App\Models\SubSite::all() as $row)
                                        <option
                                            {{ isset($item) && $item->parentable_type == \App\Models\SubSite::class && $item->parentable_id == $row->id ? 'selected' : '' }}
                                            value="{{\App\Models\SubSite::class}}??{{ $row->id }}">{{ $row->show_name }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Building">
                                    @foreach(\App\Models\Building::all() as $row)
                                        <option
                                            {{ isset($item) && $item->parentable_type == \App\Models\Building::class && $item->parentable_id == $row->id ? 'selected' : '' }}
                                            value="{{\App\Models\Building::class}}??{{ $row->id }}">{{ $row->show_name }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Room">
                                    @foreach(\App\Models\Room::all() as $row)
                                        <option
                                            {{ isset($item) && $item->parentable_type == \App\Models\Room::class && $item->parentable_id == $row->id ? 'selected' : '' }}
                                            value="{{\App\Models\Room::class}}??{{ $row->id }}">{{ $row->show_name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}rec_id" class="form-label required">Cabinet ID</label>
                            <input type="text" value="{{ isset($item) ? $item->rec_id:old('rec_id') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}rec_id" name="rec_id" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}name" class="form-label">Cabinet Name</label>
                            <input type="text" value="{{ isset($item) ? $item->name:old('name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}name"
                                   name="name">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
