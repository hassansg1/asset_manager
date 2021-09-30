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
                            <label for="{{ isset($item) ? $item->id:'' }}short_name" class="form-label required">Short Name</label>
                            <input type="text" value="{{ isset($item) ? $item->short_name:old('short_name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}short_name"
                                   name="short_name" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}long_name" class="form-label required">Long Name</label>
                            <input type="text" value="{{ isset($item) ? $item->long_name:old('long_name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}long_name"
                                   name="long_name" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}code" class="form-label">ID</label>
                            <input type="text" value="{{ isset($item) ? $item->code:old('code') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}code" name="code">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
