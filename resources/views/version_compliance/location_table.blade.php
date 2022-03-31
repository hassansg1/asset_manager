<div class="table-responsive">
    <table class="table mb-0 location_table_compliance_run lcc_{{$item_id}}" id="">
        <thead class="table-light">
        <tr>
            <th style="max-width: 20px;width: 20px !important;">Location Name</th>
            <th>Compliant</th>
            <th>Comment</th>
            <th>Attachments</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($locations as $location)
            @php
                $dt = getComplianceStatus($versionId,$item_id,$location->id)
            @endphp
            @include('version_compliance.location_table_row')
        @endforeach
        </tbody>
    </table>
</div>
