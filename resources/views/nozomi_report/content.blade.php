@if(isset($existInNozomi))
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Devices that exist in Nozomi but missing in OTCM
                        ({{ count($existInNozomi) }} Devices)</h4>
                    <table class="table table-responsive" id="nozomi_table">
                        <thead>
                        <tr>
                            <th>
                                Ip Address
                            </th>
                            <th>
                                Network
                            </th>
                            <th>
                                MAC Address
                            </th>
                            <th>
                                Name
                            </th>
                        </tr>
                        </thead>
                        @foreach($existInNozomi as $device)
                            <tr>
                                <td>
                                    {{ $device->ip_address ?? '' }}
                                </td>
                                <td>
                                    <strong>{{ checkNetworkOfIpAddress($device->ip_address) }}</strong>
                                    <button type="button" class="btn btn-default btn-sm" data-mdb-toggle="tooltip"
                                            data-mdb-placement="top"
                                            title="{{ checkNetworkOfIpAddressHtml($device->ip_address) }}">
                                        <i class="fas fa-plus-circle" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td>
                                    {{ $device->properties->mac_address ?? '' }}
                                </td>
                                <td>
                                    {{ $device->properties->name ?? '' }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif
@if(isset($existInBoth))

    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Devices found but the underlying data is different</h4>
            <table class="table table-responsive" id="nozomi_table">
                <tr>
                    <th>
                        Ip Address
                    </th>
                    <th>
                        Differences
                    </th>
                </tr>
                @foreach($existInBoth as $ip => $differences)
                    <tr>
                        <td>
                            {{ $ip }}
                        </td>
                        <td>
                            <table class="table table-borderless">
                                <tr>
                                    <th>
                                        Attribute
                                    </th>
                                    <th>
                                        Nozomi Value
                                    </th>
                                    <th>
                                        OTCM Value
                                    </th>
                                </tr>
                                @foreach($differences as $property=>$difference)
                                    <tr>
                                        <td>{{ $property }}</td>
                                        <td>{{ $difference[0] }}</td>
                                        <td>{{ $difference[1] }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endif
@if(isset($existInOTCM))
    <div class="card">
        <span class="mr-5">
      <button title="Copy" onclick="$('.buttons-copy').click()" type="button"
              class="btn btn-light btn-filter dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
         <i class="fas fa-copy"></i>
      </button>
      <button title="Export as PDF" onclick="$('.buttons-pdf').click()" type="button"
              class="btn btn-light btn-filter dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
         <i class="fas fa-file-pdf"></i>
      </button>
      <button title="Export as EXCEL" onclick="$('.buttons-excel').click()" type="button"
              class="btn btn-light btn-filter dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
         <i class="fas fa-file-excel"></i>
      </button>
        </span>
        <div class="card-body">
            <h4 class="card-title mb-4">Devices that exist in OTCM but missing in
                Nozomi({{ count($existInOTCM) }} Devices)</h4>
            <table class="table table-responsive" id="nozomi_table">
                <thead>
                <tr>
                    <th>
                        Ip Address
                    </th>
                    <th>
                        <strong>Network</strong>
                    </th>
                    <th>
                        MAC Address
                    </th>
                    <th>
                        Name
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($existInOTCM as $device)
                    <tr>
                        <td>
                            {{ $device->ip_address ?? '' }}
                        </td>
                        <td>
                            <strong>{{ $device->network->name }}</strong>
                        </td>
                        <td>
                            {{ $device->mac_address ?? '' }}
                        </td>
                        <td>
                            {{ $device->portable->show_name ?? '' }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endif
