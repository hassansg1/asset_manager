<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}short_name" class="form-label required">Asset
                Parent</label>
            @include('hierarchy.create_drop_down',['type' => 'assets','model'=> $model])

        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}rec_id" class="form-label required">Asset ID</label>
            <input type="text" value="{{ isset($item) ? $item->rec_id:old('rec_id') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}rec_id"
                   name="rec_id" required>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}name" class="form-label">Asset Name</label>
            <input type="text" value="{{ isset($item) ? $item->name:old('name') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}name"
                   name="name">
        </div>
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
            <label for="{{ isset($item) ? $item->id:'' }}function" class="form-label required">Asset Function</label>
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
                <option value="">-Select hardware make-</option>
                @foreach(\App\Models\HardwareLegacy::groupBy('hardware_make')->get() as $make)
                    <option value=""></option>
                    <option
                        {{ $make->id == (isset($item) ? $item->make:old('last_name') ?? '') ? 'selected' : ''  }}
                        value="{{ $make->id }}">{{ $make->hardware_make }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}model" class="form-label">Model</label>
{{--            <input type="text" value="{{ isset($item) ? $item->model:old('model') ?? ''  }}"--}}
{{--                   class="form-control" id="{{ isset($item) ? $item->id:'' }}model" name="model">--}}
            <select class="form-control select2" id="model" name="model">
                <option value="">-Select hardware Model-</option>
                @if(isset($item))
                    @foreach(\App\Models\HardwareLegacy::whereNotNull('hardware_model')->groupBy('hardware_model')->get() as $make)
                        <option
                            {{ $make->id == (isset($item) ? $item->model:old('last_name') ?? '') ? 'selected' : ''  }}
                            value="{{ $make->id }}">{{ $make->hardware_model }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}part_number" class="form-label">Part
                Number</label>
            <select class="form-control select2" id="part_number" name="part_number">
                <option value="">-Select Part Number-</option>
                @if(isset($item))
                    @foreach(\App\Models\HardwareLegacy::get() as $make)
                        <option
                            {{ $make->id == (isset($item) ? $item->part_number:old('last_name') ?? '') ? 'selected' : ''  }}
                            value="{{ $make->id }}">{{ $make->part_number }}</option>
                    @endforeach
                @endif
            </select>
{{--            <input type="text"--}}
{{--                   value="{{ isset($item) ? $item->part_number:old('part_number') ?? ''  }}"--}}
{{--                   class="form-control" id="{{ isset($item) ? $item->id:'' }}part_number"--}}
{{--                   name="part_number">--}}
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
            <label for="{{ isset($item) ? $item->id:'' }}comment" class="form-label">Comments</label>
            <input type="text"
                   value="{{ isset($item) ? $item->comment:old('comment') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}comment"
                   name="comment">
        </div>
    </div>
</div>
