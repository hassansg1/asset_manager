<div class="modal fade bs-example-modal-xl" id="software_patch_modal" tabindex="-1" role="dialog"
     aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Patch Approval for <span
                        class="software_heading"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Select one or multiple patches</li>
                    <li>Click on the save button at the bottom to approve the selected patches</li>
                </ul>
                <div id="selected_patch">
                </div>
                <div id="software_patch_approval"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success pull-right" onclick="saveSoftwarePatchApprovals()">Save</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade bs-example-modal-xl" id="view_software_patch_modal" tabindex="-1" role="dialog"
     aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Approved patches for <span
                        class="software_heading"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="software_patches_view"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger pull-right" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade bs-example-modal-xl" id="edit_software_patch_modal" tabindex="-1" role="dialog"
     aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Approved patches for <span
                        class="software_heading"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="selected_software_patches_edit">
                </div>
                <div id="software_patches_edit"></div>
            </div>
            <div class="modal-footer">
                <button onclick="deletePatchApproval()" class="btn btn-danger pull-right">Delete</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
