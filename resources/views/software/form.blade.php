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
                                    <optgroup label="Cabinet">
                                        @foreach(\App\Models\Cabinet::all() as $row)
                                            <option
                                                    {{ isset($item) && $item->parentable_type == \App\Models\Cabinet::class && $item->parentable_id == $row->id ? 'selected' : '' }}
                                                    value="{{\App\Models\Cabinet::class}}??{{ $row->id }}">{{ $row->show_name }}</option>
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
                            <label for="{{ isset($item) ? $item->id:'' }}oem" class="form-label required">OEM</label>
                            <input type="text" value="{{ isset($item) ? $item->oem:old('oem') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}oem"
                                   name="oem" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label for="{{ isset($item) ? $item->id:'' }}vendor" class="form-label">Vendor</label>
                        <select class="form-select form-select-input" name="vendor"
                                id="{{ isset($item) ? $item->id:'' }}vendor">
                            @foreach(\App\Models\AssetCategories::all() as $category)
                                <option value=""></option>
                                <option
                                        {{ $category->id == (isset($item) ? $item->vendor:old('last_name') ?? '') ? 'selected' : ''  }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}name"
                                   class="form-label">Name</label>
                            <input type="text" value="{{ isset($item) ? $item->name:old('name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}name"
                                   name="name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}version"
                                   class="form-label">Version</label>
                            <input type="text" value="{{ isset($item) ? $item->version:old('version') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}version"
                                   name="version">
                        </div>
                    </div>
                    <div class=" col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}description"
                                   class="form-label">Descrption</label>
                            <input type="text" value="{{ isset($item) ? $item->description:old('description') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}description"
                                   name="description">
                        </div>
                    </div>
                </div>
                <div class="row">
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
