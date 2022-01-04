<form action="" id="data_form">
    {{ csrf_field() }}
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Apply Patches</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <button type="button" onclick="applyBulkPatch()" class="btn btn-primary">Apply Bulk Patches</button>
            <div class="row">
                <div class="table-responsive">
                    <table class="table mb-0" id="">
                        <thead>
                        <tr>
                            <th class="select_all_checkbox" style="width: 10px"><input
                                    onclick="toggleSelectAllPatch()"
                                    type="checkbox" name=""
                                    id="select_all_patch"></th>
                            <th>Patch</th>
                            <th>Asset</th>
                            <th>Approved</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('patch_report.form_rows',['items'=> $items])
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="saveSettings()" class="pull-right btn btn-success">Save</button>
        </div>
    </div><!-- /.modal-content -->
</form>
<script>
    function toggleSelectAllPatch() {
        $('.select_patch').not(':disabled').prop('checked', $('#select_all_patch').is(":checked"));
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

    function saveSettings() {
        $.ajax({
            type: "POST",
            url: '{{ route("patch.bulkApprove.save") }}',
            data: $('#data_form').serialize(),
            success: function (result) {
                if (result.status) {
                    doSuccessToast();
                    $('.modal').modal('hide');
                }
            },
        });
    }
</script>
