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
                        <label for="{{ isset($item) ? $item->id:'' }}vendor_id" class="form-label">Select Vendor</label>
                        <select class="form-select form-select-input" name="vendor_id"
                                id="{{ isset($item) ? $item->id:'' }}vendor_id">
                            @foreach(\App\Models\Vendor::all() as $var)
                                <option value=""></option>
                                <option
                                    {{ $var->id == (isset($item) ? $item->vendor_id:old('vendor_id') ?? '') ? 'selected' : ''  }}
                                    value="{{ $var->id }}">{{ $var->show_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="{{ isset($item) ? $item->id:'' }}patch_id" class="form-label">Select
                            Patch</label>
                        <select class="form-select form-select-input" name="patch_id"
                                id="{{ isset($item) ? $item->id:'' }}patch_id">
                            @foreach(\App\Models\Patch::all() as $var)
                                <option value=""></option>
                                <option
                                    {{ $var->id == (isset($item) ? $item->patch_id:old('patch_id') ?? '') ? 'selected' : ''  }}
                                    value="{{ $var->id }}">{{ $var->software->name }} {{ $var->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Approved</label>
                            <br>
                            <input type="checkbox" id="switch3" switch="bool" name="approved"
                                {{ isset($item) && $item->approved == 1 ? 'checked':''  }}
                            />
                            <label for="switch3" data-on-label="Yes"
                                   data-off-label="No"></label>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
