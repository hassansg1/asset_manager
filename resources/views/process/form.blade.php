@include('components.form_errors')
{{ csrf_field() }}
@php
    $assets = getComputerAssets();
    $system_types = getAssetFunctions();
 @endphp
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $heading }} Information</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}process" class="form-label required">Process</label>
                            <input type="text" value="{{ isset($item) ? $item->process:old('process') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}process" name="process">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}criticality" class="form-label">Criticality</label>
                            <select class="form-control select2" id="criticality" name="criticality">
                                <option value="">-Select Criticality-</option>
                                <option value="1" {{ isset($item) && $item->criticality == 1  ? 'selected' : ''}}>High</option>
                                <option value="2" {{ isset($item)  && $item->criticality == 2  ? 'selected' : ''}}>Medium</option>
                                <option value="3" {{ isset($item)  && $item->criticality == 3  ? 'selected' : ''}}>Low</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}comment" class="form-label">Comment</label>
                            <textarea class="form-control" name="comment" id="comment" rows="6">{{ isset($item) ? $item->comment:old('comment') ?? ''  }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
