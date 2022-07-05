@include('components.form_errors')
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $heading }} Information</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}hardware_make"
                                   class="form-label required">Hardware Make</label>
                            <input type="text" value="{{ isset($item) ? $item->hardware_make:old('hardware_make') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}hardware_make"
                                   name="hardware_make">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}hardware_model"
                                   class="form-label required">Hardware Model</label>
                            <input type="text" value="{{ isset($item) ? $item->hardware_model:old('hardware_model') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}hardware_model"
                                   name="hardware_model">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}part_number"
                                   class="form-label required">Part Number</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->part_number:old('part_number') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}part_number"
                                   name="part_number">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}status" class="form-label required">Legacy Status</label>
                            <select class="form-select form-select-input" name="status"
                                    id="{{ isset($item) ? $item->id:'' }}status">
                                    <option value=""></option>
                                    <option value="1" {{ isset($item) && $item->status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="2" {{ isset($item) && $item->status == 2 ? 'selected' : ''}}>End of sale</option>
                                    <option value="3" {{ isset($item) && $item->status == 3 ? 'selected' : ''}}>End of service / support</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
