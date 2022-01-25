<div class="modal fade bs-example-modal-xl" id="software_patch_modal" tabindex="-1" role="dialog"
     aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Approve Software(s) for selected patches</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Select one or multiple software</li>
                    <li>Click on the save button at the bottom to approve the selected software(s) for selected patches
                    </li>
                </ul>
                Selected Patches are as following
                <ul class="selected_patch_list"></ul>
                <div id="selected_software">
                </div>
                <div id="software_for_patch_approval"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success pull-right" onclick="savePatchSoftwareApprovals()">Approve</button>
                <button class="btn btn-danger pull-right" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade bs-example-modal-xl" id="asset_patch_modal" tabindex="-1" role="dialog"
     aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Select Assets to install the selected patches</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Select one or multiple assets</li>
                    <li>Click on the save button at the bottom to install the selected patches on selected assets
                    </li>
                </ul>
                Selected Patches are as following
                <ul class="selected_patch_list"></ul>
                <div id="selected_patch_report">
                </div>
                <div id="patch_report"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success pull-right" onclick="savePatchAssetInstalls()">Install</button>
                <button class="btn btn-danger pull-right" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade bs-example-modal-xl" id="view_patch_software_modal" tabindex="-1" role="dialog"
     aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Approved Software(s) list for selected patches</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="software_patches_view"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger pull-right" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade bs-example-modal-xl" id="edit_patch_software_modal" tabindex="-1" role="dialog"
     aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Delete patch approval for selected patches</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Select one or multiple software(s)</li>
                    <li>Click on the delete approval button at the bottom to delete the approval of selected softwares
                    </li>
                </ul>
                <div id="patches_software_edit"></div>
            </div>
            <div class="modal-footer">
                <button onclick="deletePatchSoftwareApproval()" class="btn btn-danger pull-right"
                        data-bs-dismiss="modal">Delete Approval
                </button>
                <button class="btn btn-danger pull-right" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade bs-example-modal-xl" id="view_patch_assets_modal" tabindex="-1" role="dialog"
     aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Assets on which the selected patches are
                    installed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="patch_report_view"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger pull-right" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
