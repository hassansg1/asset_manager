@php $firewallAssets = getComputerAssets(); @endphp
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Firewall Managment Detail</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Source Location</th>
                    <th>Source Zone</th>
                    <th>Source Asset ID</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $item->source_location }}</td>
                        <td>{{ $item->source_zone }}</td>
                        <td>

                        </td>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Destination Location</th>
                    <th>Destination Zone</th>
                    <th>Destination Asset ID</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $item->destination_location }}</td>
                    <td>{{ $item->destination_zone }}</td>
                    <td>

                    </td>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h5>Application/Port: {{ $item->application_port }}</h5>
        </div>
        <div class="col-md-6">
            <h5>Approved By: {{ $item->approved_by }}</h5>
        </div>
    </div>
    <div class="row">
        <h5>Justification</h5>
        <div class="col-md-12">
            <p>{{ $item->description }}</p>
        </div>
    </div>
</div>
