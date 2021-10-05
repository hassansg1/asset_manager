<div class="row">
    <div class="col-xl-12">
        <div class="table-responsive">
            <table class="table table-editable table-nowrap align-middle">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Type</th>
                    <th>Network</th>
                    <th>Speed</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody id="ports_table_row">
                @if(isset($item))
                    @foreach($item->ports as $port)
                        @include('network.partials.tabs.port_row',['port' => $port,'network' => 'true'])
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

</div>
<span class="btn-group" role="group">
      <button onclick="getNewRow('network')" title="Add New" type="button"
              class="btn btn-primary btn-filter dropdown-toggle"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-plus-circle">
              New
          </i>
      </button>
  </span>

@section('script')
    <script>
        $(document).ready(function () {
            $('.table-editable-edit-button').click();
        });
    </script>
@endsection