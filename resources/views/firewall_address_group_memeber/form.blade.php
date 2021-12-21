@include('components.form_errors')
{{ csrf_field() }}
@php
    $firewallgroups = firewallAddressGroup();
    $ip_address = firewallIpAddress();
 @endphp
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $heading }} Information</h4>
                 <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}asset_id" class="form-label">Firewall Groups</label>
                            <select class="form-control select2" id="firwall_group_id" name="firwall_group_id">
                                @foreach($firewallgroups as $value)
                                <option value="{{$value->id}}" {{ isset($item) && $item->firwall_group_id == $value->id  ? 'selected' : ''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}asset_id" class="form-label">IP Address</label>
                            <select class="form-control select2" id="firewall_ip_address_id" name="firewall_ip_address_id[]" multiple>
                                @foreach($ip_address as $value)
                                    <option value="{{$value->id}}" {{ isset($item) && $item->firewall_ip_address_id == $value->id  ? 'selected' : ''}}>{{$value->ip_address}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
