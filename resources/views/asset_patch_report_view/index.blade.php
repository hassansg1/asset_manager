@extends('components.datatable')
@section('top_content_secondary')
    <button onclick="applyBulkPatch()" class="btn btn-primary mb-1">Apply Bulk Patch</button>
@endsection
@section('table_header')
    <th>Asset</th>
    <th>Software</th>
    <th>Patch</th>
@endsection
@section('table_rows')
    @include('asset_patch_report_view.form_rows')
@endsection
<style>
    .filters {
        display: none;
    }
</style>
@section('script')
    <script>
        function applyPatch(patchId, assetId) {
            $.ajax({
                type: "POST",
                url: '{{ route("patch.ajaxStore") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    patch_id: patchId,
                    asset_id: assetId,
                },
                success: function (result) {
                    if (result.status) {
                        alert("Patch Applied Successfully");
                        location.reload();
                    }
                },
            });
        }

        function applyBulkPatch() {
            $('input:checkbox.select_patch').each(function () {
                if (this.checked) {
                    var result = $(this).attr('data-asset').split('_');
                    assetId = result[1];
                    patchId = result[0];
                    $.ajax({
                        type: "POST",
                        url: '{{ route("patch.ajaxStore") }}',
                        async: false,
                        data: {
                            _token: '{{ csrf_token() }}',
                            patch_id: patchId,
                            asset_id: assetId,
                        },
                        success: function (result) {
                        },
                    });
                }
            });
            alert("Patch Applied Successfully");
            location.reload();
        }
    </script>
@endsection
