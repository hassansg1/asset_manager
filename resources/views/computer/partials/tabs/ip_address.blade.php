<div class="row">
    <div class="col-xl-12">
        <div class="table-responsive">
            <table class="table table-editable table-nowrap align-middle table-edits">
                <thead>
                <tr>
                    <th>Network Interface Card</th>
                    <th>Port Number</th>
                    <th>MAC Address</th>
                    <th>Select Connected Devices</th>
                    <th style="width: 200px">Select IP Address</th>
                    <th>SubNetMask</th>
                    <th>Default Gateway</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="ports_table_row">
                @if(isset($item->ports))
                    @foreach($item->ports as $port)
                        @include('computer.partials.tabs.port_row',['port' => $port])
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

</div>
<span class="btn-group" role="group">
      <button onclick="getNewRow('computer')" title="Add New" type="button"
              class="btn btn-primary btn-filter dropdown-toggle"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-plus-circle">
              New
          </i>
      </button>
    <button onclick="getBulckRows('computer')" title="Add New" type="button"
              class="btn btn-primary btn-filter dropdown-toggle"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-plus-circle">
Add Bulk Rows
          </i>
      </button>
  </span>


@section('script')
@endsection
