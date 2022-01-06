@include('components.form_errors')
{{ csrf_field() }}
@php $assets = getComputerAssets(); @endphp
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $heading }} Information</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}asset_type"
                                   class="form-label required">Asset Type</label>
                            <select class="form-control select2" name="asset_type" id="asset_type">
                                <option value="">-Select Asset Type-</option>
                                <option value="computer_assets">Computer Asset</option>
                                <option value="network_assets">Network Asset</option>
                                <option value="lone_assets">Lone Asset</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}asset_id"
                                   class="form-label required">Asset ID</label>
                            <select class="form-control select2" id="asset_id" name="asset_id">
                                <option value="">-Select Asset ID-</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}asset_nic"
                                   class="form-label">Asset NIC</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->asset_nic:old('asset_nic') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}asset_nic" name="asset_nic"
                                   required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}asset_port"
                                   class="form-label required">Asset Port</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->asset_port:old('asset_port') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}asset_port" name="asset_port"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}ip_address_name"
                                   class="form-label">IP Address Name</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->ip_address_name:old('ip_address_name') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}ip_address_name" name="ip_address_name"
                                   required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}ip_address"
                                   class="form-label required">IP Address</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->ip_address:old('ip_address') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}ip_address" name="ip_address"
                                   required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}subnet_mask"
                                   class="form-label">Subnet Mask</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->subnet_mask:old('subnet_mask') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}subnet_mask" name="subnet_mask"
                                   required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}default_gateway"
                                       class="form-label">Default Gateway</label>
                                <input type="text"
                                       value="{{ isset($item) ? $item->default_gateway:old('default_gateway') ?? ''  }}"
                                       class="form-control"
                                       id="{{ isset($item) ? $item->id:'' }}default_gateway" name="default_gateway"
                                       required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}vlan_id"
                                       class="form-label">VLAN ID</label>
                                <input type="text"
                                       value="{{ isset($item) ? $item->vlan_id:old('vlan_id') ?? ''  }}"
                                       class="form-control"
                                       id="{{ isset($item) ? $item->id:'' }}vlan_id" name="vlan_id"
                                       required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="{{ isset($item) ? $item->id:'' }}teaming_pair_id"
                                       class="form-label">Teaming Pair ID</label>
                                <input type="text"
                                       value="{{ isset($item) ? $item->teaming_pair_id:old('teaming_pair_id') ?? ''  }}"
                                       class="form-control"
                                       id="{{ isset($item) ? $item->id:'' }}teaming_pair_id" name="teaming_pair_id"
                                       required>
                            </div>
                        </div>
                    </div>

                </div>
                <hr class="solid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}connected_asset_type"
                                   class="form-label" >Connected Asset Type</label>
                            <select class="form-control select2" name="connected_asset_type" id="connected_asset_type">
                                <option value="">-Select Asset Type-</option>
                                <option value="computer_assets">Computer Asset</option>
                                <option value="network_assets">Network Asset</option>
                                <option value="lone_assets">Lone Asset</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}connected_asset_id"
                                   class="form-label">Connected Asset</label>
                            <select class="form-control select2" id="connected_asset_id" name="connected_asset_id">
                                <option value="">-Select Asset ID-</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}connected_asset_nic"
                                   class="form-label">Connected Asset NIC</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->connected_asset_nic:old('connected_asset_nic') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}connected_asset_nic" name="connected_asset_nic"
                                   required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}connected_asset_port"
                                   class="form-label ">Connected Asset Port</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->connected_asset_port:old('connected_asset_port') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}connected_asset_port" name="connected_asset_port"
                                   required>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#asset_type').on('change', function(){
                var asset_type = $(this).val();
                if(asset_type){
                    $.ajax({
                        type:"get",
                        url:"{{url('asset/location/')}}/"+asset_type,
                        success:function(res)
                        {
                            $("#asset_id").empty();
                            if(res)
                            {
                                $.each(res,function(key,value){
                                    $("#asset_id").append('<option value="'+key+'">'+value+'</option>');
                                });
                            }
                        }

                    });
                }
            });
            $('#connected_asset_type').on('change', function(){
                var connected_asset_type = $(this).val();
                if(connected_asset_type){
                    $.ajax({
                        type:"get",
                        url:"{{url('connected_asset/location')}}/"+connected_asset_type,
                        success:function(res)
                        {
                            $("#connected_asset_id").empty();
                            if(res)
                            {
                                $.each(res,function(key,value){

                                    $("#connected_asset_id").append('<option value="'+key+'">'+value+'</option>');
                                });
                            }
                        }

                    });
                }
            });
        });
    </script>
@endsection
