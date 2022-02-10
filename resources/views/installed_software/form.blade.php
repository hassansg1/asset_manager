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
                        <label for="{{ isset($item) ? $item->id:'' }}asset_id" class="form-label">Select Asset</label>
                        <select class="form-select form-select-input" name="asset_id"
                                id="{{ isset($item) ? $item->id:'' }}asset_id">
                            @foreach(\App\Models\Computer::all() as $var)
                                <option value=""></option>
                                <option
                                    {{ $var->id == (isset($item) ? $item->asset_id:old('asset_id') ?? '') ? 'selected' : ''  }}
                                    value="{{ $var->id }}">{{ $var->show_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="{{ isset($item) ? $item->id:'' }}software_id" class="form-label">Select
                            Software</label>
                        <select class="form-select form-select-input" name="software_id"
                                id="{{ isset($item) ? $item->id:'' }}software_id">
                            @foreach(\App\Models\Software::all() as $var)
                                <option value=""></option>
                                <option
                                    {{ $var->id == (isset($item) ? $item->software_id:old('software_id') ?? '') ? 'selected' : ''  }}
                                    value="{{ $var->id }}">{{ $var->name }} {{ $var->version }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
