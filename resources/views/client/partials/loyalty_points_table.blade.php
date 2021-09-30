<div class="card-body">
    <h5 class="">History</h5>
    <div class="table-responsive">
        <table class="table mb-0" id="loyalty_points_table_el">
            <thead>
            <tr>
                <th>Ticket ID</th>
                <th >Date</th>
                <th>Description</th>
                <th>Adjustment</th>
                <th>Balance</th>
                <th>Employee</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->ticket_id }}</td>
                    <td>{{ universalDateFormatter($item->created_at) }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->adjustment }}</td>
                    <td>{{ $item->balance }}</td>
                    <td>{{ $item->performerName() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
