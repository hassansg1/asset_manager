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
                                   name="last_name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}email"
                                   class="form-label required">Email</label>
                            <input type="email"
                                   value="{{ isset($item) ? $item->email:old('email') ?? ''  }}"
                                   class="form-control"
                                   id="{{ isset($item) ? $item->id:'' }}email" name="email">
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
            </div>
        </div>
    </div>
</div>
{{--@section('script')--}}
{{--    <script type="text/javascript">--}}
{{--        $('#unit_id').on('change', function () {--}}
{{--            var unit_id = this.value;--}}
{{--            if (unit_id) {--}}
{{--                $.ajax({--}}
{{--                    type: "get",--}}
{{--                    url: "{{url('unit/type')}}/" + unit_id,--}}
{{--                    success: function (res) {--}}
{{--                        if (res) {--}}
{{--                            $.each(res, function (key, value) {--}}
{{--                                $("#site_id").append('<option value="' + key + '">' + value + '</option>');--}}
{{--                            });--}}
{{--                        }--}}
{{--                    }--}}

{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--        $('#site_id').on('change', function () {--}}
{{--            var site_id = this.value;--}}
{{--            if (site_id) {--}}
{{--                $.ajax({--}}
{{--                    type: "get",--}}
{{--                    url: "{{url('site/type')}}/" + site_id,--}}
{{--                    success: function (res) {--}}
{{--                        if (res) {--}}
{{--                            $.each(res, function (key, value) {--}}
{{--                                $("#sub_site_id").append('<option value="' + key + '">' + value + '</option>');--}}
{{--                            });--}}
{{--                        }--}}
{{--                    }--}}

{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
