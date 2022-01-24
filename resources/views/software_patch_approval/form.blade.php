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
                        <label for="{{ isset($item) ? $item->id:'' }}software_id" class="form-label">Select
                            Software</label>
                        <select multiple class="form-select form-select-input" name="software_id"
                                id="{{ isset($item) ? $item->id:'' }}software_id">
                            @foreach(\App\Models\Software::all() as $var)
                                <option value=""></option>
                                <option
                                    {{ $var->id == (isset($item) ? $item->software_id:old('software_id') ?? '') ? 'selected' : ''  }}
                                    value="{{ $var->id }}">{{ $var->name }} {{ $var->version }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}name" class="form-label required">Name</label>
                            <input type="text" value="{{ isset($item) ? $item->name:old('name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}name" name="name" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}description"
                                   class="form-label required">Description</label>
                            <input type="text" value="{{ isset($item) ? $item->description:old('description') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}description"
                                   name="description" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}release_date"
                                   class="form-label required">Release Date</label>
                            <input type="date"
                                   value="{{ isset($item) ? $item->release_date:old('release_date') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}release_date"
                                   name="release_date" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Is Required</label>
                            <br>
                            <input type="checkbox" id="switch3" switch="bool" name="is_required"
                                {{ isset($item) && $item->is_required == 1 ? 'checked':''  }}
                            />
                            <label for="switch3" data-on-label="Yes"
                                   data-off-label="No"></label>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Is Critical</label>
                            <br>
                            <input type="checkbox" id="switch4" switch="bool" name="is_critical"
                                {{ isset($item) && $item->is_critical == 1 ? 'checked':''  }}
                            />
                            <label for="switch4" data-on-label="Yes"
                                   data-off-label="No"></label>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
