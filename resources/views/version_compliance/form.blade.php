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
                            <label for="{{ isset($item) ? $item->id:'' }}clause" class="form-label required">Clause</label>
                            <input type="text" value="{{ isset($item) ? $item->clause:old('clause') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}clause" name="clause" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}section" class="form-label required">Section</label>
                            <input type="text" value="{{ isset($item) ? $item->section:old('section') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}section" name="section" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}objective" class="form-label required">Objective</label>
                            <input type="text" value="{{ isset($item) ? $item->objective:old('objective') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}objective" name="objective" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}control" class="form-label required">Control</label>
                            <input type="text" value="{{ isset($item) ? $item->control:old('control') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}control" name="control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}policies" class="form-label required">Policies</label>
                            <input type="text" value="{{ isset($item) ? $item->policies:old('policies') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}policies" name="policies" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}policies_extended" class="form-label required">Policies Extended</label>
                            <input type="text" value="{{ isset($item) ? $item->policies_extended:old('policies_extended') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}policies_extended" name="policies_extended" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}nwc_applicable" class="form-label required">NWC Applicable</label>
                            <input type="text" value="{{ isset($item) ? $item->nwc_applicable:old('nwc_applicable') ?? ''  }}"
                                   class="form-nwc_applicable" id="{{ isset($item) ? $item->id:'' }}nwc_applicable" name="nwc_applicable" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}action_item" class="form-label required">Action Item</label>
                            <input type="text" value="{{ isset($item) ? $item->action_item:old('action_item') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}action_item" name="action_item" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
