@include('components.form_errors')
{{ csrf_field() }}
@php
    $firewallAssets = getComputerAssets();
    $policy = getPolicy();
@endphp
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $heading }} Information</h4>
                <div class="row">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}asset_id" class="form-label required">Asset ID</label>
                                <select class="form-control select2" id="firewall_asset_id" name="firewall_asset_id">
                                    <option value="">-Select Firewall Asset ID-</option>
                                    @foreach($firewallAssets as $value)
                                        <option value="{{$value->id}}" {{ isset($item) && $item->firewall_asset_id == $value->id  ? 'selected' : ''}}>{{$value->rec_id}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}policy_id" class="form-label required">Firewall Policy Name</label>
                                <select class="form-control select2" id="policy_id" name="policy_id">
                                    <option value="">-Select Firewall Policy Name-</option>
                                    @foreach($policy as $value)
                                        <option value="{{$value->id}}" {{ isset($item) && $item->policy_id == $value->id  ? 'selected' : ''}}>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}name" class="form-label required">Application Name</label>
                                <input type="text" value="{{ isset($item) ? $item->name:old('name') ?? ''  }}"
                                       class="form-control" id="{{ isset($item) ? $item->id:'' }}name" name="name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}description" class="form-label">Application Description</label>
                            <textarea class="form-control" name="description" id="description">{{ isset($item) ? $item->description:old('description') ?? ''  }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>
