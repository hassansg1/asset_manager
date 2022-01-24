<script>
    $(document).on('change', '.select_row', function () {
        let type = 'software';

        if (this.checked) {
            let id = $(this).attr('data-software');
            $('#selected_' + type).append('<input type="hidden" value="' + id + '" name="checked_' + type + '[]" id="' + type + id + '">');
        } else {
            let id = $(this).attr('data-software');
            $('#' + type + id).remove();
        }
    });

    function patchSoftwareApprovals() {
        $('#software_patch_modal').modal('show');
        loadDataTableDynamically('software', 'software');
    }

    function patchAssetInstalls() {
        $('#asset_patch_modal').modal('show');
        loadDataTableDynamically('patch_report', 'patch_report');
    }

    function viewPatchAssetInstalls() {
        $('#view_patch_assets_modal').modal('show');
        loadDataTableDynamically('patch_report_view', 'patch_report_view');
    }


    function viewPatchSoftwareApprovals() {
        $('#view_patch_software_modal').modal('show');
        loadDataTableDynamically('software_patches_view', 'software_patches_view');
    }

    function savePatchSoftwareApprovals() {
        let patch_ids = $("input[name='checked_patch[]']")
            .map(function () {
                return $(this).val();
            }).get();
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
                patch_ids: patch_ids
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
        let patch_ids = $("input[name='checked_patch[]']")
            .map(function () {
                return $(this).val();
            }).get();
        let asset_ids = $("input[name='checked_patch_report[]']")
            .map(function () {
                return $(this).val();
            }).get();
        $.ajax({
            type: "POST",
            url: '{{ route("patch.patchAssetInstallSave") }}',
            data: {
                '_token': '{{ csrf_token() }}',
                asset_ids: asset_ids,
                patch_ids: patch_ids
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
