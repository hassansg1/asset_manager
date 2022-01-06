@include('components.form_errors')
{{ csrf_field() }}
@php $firewallAssets = getFirewallAssets(); @endphp
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $heading }} Information</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}firewall_asset_id"
                                   class="form-label required">Firewall ID</label>
                            <select class="form-control select2" name="firewall_asset_id" id="firewall_asset_id">
                                <option value="">-- Select Firewall Address --</option>
                                @foreach($firewallAssets as $value)
                                    <option value="{{$value->id}}" {{ isset($item) && $item->firewall_asset_id == $value->id  ? 'selected' : ''}}>{{$value->rec_id}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}name"
                                   class="form-label required">Policy Name</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->name:old('name') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}name" name="name"
                                   required>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}description" class="form-label">Policy Description</label>
                            <textarea class="form-control" name="description" id="description">{{ isset($item) ? $item->description:old('description') ?? ''  }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}firewall_zone_id"
                                   class="form-label required">Zone Name (Source)</label>
                            <select class="form-control select2" name="firewall_zone_id" id="firewall_zone_id">
                                @foreach($zone as $value)
                                    <option value="{{$value->id}}" {{ isset($item) && $item->firewall_zone_id == $value->id  ? 'selected' : ''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}firewall_destination_zone_id"
                                   class="form-label required">Zone Name (Destination)</label>
                            <select class="form-control select2" name="firewall_destination_zone_id" id="firewall_destination_zone_id">
                                @foreach($zone as $value)
                                    <option value="{{$value->id}}" {{ isset($item) && $item->firewall_destination_zone_id == $value->id  ? 'selected' : ''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}firewall_address_group_id"
                                   class="form-label required">Address Group Name (Source)</label>
                            <select class="form-control select2" name="firewall_address_group_id" id="firewall_address_group_id">
                                @foreach($address_group as $value)
                                    <option value="{{$value->id}}" {{ isset($item) && $item->firewall_address_group_id == $value->id  ? 'selected' : ''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}firewall_destination_address_group_id"
                                   class="form- required">Address Group Name (Destination)</label>
                            <select class="form-control select2" name="firewall_destination_address_group_id" id="firewall_destination_address_group_id">
                                @foreach($address_group as $value)
                                    <option value="{{$value->id}}" {{ isset($item) && $item->firewall_destination_address_group_id == $value->id  ? 'selected' : ''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}destination"
                                   class="form-label">Application</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->destination:old('destination') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}destination" name="destination"
                                   required>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}service"
                                   class="form-label">Service</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->service:old('service') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}service" name="service"
                                   required>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}action"
                                   class="form-label">Action</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->action:old('action') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}action" name="action"
                                   required>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}profile"
                                   class="form-label">Profile</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->profile:old('profile') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}profile" name="profile"
                                   required>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}options"
                                   class="form-label">Option</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->options:old('options') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}options" name="options"
                                   required>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}target"
                                   class="form-label">Target</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->target:old('target') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}target" name="target"
                                   required>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}rule_usage"
                                   class="form-label">Rule Usage Rule Usage</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->rule_usage:old('rule_usage') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}rule_usage" name="rule_usage"
                                   required>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}rule_usage_app_screen"
                                   class="form-label">Rule Usage Apps Seen</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->rule_usage_app_screen:old('rule_usage_app_screen') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}rule_usage_app_screen" name="rule_usage_app_screen"
                                   required>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}days_with_no_new_app"
                                   class="form-label">Days With No New Apps</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->days_with_no_new_app:old('days_with_no_new_app') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}days_with_no_new_app" name="days_with_no_new_app"
                                   required>

                            </select>
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
                            if(res)
                            {
                                $.each(res,function(key,value){
                                    $("#asset_id").empty();
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
                            if(res)
                            {
                                $.each(res,function(key,value){
                                    $("#connected_asset_id").empty();
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
