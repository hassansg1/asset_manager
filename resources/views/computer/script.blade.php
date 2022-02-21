<script>
    $(document).ready(function () {
        $('.port_auto_drop_down').each(function (i, obj) {
            let value = $(obj).val();
            $(obj)
                .val(value)
                .trigger('change');
        });
    });

    function loadIpAddress(sel, rand, ipAddress) {
        $.ajax({
            type: "GET",
            url: '{{ url('getIPAddressOfNetwork') }}',
            data: {network_id: sel.value, ipAddress: ipAddress},
            success: function (result) {
                $('.' + rand).html(result.html);
            }
        });
    }

    function loadPorts(sel, rand) {
        $.ajax({
            type: "GET",
            url: '{{ url('getPortsOfNetwork') }}',
            data: {network_id: $(sel).val()},
            success: function (result) {
                $('.' + rand).html(result.html);
            }
        });
    }

    function patchSoftwareApprovals(softwareId, patchId) {
        $('#patch_id_filter').val(patchId);
        $('#not_in_software_id').val(softwareId);
        $('#software_patch_modal').modal('show');
        loadDataTableDynamically('software', 'software');
    }

    function patchAssetInstalls(assetId) {
        $('#asset_id_filter').val(assetId);
        $('#asset_patch_modal').modal('show');
        loadDataTableDynamically('asset_patch_report', 'asset_patch_report');
    }

    function viewPatchAssetInstalls(patchId) {
        $('#patch_id_filter').val(patchId);
        $('#view_patch_assets_modal').modal('show');
        loadDataTableDynamically('asset_patch_report_view', 'asset_patch_report_view');
    }


    function viewPatchSoftwareApprovals(patchId) {
        $('#patch_id_filter').val(patchId);
        $('#view_patch_software_modal').modal('show');
        loadDataTableDynamically('patch_policy', 'patch_policy');
    }

    function savePatchSoftwareApprovals() {
        let patchId = $('#patch_id_filter').val();
        let softwares = $("input[name='checked_software[]']")
            .map(function () {
                return $(this).val();
            }).get();
        $.ajax({
            type: "POST",
            url: '{{ route("patch.patchSoftwareApprovalSave") }}',
            data: {
                '_token': '{{ csrf_token() }}',
                softwares: softwares,
                patchId: patchId
            },
            success: function (result) {
                if (result.status)
                    doSuccessToast(result.message);
                else
                    doErrorToast(result.message);
            },
        });
    }

    function savePatchAssetInstalls() {
        let assetId = $('#asset_id_filter').val();
        let patch_ids = $("input[name='checked_asset_patch_report[]']")
            .map(function () {
                return $(this).val();
            }).get();
        $.ajax({
            type: "POST",
            url: '{{ route("asset.assetPatchInstallSave") }}',
            data: {
                '_token': '{{ csrf_token() }}',
                patch_ids: patch_ids,
                assetId: assetId
            },
            success: function (result) {
                if (result.status)
                    doSuccessToast(result.message);
                else
                    doErrorToast(result.message);
            },
        });
    }
</script>
