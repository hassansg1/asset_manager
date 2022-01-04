<form action="" id="data_form">
    {{ csrf_field() }}
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Select Patches</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="table-responsive">
                    <table class="table mb-0" id="">
                        <thead>
                        <tr>
                            <th>Software</th>
                            <th>Approved Patches</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>
                                    {{ $item->show_name }}
                                    <input type="hidden" name="software[]" value="{{ $item->id }}">
                                </td>
                                <td>
                                    <select class="form-control select2" name="patch_id[{{ $item->id }}][]" multiple
                                            required>
                                        <option value="">Search by Name</option>
                                        @foreach($patches as $patch)
                                            @if($item->id != $patch->software_id)
                                                <option
                                                    {{ checkIfPatchApproved($patch->id,$item->id) ? 'selected' : '' }}
                                                    value="{{ $patch->id }}">{{ $patch->show_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        @endforeach
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
    function saveSettings() {
        $.ajax({
            type: "POST",
            url: '{{ route("software.bulkApprove.save") }}',
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
