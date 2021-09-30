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
                            <select class="form-control select2" name="parent" id="{{ isset($item) ? $item->id:'' }}short_name">
                                <option>Search by Name</option>
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
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}name" class="form-label required">Name</label>
                            <input type="text" value="{{ isset($item) ? $item->name:old('name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}name"
                                   name="name" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}arabic_name" class="form-label">Arabic Name</label>
                            <input type="text" value="{{ isset($item) ? $item->arabic_name:old('arabic_name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}arabic_name" name="arabic_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}code" class="form-label">Code</label>
                            <input type="text" value="{{ isset($item) ? $item->code:old('code') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}code" name="code">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}existing_code" class="form-label">Existing Code</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->existing_code:old('existing_code') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}existing_code"
                                   name="existing_code">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}descriptive_location" class="form-label">Descriptive Location</label>
                            <input type="text" value="{{ isset($item) ? $item->descriptive_location:old('descriptive_location') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}descriptive_location" name="descriptive_location">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}location_dec_coordinate" class="form-label">Coordinates(DEC)</label>
                            <input type="text" value="{{ isset($item) ? $item->location_dec_coordinate:old('location_dec_coordinate') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}location_dec_coordinate" name="location_dec_coordinate">
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
                            <label for="{{ isset($item) ? $item->id:'' }}location_google_link" class="form-label">Location(Google Link)</label>
                            <input type="text" value="{{ isset($item) ? $item->location_google_link:old('location_google_link') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}location_google_link" name="location_google_link">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}remote_site" class="form-label">Remote Site</label>
                            <input type="text" value="{{ isset($item) ? $item->remote_site:old('remote_site') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}remote_site" name="remote_site">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}operator_control_center_site" class="form-label">Operator Control Site</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->operator_control_center_site:old('operator_control_center_site') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}operator_control_center_site"
                                   name="operator_control_center_site">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}local_scada_site" class="form-label">Local Scada Site</label>
                            <input type="text" value="{{ isset($item) ? $item->local_scada_site:old('local_scada_site') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}local_scada_site" name="local_scada_site">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}central_scada_site" class="form-label">Central Scada Site</label>
                            <input type="text" value="{{ isset($item) ? $item->central_scada_site:old('central_scada_site') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}central_scada_site" name="central_scada_site">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}function" class="form-label">Function</label>
                            <input type="text" value="{{ isset($item) ? $item->function:old('function') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}function" name="function">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
