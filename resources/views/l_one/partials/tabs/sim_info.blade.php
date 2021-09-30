<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}sim_imsi" class="form-label">Sim IMSA</label>
            <input type="text"
                   value="{{ isset($item) ? $item->sim_imsi:old('sim_imsi') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}sim_imsi"
                   name="sim_imsi">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}sim_msisdn" class="form-label">Sim Misidn</label>
            <input type="text"
                   value="{{ isset($item) ? $item->sim_msisdn:old('sim_msisdn') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}sim_msisdn"
                   name="sim_msisdn">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}sim_iccid" class="form-label">Sim ICCID</label>
            <input type="text"
                   value="{{ isset($item) ? $item->sim_iccid:old('sim_iccid') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}sim_iccid"
                   name="sim_iccid">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}wan_interface_protocal" class="form-label">Wan Interface
                Protocol</label>
            <input type="text"
                   value="{{ isset($item) ? $item->wan_interface_protocal:old('wan_interface_protocal') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}wan_interface_protocal"
                   name="wan_interface_protocal">
        </div>
    </div>

    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}wan_interface" class="form-label">Wan Interface</label>
            <input type="text"
                   value="{{ isset($item) ? $item->wan_interface:old('wan_interface') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}wan_interface"
                   name="wan_interface">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}wan_interface_address" class="form-label">Wan Interface
                Address</label>
            <input type="text"
                   value="{{ isset($item) ? $item->wan_interface_address:old('wan_interface_address') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}wan_interface_address"
                   name="wan_interface_address">
        </div>
    </div>
</div>