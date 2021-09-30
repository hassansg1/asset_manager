<div class="row">
    <h3>
        Network adapter details
    </h3>
    <div class="col-xl-12">
        <div class="table-responsive">
            <table class="table table-editable table-nowrap align-middle table-edits">
                <thead>
                <tr>
                    <th>IP Address</th>
                    <th>MAC Address</th>
                    <th>NIC</th>
                    <th>Default Gateway</th>
                    <th>Network</th>
                    <th>SubNetMask</th>
                    {{--<th>DHCP Enabled</th>--}}
                    <th>DHCP Server</th>
                </tr>
                </thead>
                <tbody>
                @include('l_one.partials.tabs.comm_info_partials.table_row')
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('script')
    <script>
        $(document).ready(function () {
            $('.table-editable-edit-button').click();
        });
    </script>
@endsection

{{--<div class="row">--}}
{{--<div class="col-lg-4">--}}
{{--<div class="mb-3">--}}
{{--<label for="{{ isset($item) ? $item->id:'' }}comm_interface_1" class="form-label">Comm Interface 1</label>--}}
{{--<input type="text"--}}
{{--value="{{ isset($item) ? $item->comm_interface_1:old('comm_interface_1') ?? ''  }}"--}}
{{--class="form-control" id="{{ isset($item) ? $item->id:'' }}comm_interface_1"--}}
{{--name="comm_interface_1">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-lg-4">--}}
{{--<div class="mb-3">--}}
{{--<label for="{{ isset($item) ? $item->id:'' }}comm_interface_1_protocal" class="form-label">Comm Interface 1--}}
{{--Protocol--}}
{{--Address</label>--}}
{{--<input type="text"--}}
{{--value="{{ isset($item) ? $item->comm_interface_1_protocal:old('comm_interface_1_protocal') ?? ''  }}"--}}
{{--class="form-control" id="{{ isset($item) ? $item->id:'' }}comm_interface_1_protocal"--}}
{{--name="comm_interface_1_protocal">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-lg-4">--}}
{{--<div class="mb-3">--}}
{{--<label for="{{ isset($item) ? $item->id:'' }}comm_interface_1_address" class="form-label">Comm Interface 1--}}
{{--Address--}}
{{--Protocol</label>--}}
{{--<input type="text"--}}
{{--value="{{ isset($item) ? $item->comm_interface_1_address:old('comm_interface_1_address') ?? ''  }}"--}}
{{--class="form-control" id="{{ isset($item) ? $item->id:'' }}comm_interface_1_address"--}}
{{--name="comm_interface_1_address">--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row">--}}

{{--<div class="col-lg-4">--}}
{{--<div class="mb-3">--}}
{{--<label for="{{ isset($item) ? $item->id:'' }}comm_interface_2" class="form-label">Comm Interface 2</label>--}}
{{--<input type="text"--}}
{{--value="{{ isset($item) ? $item->comm_interface_2:old('comm_interface_2') ?? ''  }}"--}}
{{--class="form-control" id="{{ isset($item) ? $item->id:'' }}comm_interface_2"--}}
{{--name="comm_interface_2">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-lg-4">--}}
{{--<div class="mb-3">--}}
{{--<label for="{{ isset($item) ? $item->id:'' }}comm_interface_2_protocal" class="form-label">Comm Interface 2--}}
{{--Protocol--}}
{{--Address</label>--}}
{{--<input type="text"--}}
{{--value="{{ isset($item) ? $item->comm_interface_2_protocal:old('comm_interface_2_protocal') ?? ''  }}"--}}
{{--class="form-control" id="{{ isset($item) ? $item->id:'' }}comm_interface_2_protocal"--}}
{{--name="comm_interface_2_protocal">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-lg-4">--}}
{{--<div class="mb-3">--}}
{{--<label for="{{ isset($item) ? $item->id:'' }}comm_interface_2_address" class="form-label">Comm Interface 2--}}
{{--Address--}}
{{--Protocol</label>--}}
{{--<input type="text"--}}
{{--value="{{ isset($item) ? $item->comm_interface_2_address:old('comm_interface_2_address') ?? ''  }}"--}}
{{--class="form-control" id="{{ isset($item) ? $item->id:'' }}comm_interface_2_address"--}}
{{--name="comm_interface_2_address">--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<div class="col-lg-4">--}}
{{--<div class="mb-3">--}}
{{--<label for="{{ isset($item) ? $item->id:'' }}comm_interface_3" class="form-label">Comm Interface 3</label>--}}
{{--<input type="text"--}}
{{--value="{{ isset($item) ? $item->comm_interface_3:old('comm_interface_3') ?? ''  }}"--}}
{{--class="form-control" id="{{ isset($item) ? $item->id:'' }}comm_interface_3"--}}
{{--name="comm_interface_3">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-lg-4">--}}
{{--<div class="mb-3">--}}
{{--<label for="{{ isset($item) ? $item->id:'' }}comm_interface_3_protocal" class="form-label">Comm Interface 3--}}
{{--Protocol--}}
{{--Address</label>--}}
{{--<input type="text"--}}
{{--value="{{ isset($item) ? $item->comm_interface_3_protocal:old('comm_interface_3_protocal') ?? ''  }}"--}}
{{--class="form-control" id="{{ isset($item) ? $item->id:'' }}comm_interface_3_protocal"--}}
{{--name="comm_interface_3_protocal">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-lg-4">--}}
{{--<div class="mb-3">--}}
{{--<label for="{{ isset($item) ? $item->id:'' }}comm_interface_3_address" class="form-label">Comm Interface 3--}}
{{--Address--}}
{{--Protocol</label>--}}
{{--<input type="text"--}}
{{--value="{{ isset($item) ? $item->comm_interface_3_address:old('comm_interface_3_address') ?? ''  }}"--}}
{{--class="form-control" id="{{ isset($item) ? $item->id:'' }}comm_interface_3_address"--}}
{{--name="comm_interface_3_address">--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<div class="col-lg-4">--}}
{{--<div class="mb-3">--}}
{{--<label for="{{ isset($item) ? $item->id:'' }}communication_type" class="form-label">Communication--}}
{{--Type</label>--}}
{{--<input type="text"--}}
{{--value="{{ isset($item) ? $item->communication_type:old('communication_type') ?? ''  }}"--}}
{{--class="form-control" id="{{ isset($item) ? $item->id:'' }}communication_type"--}}
{{--name="communication_type">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-lg-4">--}}
{{--<div class="mb-3">--}}
{{--<label for="{{ isset($item) ? $item->id:'' }}control" class="form-label">Control--}}
{{--Protocol--}}
{{--Address</label>--}}
{{--<input type="text"--}}
{{--value="{{ isset($item) ? $item->control:old('control') ?? ''  }}"--}}
{{--class="form-control" id="{{ isset($item) ? $item->id:'' }}control"--}}
{{--name="control">--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}