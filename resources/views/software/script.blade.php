<script>
    function softwarePatchApprovals(softwareId, name) {
        $('#not_in_software_id').val(softwareId);
        $('#software_patch_modal').modal('show');
        $('.software_heading').text(name);
        $('#selected_software_patch_approval').html('');
        loadDataTableDynamically('software_patch_approval', 'software_patch_approval');
    }

    function viewSoftwarePatchApprovals(softwareId, name) {
        $('#software_id_filter').val(softwareId);
        $('#view_software_patch_modal').modal('show');
        $('.software_heading').text(name);
        loadDataTableDynamically('software_patches_view', 'software_patches_view');
    }

    function editSoftwarePatchApprovals(softwareId, name) {
        $('#not_in_software_id').val(softwareId);
        $('#software_id_filter').val(softwareId);
        $('#edit_software_patch_modal').modal('show');
        $('.software_heading').text(name);
        $('#selected_software_patches_edit').html('');
        loadDataTableDynamically('software_patches_edit', 'software_patches_edit');
    }

    function deletePatchApproval() {
        let softwareId = $('#not_in_software_id').val();
        let patches = $("input[name='checked_software_patches_edit[]']")
            .map(function () {
                return $(this).val();
            }).get();
        $.ajax({
            type: "POST",
            url: '{{ route("software.softwarePatchApprovalDelete") }}',
            data: {
                '_token': '{{ csrf_token() }}',
                softwareId: softwareId,
                patches: patches
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

    function saveSoftwarePatchApprovals() {
        let softwareId = $('#not_in_software_id').val();
        let patches = $("input[name='checked_software_patch_approval[]']")
            .map(function () {
                return $(this).val();
            }).get();
        $.ajax({
            type: "POST",
            url: '{{ route("software.softwarePatchApprovalSave") }}',
            data: {
                '_token': '{{ csrf_token() }}',
                softwareId: softwareId,
                patches: patches
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
