<script>
    $(document).on('change', '.select_row', function () {
        let type = 'software';

        if (this.checked) {
            let id = $(this).attr('data-software');
            if (id) {
                $('#selected_' + type).append('<input type="hidden" value="' + id + '" name="checked_' + type + '[]" id="' + type + id + '">');
            }
        } else {
            let id = $(this).attr('data-software');
            $('#' + type + id).remove();
        }
    });
    $(document).on('change', '.select_patch_cb', function () {
        let id = $(this).val();
        $('#show_patch_' + id).remove();
        let show_name = $(this).attr('data-show_name');
        if (this.checked) {
            $('.selected_patch_list').append('<li id="show_patch_' + id + '">' + show_name + '</li>');
        } else {
            $('#show_patch_' + id).remove();
        }
    });

    function patchSoftwareApprovals() {
        $('#software_patch_modal').modal('show');
        $('#software_for_patch_approval').html('');
        loadDataTableDynamically('software_for_patch_approval', 'software_for_patch_approval');
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

    function editPatchSoftwareApprovals() {
        $('#edit_patch_software_modal').modal('show');
        loadDataTableDynamically('patches_software_edit', 'patches_software_edit');
    }

    function savePatchSoftwareApprovals() {
        let patch_ids = $("input[name='checked_patch[]']")
            .map(function () {
                return $(this).val();
            }).get();
        let softwares = $("input[name='checked_software_for_patch_approval[]']")
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
                $('.modal').modal('hide');
            },
        });
    }

    function deletePatchSoftwareApproval() {
        let con = confirm("Are you sure you want to proceed?");
        if (con) {
            let patchPolicyId = $("input[name='checked_delete_patch_software_approved[]']")
                .map(function () {
                    return $(this).val();
                }).get();
            $.ajax({
                type: "POST",
                url: '{{ route("patchPolicyDelete") }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    patchPolicyId: patchPolicyId,
                },
                success: function (result) {
                    if (result.status)
                        doSuccessToast(result.message);
                    else
                        doErrorToast(result.message);
                    $('.modal').modal('hide');
                },
            });
        }
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
                $('.modal').modal('hide');
            },
        });
    }
</script>
