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
                        <label for="{{ isset($item) ? $item->id:'' }}vendor_id" class="form-label">Select Zone</label>
                        <select class="form-select form-select-input" name="vendor_id"
                                id="{{ isset($item) ? $item->id:'' }}vendor_id">
{{--                            @foreach(\App\Models\Vendor::all() as $var)--}}
{{--                                <option value=""></option>--}}
{{--                                <option--}}
{{--                                    {{ $var->id == (isset($item) ? $item->vendor_id:old('vendor_id') ?? '') ? 'selected' : ''  }}--}}
{{--                                    value="{{ $var->id }}">{{ $var->show_name }}</option>--}}
{{--                            @endforeach--}}
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}rec_id" class="form-label required">Patch Duration</label>
                            <input type="text" value="{{ isset($item) ? $item->rec_id:old('rec_id') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}rec_id" name="rec_id" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}rec_id" class="form-label required">Antivirus Duration</label>
                            <input type="text" value="{{ isset($item) ? $item->rec_id:old('rec_id') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}rec_id" name="rec_id" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
