@php

    $departments = getDepartments();
    $designations = getDesignations();
    $associate = getAssociatIds();
    $status = getStatus();
    $system = getSystems();
    $assets = getComputerAssets();
    $units = getUnits();
    $sites = getSites();
    $sub_sites = getSubSites();

@endphp
@include('components.form_errors')
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
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}unit_id"
                                   class="form-label required">Unit</label>
                            <select class="form-control select2" id="unit_id" name="unit_id" required>
                                <option value="">-Select Unit-</option>
                                @foreach($units as $value)
                                    <option value="{{$value->id}}" {{ isset($item) && $item->unit_id == $value->id  ? 'selected' : ''}}>{{$value->rec_id}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}site_id"
                                   class="form-label">Site</label>
                            <select class="form-control select2" id="site_id" name="site_id">
                                <option value="">-Select Site-</option>
                                @if(isset($item))
                                    @foreach($sites as $value)
                                        <option value="{{$value->id}}" {{ isset($item) && $item->site_id == $value->id  ? 'selected' : ''}}>{{$value->rec_id}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}sub_site_id"
                                   class="form-label">Sub Site</label>
                            <select class="form-control select2" id="sub_site_id" name="sub_site_id">
                                <option value="">-Select Unit-</option>
                                @if(isset($item))
                                    @foreach($sub_sites as $value)
                                        <option value="{{$value->id}}" {{ isset($item) && $item->sub_site_id == $value->id  ? 'selected' : ''}}>{{$value->rec_id}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}first_name"
                                   class="form-label required">First
                                Name</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->first_name:old('first_name') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}first_name"
                                   name="first_name" required>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}last_name"
                                   class="form-label">Last
                                Name</label>
                            <input type="text"
                                   value="{{ isset($item) ? $item->last_name:old('last_name') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}last_name"
                                   name="last_name" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}email"
                                   class="form-label required">Email</label>
                            <input type="email"
                                   value="{{ isset($item) ? $item->email:old('email') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}email" name="email"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="" class="form-label">Department</label>
                        <input type="text"
                               value="{{ isset($item) ? $item->department_id:old('department_id') ?? ''  }}"
                               class="form-control"
                               id="{{ isset($item) ? $item->id:'' }}department_id" name="department_id">
                    </div>
                    <div class="col-lg-3">
                        <label for="" class="form-label">Designations</label>
                        <input type="text"
                               value="{{ isset($item) ? $item->designation_id:old('designation_id') ?? ''  }}"
                               class="form-control"
                               id="{{ isset($item) ? $item->id:'' }}designation_id" name="designation_id">
                    </div>
                    <div class="col-lg-3">
                        <label for="" class="form-label">Contact No</label>
                        <input type="number"
                               value="{{ isset($item) ? $item->mobile_no:old('mobile_no') ?? ''  }}"
                               class="form-control"
                               id="{{ isset($item) ? $item->id:'' }}mobile_no" name="mobile_no">
                    </div>
                    <div class="col-lg-3">
                        <label for="" class="form-label">Status</label>
                        <select class="form-control select2" name="status" id="status">
                            <option value="">-Select Status-</option>
                            @foreach($status as $key => $value)
                                <option
                                    value="{{$key}}" {{ isset($item) && $item->status == $key  ? 'selected' : ''}}>{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <hr class="solid">
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}user_type"
                                   class="form-label">User ID Type</label>
                            <select class="form-control select2" name="user_type" id="user_type">
                                <option value="">-Select Type-</option>
                                <option value="asset">Asset</option>
                                <option value="system">System</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 asset" style="display: none">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}asset_id"
                                   class="form-label">Assets</label>
                            <select class="form-control select2" id="asset_id" name="asset_id">
                                <option value="">-Select Asset-</option>
                                @foreach($assets as $value)
                                    <option value="{{$value->id}}">{{$value->rec_id}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 system" style="display: none">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}system"
                                   class="form-label">Systems</label>
                            <select class="form-control select2" id="system" name="system">
                                <option value="">-Select System-</option>
                                @foreach($system as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}account_id" class="form-label">Associated
                                ID's</label>
                            <select class="form-control select2" id="account_id" name="account_id[]"
                                    multiple="multiple">
                                @if(isset($item))
                                    @if($child_arr)
                                        @foreach($associate as $value)
                                            <option
                                                value="{{$value->id}}" {{ isset($item, $item->userAccount->account_id) && in_array($value->id, $child_arr)  ? 'selected' : ''}}>{{$value->user_id}}</option>
                                        @endforeach
                                    @endif
                                @endif
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
        $('#user_type').on('change', function () {
            var type = this.value;
            if (type == "asset") {
                $('.asset').show();
                $('.system').hide();
            } else if (type == "system") {
                $('.asset').hide();
                $('.system').show();
            }
        });
        $('#asset_id').on('change', function () {
            var asset_id = this.value;
            if (asset_id) {
                $.ajax({
                    type: "get",
                    url: "{{url('asset/type')}}/" + asset_id,
                    success: function (res) {
                        if (res) {
                            $.each(res, function (key, value) {
                                $("#account_id").append('<option value="' + key + '">' + value + ' (Asset)</option>');
                            });
                        }
                    }

                });
            }
        });
        $('#system').on('change', function () {
            var system_id = this.value;
            if (system_id) {
                $.ajax({
                    type: "get",
                    url: "{{url('system/type')}}/" + system_id,
                    success: function (res) {
                        if (res) {
                            $.each(res, function (key, value) {
                                $("#account_id").append('<option value="' + key + '">' + value + ' (System)</option>');
                            });
                        }
                    }

                });
            }
        });

        $('#unit_id').on('change', function () {
            var unit_id = this.value;
            if (unit_id) {
                $.ajax({
                    type: "get",
                    url: "{{url('unit/type')}}/" + unit_id,
                    success: function (res) {
                        if (res) {
                            $.each(res, function (key, value) {
                                $("#site_id").append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    }

                });
            }
        });
        $('#site_id').on('change', function () {
            var site_id = this.value;
            if (site_id) {
                $.ajax({
                    type: "get",
                    url: "{{url('site/type')}}/" + site_id,
                    success: function (res) {
                        if (res) {
                            $.each(res, function (key, value) {
                                $("#sub_site_id").append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    }

                });
            }
        });
    </script>
@endsection
