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

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

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
        'user' => \App\Http\Controllers\UserController::class,
        'unit' => \App\Http\Controllers\UnitController::class,
        'asset' => \App\Http\Controllers\AssetController::class,
        'import' => \App\Http\Controllers\ImportController::class,
        'subsite' => \App\Http\Controllers\SubSiteController::class,
        'company' => \App\Http\Controllers\CompanyController::class,
        'cabinet' => \App\Http\Controllers\CabinetController::class,
        'networks' => \App\Http\Controllers\NetworkController::class,
        'lone' => \App\Http\Controllers\LoneAssetController::class,
        'standard' => \App\Http\Controllers\StandardController::class,
        'applicable_standard' => \App\Http\Controllers\ApplicableStandardController::class,
        'version' => \App\Http\Controllers\ComplianceUpdateController::class,
        'building' => \App\Http\Controllers\BuildingController::class,
        'software' => \App\Http\Controllers\SoftwareController::class,
        'approval' => \App\Http\Controllers\ApprovalController::class,
        'applicable_clause' => \App\Http\Controllers\ApplicableClauseController::class,
        'clause' => \App\Http\Controllers\ClauseController::class,
        'permission' => \App\Http\Controllers\PermissionController::class,
        'compliance_list' => \App\Http\Controllers\ComplianceListController::class,
        'compliance_import' => \App\Http\Controllers\ComplianceImportController::class,
        'standards.clause' => \App\Http\Controllers\StandardClauseController::class,
        'standards.applicable_clause' => \App\Http\Controllers\StandardApplicableClauseController::class,
        'version.compliance' => \App\Http\Controllers\VersionComplianceController::class,
        'version_compliance' => \App\Http\Controllers\VersionComplianceController::class,
        'files' => \App\Http\Controllers\FilesUploadController::class,
        'attachment' => \App\Http\Controllers\AttachmentController::class,
    ]);
    Route::get('standards/view/{standard}/clause', [\App\Http\Controllers\StandardClauseController::class, 'viewStandards']);
    //................. ComplainceData...........
    Route::post('complianceData/store', [App\Http\Controllers\ApplicableClauseController::class, 'storeComplaiceData'])->name('compliance.storeComplaiceData');
    Route::post('store/file/compliance/{id}', [App\Http\Controllers\ApplicableClauseController::class, 'complianceFileStore']);
    Route::get('applicable/compliance', [App\Http\Controllers\ApplicableClauseController::class, 'complianceApplicable'])->name('compliance.applicable');
    Route::get('applicable/compliance/viewDetail/{id}', [App\Http\Controllers\ApplicableClauseController::class, 'complianceApplicableViewDetail'])->name('compliance.applicable_viewDetail');
    Route::post('applicable/complianceData/storeLocation', [App\Http\Controllers\ApplicableClauseController::class, 'storeComplianceDataLocations'])->name('compliance.storeComplianceDataLocations');
    Route::post('files/images',[App\Http\Controllers\FilesUploadController::class,'filesStore']);

    Route::post('complianceData/store',[App\Http\Controllers\ComplianceController::class,'storeComplaiceData'])->name('compliance.storeComplaiceData');
    Route::post('store/file/compliance/{id}',[App\Http\Controllers\ComplianceController::class,'complianceFileStore']);
    Route::get('applicable/compliance',[App\Http\Controllers\ComplianceController::class,'complianceApplicable'])->name('compliance.applicable');
    Route::get('applicable/compliance/viewDetail/{id}',[App\Http\Controllers\ComplianceController::class,'complianceApplicableViewDetail'])->name('compliance.applicable_viewDetail');
    Route::post('applicable/complianceData/storeLocation',[App\Http\Controllers\ComplianceController::class,'storeComplianceDataLocations'])->name('compliance.storeComplianceDataLocations');

    Route::group(['prefix' => 'assets'], function () {
        Route::resource('network', \App\Http\Controllers\NetworkAssetController::class);
        Route::resource('computer', \App\Http\Controllers\ComputerAssetController::class);
        Route::resource('l_one', \App\Http\Controllers\LoneAssetController::class);
    });

    Route::get('/filterAssets/{parent}/{model?}', [\App\Http\Controllers\FilterAssetController::class, 'index']);
    Route::get('getNewAjaxRow', [\App\Http\Controllers\AjaxController::class, 'getNewAjaxRow']);
    Route::get('getNewAjaxForm', [\App\Http\Controllers\AjaxController::class, 'getNewAjaxForm']);
    Route::post('unit/filter', [App\Http\Controllers\UnitController::class, 'filter'])->name('unit.filter');
    Route::post('saveHelp', [\App\Http\Controllers\HelpController::class, 'saveHelp']);
    Route::get('getPortsOfNetwork', [\App\Http\Controllers\AjaxController::class, 'getPortsOfNetwork']);
    Route::post('checkDeleteCriteria', [\App\Http\Controllers\AjaxController::class, 'checkDeleteCriteria'])->name('resource.deleteCheck');


    Route::get('log/approve/{id}', [\App\Http\Controllers\LogController::class, 'approve']);
    Route::get('log/reject/{id}', [\App\Http\Controllers\LogController::class, 'reject']);
    Route::get('log/remove/{id}', [\App\Http\Controllers\LogController::class, 'remove']);
    Route::get('export_templates', [\App\Http\Controllers\AjaxController::class, 'exportDataTemplates'])->name('export_templates');

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
    Route::get('testCron', [\App\Http\Controllers\TestController::class, 'test']);
});
