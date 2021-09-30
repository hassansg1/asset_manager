@include('components.form_errors')
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">
<div class="row">
    <div class="col-lg-6">
        <div class="row mb-3">
            <label for="short_name" class="col-sm-3 col-form-label">
                Short Name
            </label>
            <div class="col-sm-8">
                <input type="text" value="{{ isset($item) ? $item->short_name:old('short_name') ?? ''  }}"
                       class="form-control" id="{{ isset($item) ? $item->id:'' }}short_name" name="short_name" required>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="row mb-3">
            <label for="long_name" class="col-sm-3 col-form-label">
                Long Name
            </label>
            <div class="col-sm-8">
                <input type="text" value="{{ isset($item) ? $item->short_name:old('long_name') ?? ''  }}"
                       class="form-control" id="{{ isset($item) ? $item->id:'' }}long_name" name="long_name" required>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="row mb-3">
            <label for="code" class="col-sm-3 col-form-label">
                Code
            </label>
            <div class="col-sm-8">
                <input type="text" value="{{ isset($item) ? $item->short_name:old('code') ?? ''  }}"
                       class="form-control" id="{{ isset($item) ? $item->id:'' }}code" name="code" required>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="row mb-3">
            <label for="contact_person" class="col-sm-3 col-form-label">
                Contact Person
            </label>
            <div class="col-sm-8">
                <input type="text" value="{{ isset($item) ? $item->short_name:old('contact_person') ?? ''  }}"
                       class="form-control" id="{{ isset($item) ? $item->id:'' }}contact_person" name="contact_person" required>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="row mb-3">
            <label for="ot_apn" class="col-sm-3 col-form-label">
                Ot Apn
            </label>
            <div class="col-sm-8">
                <input type="text" value="{{ isset($item) ? $item->short_name:old('ot_apn') ?? ''  }}"
                       class="form-control" id="{{ isset($item) ? $item->id:'' }}ot_apn" name="ot_apn" required>
            </div>
        </div>
    </div>
</div>
