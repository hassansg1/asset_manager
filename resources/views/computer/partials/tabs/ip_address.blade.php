<div class="row">
    <div class="col-xl-12">
        <div class="table-responsive">
            <table class="table table-editable table-nowrap align-middle table-edits">
                <thead>
                <tr>
                    <th>IP Address</th>
                    <th>MAC Address</th>
                    <th>NIC</th>
                    <th>Default Gateway</th>
                    <th>Port</th>
                    <th>SubNetMask</th>
                    {{--<th>DHCP Enabled</th>--}}
                    <th>DHCP Server</th>
                </tr>
                </thead>
                <tbody id="ports_table_row">
                @if(isset($item))
                    @foreach($item->ports as $port)
                        @include('assets_shared.port_row',['port' => $port])
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

</div>
<span class="btn-group" role="group">
      <button onclick="getNewRow()" title="Add New" type="button" class="btn btn-primary btn-filter dropdown-toggle"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-plus-circle">
              New
          </i>
      </button>
  </span>

@section('script')
@endsection
