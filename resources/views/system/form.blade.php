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
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}system_type_id"
                                   class="form-label required">System Type</label>
                            <select class="form-control select2" id="system_type_id" name="system_type_id" required>
                                <option value="">-Select System Type-</option>
                                @foreach($system_types as $value)
                                    <option value="{{$value->id}}" {{ isset($item) && $item->system_type_id == $value->id  ? 'selected' : ''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}title" class="form-label required">System Name</label>
                            <input type="text" value="{{ isset($item) ? $item->name:old('name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}name" name="name">
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}asset_id" class="form-label">Associated Assets</label>
                            <select class="form-control select2" id="asset_id" name="asset_id[]" multiple>
                                <option value="">-Select Asset ID-</option>
                                @foreach($assets as $value)
                                <option value="{{$value->id}}" {{ isset($item, $item->system_assets->asset_id) && in_array($value->id, $selectedAssets)  ? 'selected' : ''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description">{{ isset($item) ? $item->description:old('description') ?? ''  }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
