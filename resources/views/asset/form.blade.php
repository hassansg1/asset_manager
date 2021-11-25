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
                            <label for="{{ isset($item) ? $item->id:'' }}short_name"
                                   class="form-label required">Parent</label>
                            <select class="form-control select2" name="parent"
                                    id="{{ isset($item) ? $item->id:'' }}short_name">
                                <option>Search by Name</option>
                                @if(checkIfSuperAdmin())
                                    <optgroup label="Company">
                                        @foreach(getCompanies() as $row)
                                            <option
                                                {{ isset($item) && $item->parentable_type == \App\Models\Company::class && $item->parentable_id == $row->id ? 'selected' : '' }}
                                                value="{{\App\Models\Company::class}}??{{ $row->id }}">{{ $row->rec_id }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Unit">
                                        @foreach(\App\Models\Unit::all() as $row)
                                            <option
                                                {{ isset($item) && $item->parentable_type == \App\Models\Unit::class && $item->parentable_id == $row->id ? 'selected' : '' }}
                                                value="{{\App\Models\Unit::class}}??{{ $row->id }}">{{ $row->rec_id }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Site">
                                        @foreach(\App\Models\Site::all() as $row)
                                            <option
                                                {{ isset($item) && $item->parentable_type == \App\Models\Site::class && $item->parentable_id == $row->id ? 'selected' : '' }}
                                                value="{{\App\Models\Site::class}}??{{ $row->id }}">{{ $row->rec_id }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="SubSite">
                                        @foreach(\App\Models\SubSite::all() as $row)
                                            <option
                                                {{ isset($item) && $item->parentable_type == \App\Models\SubSite::class && $item->parentable_id == $row->id ? 'selected' : '' }}
                                                value="{{\App\Models\SubSite::class}}??{{ $row->id }}">{{ $row->rec_id }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Building">
                                        @foreach(\App\Models\Building::all() as $row)
                                            <option
                                                {{ isset($item) && $item->parentable_type == \App\Models\Building::class && $item->parentable_id == $row->id ? 'selected' : '' }}
                                                value="{{\App\Models\Building::class}}??{{ $row->id }}">{{ $row->rec_id }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Room">
                                        @foreach(\App\Models\Room::all() as $row)
                                            <option
                                                {{ isset($item) && $item->parentable_type == \App\Models\Room::class && $item->parentable_id == $row->id ? 'selected' : '' }}
                                                value="{{\App\Models\Room::class}}??{{ $row->id }}">{{ $row->rec_id }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Cabinet">
                                        @foreach(\App\Models\Cabinet::all() as $row)
                                            <option
                                                {{ isset($item) && $item->parentable_type == \App\Models\Cabinet::class && $item->parentable_id == $row->id ? 'selected' : '' }}
                                                value="{{\App\Models\Cabinet::class}}??{{ $row->id }}">{{ $row->rec_id }}</option>
                                        @endforeach
                                    </optgroup>
                                @else
                                    @foreach(\Illuminate\Support\Facades\Auth::user()->locations as $location)
                                        @can('viewassets'.$location->self_permission)
                                            <option
                                                value="{{ $location->combine_name }}">{{ $location->self_name }}
                                            </option>
                                        @endcan
                                    @endforeach
                                @endif
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
                        <label for="{{ isset($item) ? $item->id:'' }}category" class="form-label">Category</label>
                        <select class="form-select form-select-input" name="category"
                                id="{{ isset($item) ? $item->id:'' }}category">
                            @foreach(\App\Models\AssetCategories::all() as $category)
                                <option value=""></option>
                                <option
                                    {{ $category->id == (isset($item) ? $item->category:old('last_name') ?? '') ? 'selected' : ''  }}
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}description"
                                   class="form-label">Description</label>
                            <input type="text" value="{{ isset($item) ? $item->description:old('description') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}description"
                                   name="description">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}function" class="form-label">Function</label>
                            <select class="form-select form-select-input" name="function"
                                    id="{{ isset($item) ? $item->id:'' }}function">
                                @foreach(\App\Models\AssetFunction::all() as $function)
                                    <option value=""></option>
                                    <option
                                        {{ $function->id == (isset($item) ? $item->function:old('last_name') ?? '') ? 'selected' : ''  }}
                                        value="{{ $function->id }}">{{ $function->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}make" class="form-label">Make</label>
                            <select class="form-select form-select-input" name="make"
                                    id="{{ isset($item) ? $item->id:'' }}make">
                                @foreach(\App\Models\AssetMake::all() as $make)
                                    <option value=""></option>
                                    <option
                                        {{ $make->id == (isset($item) ? $item->make:old('last_name') ?? '') ? 'selected' : ''  }}
                                        value="{{ $make->id }}">{{ $make->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}model" class="form-label">Model</label>
                            <input type="text" value="{{ isset($item) ? $item->model:old('model') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}model" name="model">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}part_number" class="form-label">Part
                                Number</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->part_number:old('part_number') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}part_number"
                                   name="part_number">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}code" class="form-label">Code</label>
                            <input type="text" value="{{ isset($item) ? $item->code:old('code') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}code" name="code">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}security_zone" class="form-label">Security
                                Zone</label>
                            <select class="form-select form-select-input" name="security_zone"
                                    id="{{ isset($item) ? $item->id:'' }}security_zone">
                                @foreach(\App\Models\AssetSecurityZone::all() as $security_zone)
                                    <option value=""></option>
                                    <option
                                        {{ $security_zone->id == (isset($item) ? $item->security_zone:old('last_name') ?? '') ? 'selected' : ''  }}
                                        value="{{ $security_zone->id }}">{{ $security_zone->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}serial_number" class="form-label">Serial
                                Number</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->serial_number:old('serial_number') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}serial_number"
                                   name="serial_number">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
