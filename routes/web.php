<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return redirect()->to(url('dashboard'));
})->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::group(['middleware' => ['auth']], function () {
    Route::post('clearSession', [App\Http\Controllers\HomeController::class, 'clearSession']);
    Route::post('saveJustificationReason', [App\Http\Controllers\HomeController::class, 'saveJustificationReason']);
    Route::post('saveRejectionReason', [App\Http\Controllers\HomeController::class, 'saveRejectionReason']);

    Route::resources([
        'log' => \App\Http\Controllers\LogController::class,
        'site' => \App\Http\Controllers\SiteController::class,
        'room' => \App\Http\Controllers\RoomController::class,
        'role' => \App\Http\Controllers\RoleController::class,
        'right' => \App\Http\Controllers\RightController::class,
        'user' => \App\Http\Controllers\UserController::class,
        'user_id' => \App\Http\Controllers\UserIdController::class,
        'employee' => \App\Http\Controllers\EmployeeController::class,
        'unit' => \App\Http\Controllers\UnitController::class,
        'system' => \App\Http\Controllers\SystemController::class,
        'vendor' => \App\Http\Controllers\VendorController::class,
        'system_user' => \App\Http\Controllers\SystemUserIdController::class,
        'system_user_right' => \App\Http\Controllers\SystemUserRightController::class,
        'settings' => \App\Http\Controllers\SettingsController::class,
        'approver' => \App\Http\Controllers\ApproverController::class,
        'asset' => \App\Http\Controllers\AssetController::class,
        'asset_user' => \App\Http\Controllers\AssetUserIdController::class,
        'asset_group' => \App\Http\Controllers\AssetGroupController::class,
        'import' => \App\Http\Controllers\ImportController::class,
        'clause_import' => \App\Http\Controllers\ClauseImportController::class,
        'library_import' => \App\Http\Controllers\LibraryImportController::class,
        'software_import' => \App\Http\Controllers\SoftwareImportController::class,
        'patch_import' => \App\Http\Controllers\PatchImportController::class,
        'firewall_import' => \App\Http\Controllers\FirewallImportController::class,
        'user_import' => \App\Http\Controllers\UserImportController::class,
        'user_id_import' => \App\Http\Controllers\UserIdImportController::class,
        'nozomi_import' => \App\Http\Controllers\NozomiImportController::class,
        'clause' => \App\Http\Controllers\ClauseController::class,
        'clause_edit' => \App\Http\Controllers\StandardClauseEditController::class,
        'lone' => \App\Http\Controllers\LoneAssetController::class,
        'subsite' => \App\Http\Controllers\SubSiteController::class,
        'company' => \App\Http\Controllers\CompanyController::class,
        'cabinet' => \App\Http\Controllers\CabinetController::class,
        'networks' => \App\Http\Controllers\NetworkController::class,
        'building' => \App\Http\Controllers\BuildingController::class,
        'software' => \App\Http\Controllers\SoftwareController::class,
        'software_for_patch_approval' => \App\Http\Controllers\SoftwareForPatchApprovalController::class,
        'software_component' => \App\Http\Controllers\SoftwareComponentController::class,
        'installed_software' => \App\Http\Controllers\InstalledSoftwareController::class,
        'installed_patch' => \App\Http\Controllers\InstalledPatchesController::class,
        'patch_policy' => \App\Http\Controllers\PatchPolicyController::class,
        'patch_report' => \App\Http\Controllers\PatchReportController::class,
        'patch_report_view' => \App\Http\Controllers\PatchReportViewController::class,
        'asset_patch_report' => \App\Http\Controllers\AssetPatchReportController::class,
        'asset_patch_report_view' => \App\Http\Controllers\AssetPatchReportViewController::class,
        'software_patches_view' => \App\Http\Controllers\SoftwarePatchesViewController::class,
        'patches_software_edit' => \App\Http\Controllers\PatchesSoftwareEditController::class,
        'software_patches_edit' => \App\Http\Controllers\SoftwarePatchesEditController::class,
        'software_patch_approval' => \App\Http\Controllers\SoftwarePatchApprovalController::class,
        'patch' => \App\Http\Controllers\PatchController::class,
        'zone_policy' => \App\Http\Controllers\ZonePolicyController::class,
        'standard' => \App\Http\Controllers\StandardController::class,
        'approval' => \App\Http\Controllers\ApprovalController::class,
        'permission' => \App\Http\Controllers\PermissionController::class,
        'attachment' => \App\Http\Controllers\AttachmentController::class,
        'version' => \App\Http\Controllers\ComplianceUpdateController::class,
        'compliance_list' => \App\Http\Controllers\ComplianceListController::class,
        'standards.clause' => \App\Http\Controllers\StandardClauseController::class,
        'standards.clause_edit' => \App\Http\Controllers\StandardClauseController::class,
        'applicable_clause' => \App\Http\Controllers\ApplicableClauseController::class,
        'compliance_import' => \App\Http\Controllers\ComplianceImportController::class,
        'compliance_data_import' => \App\Http\Controllers\ComplianceDataImportController::class,
        'version.compliance' => \App\Http\Controllers\VersionComplianceController::class,
        'version_compliance' => \App\Http\Controllers\VersionComplianceController::class,
        'applicable_standard' => \App\Http\Controllers\ApplicableStandardController::class,
        'standards.applicable_clause' => \App\Http\Controllers\StandardApplicableClauseController::class,
        'patch_approval' => \App\Http\Controllers\PatchApprovalController::class,
        'firewall_zone' => \App\Http\Controllers\FirewallZoonController::class,
        'firewall_managment' => \App\Http\Controllers\FirewallManagmentController::class,
        'ip_address' => \App\Http\Controllers\FirewallIpAddressController::class,
        'firewall_address_group' => \App\Http\Controllers\FirewallAddressGroupController::class,
        'firewall_address_group_memeber' => \App\Http\Controllers\FirewallAddressGroupMembersController::class,
        'protocol' => \App\Http\Controllers\ProtocolController::class,
        'application' => \App\Http\Controllers\ApplicationController::class,
        'policy' => \App\Http\Controllers\PolicyController::class,
        'user_asset_report' => \App\Http\Controllers\ReportsController::class,
        'asset_lending_page' => \App\Http\Controllers\AssetLandingPageController::class,
        'risk_assesment' => \App\Http\Controllers\RiskAssessmentController::class,
        'risk' => \App\Http\Controllers\RiskController::class,
    ]);

    Route::post('nozomi_settings/save', [\App\Http\Controllers\NozomiSettingsController::class, 'saveSettings']);
    Route::group(['prefix' => 'nozomi'], function () {
        Route::resource('credentials', \App\Http\Controllers\NozomiSettingsController::class);
        Route::resource('/devices/report', \App\Http\Controllers\NozomiReportController::class);
        Route::get('/otcm/devices/report', [\App\Http\Controllers\NozomiReportController::class, 'otcm_devices']);
        Route::get('/otcm/nozomi/devices/report', [\App\Http\Controllers\NozomiReportController::class, 'otcm_nozomi_devices']);
        Route::get('/print/pdf', [\App\Http\Controllers\NozomiReportController::class, 'pdf']);
    });

    Route::group(['prefix' => 'reports'], function () {
        Route::resource('ports', \App\Http\Controllers\PortsReportController::class);
        Route::resource('ip_address', \App\Http\Controllers\IPAddressReportController::class);
        Route::resource('clauses_report', \App\Http\Controllers\ComplianceVersionReport::class);
        Route::get('/clauses_report/{version_id}/{complaint}', [\App\Http\Controllers\ComplianceVersionReport::class, 'show']);
        Route::get('/location_clauses_report/{location_id}/{complaint}', [\App\Http\Controllers\ComplianceVersionReport::class, 'location_wise_clauses']);
    });

    Route::get('closeCompliance/{id}', [\App\Http\Controllers\VersionComplianceController::class, 'closeCompliance']);
    Route::get('openCompliance/{id}', [\App\Http\Controllers\VersionComplianceController::class, 'openCompliance']);
    Route::post('PatchPage/LoadData', [\App\Http\Controllers\PatchApprovalAjaxController::class, 'loadData'])->name('PatchPage.loadData');
    Route::get('standards/view/{standard}/clause', [\App\Http\Controllers\StandardClauseController::class, 'index']);
    Route::get('standards/edit/{standard}/clause', [\App\Http\Controllers\StandardClauseEditController::class, 'index']);
    //................. ComplainceData...........
    Route::post('applicableClause/store', [App\Http\Controllers\ApplicableClauseController::class, 'storeClauseData'])->name('applicableClause.storeClauseData');
    Route::post('store/file/compliance/{id}', [App\Http\Controllers\ApplicableClauseController::class, 'complianceFileStore']);
    Route::get('applicable/compliance', [App\Http\Controllers\ApplicableClauseController::class, 'complianceApplicable'])->name('compliance.applicable');
    Route::get('applicable/compliance/viewDetail/{id}', [App\Http\Controllers\ApplicableClauseController::class, 'complianceApplicableViewDetail'])->name('compliance.applicable_viewDetail');
    Route::post('applicable/ClauseData/storeLocation', [App\Http\Controllers\ApplicableClauseController::class, 'storeComplianceDataLocations'])->name('compliance.storeComplianceDataLocations');
    Route::post('applyPatch', [App\Http\Controllers\InstalledPatchesController::class, 'ajaxStore'])->name('patch.ajaxStore');

    Route::group(['prefix' => 'assets'], function () {
        Route::resource('network', \App\Http\Controllers\NetworkAssetController::class);
        Route::resource('computer', \App\Http\Controllers\ComputerAssetController::class);
        Route::resource('l_one', \App\Http\Controllers\LoneAssetController::class);
    });
    Route::group(['prefix' => 'chart'], function () {
        Route::get('compliance_chart', [\App\Http\Controllers\ComplianceChartController::class, 'render']);
    });
    Route::get('/filterAssets/{parent}/{model?}', [\App\Http\Controllers\FilterAssetController::class, 'index']);
    Route::get('getNewAjaxRow', [\App\Http\Controllers\AjaxController::class, 'getNewAjaxRow']);
    Route::get('getNewAjaxForm', [\App\Http\Controllers\AjaxController::class, 'getNewAjaxForm']);
    Route::get('approve/status', [\App\Http\Controllers\AjaxController::class, 'approveStatus'])->name('approve.status');
    Route::post('unit/filter', [App\Http\Controllers\UnitController::class, 'filter'])->name('unit.filter');
    Route::post('saveHelp', [\App\Http\Controllers\HelpController::class, 'saveHelp']);
    Route::get('getPortsOfNetwork', [\App\Http\Controllers\AjaxController::class, 'getPortsOfNetwork']);
    Route::post('deletePortsRow', [\App\Http\Controllers\AjaxController::class, 'deletePortsRow']);
    Route::get('getIPAddressOfNetwork', [\App\Http\Controllers\AjaxController::class, 'getIPAddressOfNetwork']);
    Route::post('checkDeleteCriteria', [\App\Http\Controllers\AjaxController::class, 'checkDeleteCriteria'])->name('resource.deleteCheck');


    Route::get('log/approve/{id}', [\App\Http\Controllers\LogController::class, 'approve']);
    Route::get('log/reject/{id}', [\App\Http\Controllers\LogController::class, 'reject']);
    Route::get('log/remove/{id}', [\App\Http\Controllers\LogController::class, 'remove']);
    Route::get('export_templates', [\App\Http\Controllers\AjaxController::class, 'exportDataTemplates'])->name('export_templates');
    Route::get('system/user_accounts/{id}', [\App\Http\Controllers\AjaxController::class, 'system_user_accounts']);
    Route::get('asset/type/{type}', [\App\Http\Controllers\AjaxController::class, 'type_wise_assets']);
    Route::get('system/type/{type}', [\App\Http\Controllers\AjaxController::class, 'system_wise_user_accounts']);
    Route::get('unit/type/{type}', [\App\Http\Controllers\AjaxController::class, 'unit_wise_users']);
    Route::get('asset/location/{type}', [\App\Http\Controllers\AjaxController::class, 'asset_wise_ip_address']);
    Route::get('connected_asset/location/{type}', [\App\Http\Controllers\AjaxController::class, 'connected_asset_wise_ip_address']);
    Route::get('delete_asseigned_id/{type}', [\App\Http\Controllers\AjaxController::class, 'delete_assigned_user_id']);
    Route::get('delete_assigned_id/{type}', [\App\Http\Controllers\AjaxController::class, 'delete_assigned_id']);
    Route::get('asseigned_id/{type}', [\App\Http\Controllers\AjaxController::class, 'assigned_user_id']);
    Route::get('asseigned_id_to_user/{type}', [\App\Http\Controllers\AjaxController::class, 'assigned_id_to_user']);
    Route::get('system/detail/{id}', [\App\Http\Controllers\SystemController::class, 'show']);
    Route::get('right/detail/{id}', [\App\Http\Controllers\RightController::class, 'show']);
    Route::get('employee/detail/{id}', [\App\Http\Controllers\EmployeeController::class, 'show']);
    Route::get('user_id/detail/{id}', [\App\Http\Controllers\UserIdController::class, 'show']);
    Route::get('firewall/detail/{id}', [\App\Http\Controllers\FirewallManagmentController::class, 'show']);
    Route::get('risk_assessment/detail/{id}', [\App\Http\Controllers\RiskAssessmentController::class, 'show']);
    Route::get('risk/detail/{id}', [\App\Http\Controllers\RiskController::class, 'show']);

    Route::get('vendor/detail/{id}', [\App\Http\Controllers\VendorController::class, 'show']);
    Route::get('software/detail/{id}', [\App\Http\Controllers\SoftwareController::class, 'show']);
    Route::get('software_component/detail/{id}', [\App\Http\Controllers\SoftwareComponentController::class, 'show']);
    Route::get('installed_software/detail/{id}', [\App\Http\Controllers\InstalledSoftwareController::class, 'show']);
    Route::get('patch/detail/{id}', [\App\Http\Controllers\PatchController::class, 'show']);
    Route::get('installed_patch/detail/{id}', [\App\Http\Controllers\InstalledPatchesController::class, 'show']);

    Route::get('export_compliance_date_template', [\App\Http\Controllers\AjaxController::class, 'exportComplianceDataTemplates'])->name('export_compliance_date_template');

    Route::get('dashboard', [\App\Http\Controllers\DashBoardController::class, 'index']);
    Route::get('task', [\App\Http\Controllers\TaskController::class, 'index'])->name('task');
    Route::get('task/detail/{id}', [\App\Http\Controllers\TaskController::class, 'viewLogDetais']);
    Route::get('change/task/{id}/{status}', [\App\Http\Controllers\TaskController::class, 'changeTaskStatus']);

    Route::get('notification', function () {
        $heading = 'Notification';
        return view('notification.index', compact('heading'));
    });
    Route::post('changeApplicableStatus', [\App\Http\Controllers\ApplicableStandardController::class, 'changeApplicableStatus'])->name('standard.changeApplicableStatus');
    Route::get('getLocationsOfCompliance', [\App\Http\Controllers\ApplicableClauseController::class, 'getLocationsOfCompliance']);
    Route::post('updateComplianceVersionItems', [\App\Http\Controllers\ApplicableClauseController::class, 'updateComplianceVersionItems']);
    Route::post('updateComplianceVersionItemsAttachmentId', [\App\Http\Controllers\ApplicableClauseController::class, 'updateComplianceVersionItemsAttachmentId']);
    Route::post('sidebar_tree', [\App\Http\Controllers\LocTreeController::class, 'sidebar_tree'])->name('sidebar_tree');
    Route::get('testCron', [\App\Http\Controllers\TestController::class, 'test']);


    Route::get('view/assets/{id}/{nodeid?}', [\App\Http\Controllers\SeeAssetController::class, 'view'])->name('view/assets');
//    Patch Approval
    Route::post('patch/approve/', [\App\Http\Controllers\PatchApprovalSecondaryController::class, 'bulkApprove'])->name('patch.bulkApprove');
    Route::post('patch/approve/save', [\App\Http\Controllers\PatchApprovalSecondaryController::class, 'bulkApproveSave'])->name('patch.bulkApprove.save');

    Route::post('software/approve/', [\App\Http\Controllers\PatchApprovalSecondaryController::class, 'bulkApproveSoftware'])->name('software.bulkApprove');
    Route::post('software/approve/save', [\App\Http\Controllers\PatchApprovalSecondaryController::class, 'bulkApproveSoftwareSave'])->name('software.bulkApprove.save');

//    Apply Patches
    Route::post('patch/apply', [\App\Http\Controllers\PatchApplyController::class, 'bulkApplyPatches'])->name('patch.applyBulkPatches');

    //Patch Approval New Code
    Route::get('patchApproval/software', [\App\Http\Controllers\PatchSoftwareApprovalController::class, 'softwarePatchApproval'])->name('software.softwarePatchApproval');
    Route::post('patchApproval/software/save', [\App\Http\Controllers\PatchSoftwareApprovalController::class, 'softwarePatchApprovalSave'])->name('software.softwarePatchApprovalSave');
    Route::post('patchApproval/software/delete', [\App\Http\Controllers\PatchSoftwareApprovalController::class, 'softwarePatchApprovalDelete'])->name('software.softwarePatchApprovalDelete');
    Route::post('softwareApproval/patch/save', [\App\Http\Controllers\PatchSoftwareApprovalController::class, 'patchSoftwareApprovalSave'])->name('patch.patchSoftwareApprovalSave');
    Route::post('patchInstall/asset/save', [\App\Http\Controllers\PatchSoftwareApprovalController::class, 'patchAssetInstallSave'])->name('patch.patchAssetInstallSave');
    Route::post('assetInstall/patch/save', [\App\Http\Controllers\PatchSoftwareApprovalController::class, 'assetPatchInstallSave'])->name('asset.assetPatchInstallSave');

    //Patch Policy delete
    Route::post('patchApprovalPolicy/delete', [\App\Http\Controllers\PatchSoftwareApprovalController::class, 'patchPolicyDelete'])->name('patchPolicyDelete');
    Route::get('showCompliancePopup', [\App\Http\Controllers\AjaxController::class, 'showCompliancePopup']);
    Route::post('submitCompliance', [\App\Http\Controllers\ComplianceUpdateController::class, 'submitCompliance']);

    //
    Route::get('getLocationsOfRole/{roleId}', [\App\Http\Controllers\RoleController::class, 'getLocationsOfRole']);
});
Route::get('/linkstorage', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
});
Route::get('/docs/{filename}', [\App\Http\Controllers\FileAccessController::class, 'getFile']);
Route::get('/getCommentIframe/{id}', [\App\Http\Controllers\AjaxController::class, 'getCommentIframe']);
Route::get('syncAssets', function () {
    \App\Models\Location::fixtree();
});
Route::get('clauseLoad/smartLoad', [\App\Http\Controllers\SmartClauseLoadController::class, 'index'])->name('clauses.smartLoad');

// Reports Module

Route::group(['prefix' => 'reports'], function () {
    Route::resource('asset_report', \App\Http\Controllers\AssetReportController::class);
});

Route::get('getColumnSearchRow',[\App\Http\Controllers\AjaxController::class,'getColumnSearchRow']);