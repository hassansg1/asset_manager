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
                            <label for="{{ isset($item) ? $item->id:'' }}software_name"
                                   class="form-label required">Software Name</label>
                            <input type="text" value="{{ isset($item) ? $item->software_name:old('software_name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}software_name"
                                   name="software_name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}software_version"
                                   class="form-label required">Software Version</label>
                            <input type="text" value="{{ isset($item) ? $item->software_version:old('software_version') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}software_version"
                                   name="software_version">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}software_type" class="form-label">Software Type</label>
                            <select class="form-select form-select-input" name="software_type"
                                    id="{{ isset($item) ? $item->id:'' }}software_type">
                                <option value=""></option>
                                <option value="1" {{ isset($item) && $item->software_type == 1 ? 'selected' : ''}}>Application</option>
                                <option value="2" {{ isset($item) && $item->software_type == 2 ? 'selected' : ''}}>Operating System</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}status" class="form-label">Legacy Status</label>
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
