@include('components.form_errors')
@php
    $asset_functions = getAssetFunctions();
@endphp
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $heading }} Information</h4>
                @include('components.form_errors')
                {{ csrf_field() }}
                <input type="hidden" name="id"
                       value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}unit_id"
                                   class="form-label required">Asset Type</label>
                            <select class="form-control select2" id="asset_function" name="asset_function" required>
                                <option value="">-Select Asset Type-</option>
                                @foreach($asset_functions as $value)
                                    <option value="{{$value->id}}" {{ isset($item) && $item->asset_function == $value->id  ? 'selected' : ''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}name"
                                   class="form-label required">User ID Right</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->name:old('name') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}name"
                                   name="name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}description" class="form-label">Rights Description</label>
                            <textarea class="form-control" name="description" id="description">{{ isset($item) ? $item->description:old('description') ?? ''  }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('user.navs.script')
