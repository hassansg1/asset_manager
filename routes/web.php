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
        'building' => \App\Http\Controllers\BuildingController::class,
        'software' => \App\Http\Controllers\SoftwareController::class,
        'approval' => \App\Http\Controllers\ApprovalController::class,
        'permission' => \App\Http\Controllers\PermissionController::class,
    ]);
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


    Route::get('log/approve/{id}',[\App\Http\Controllers\LogController::class,'approve']);
    Route::get('log/reject/{id}',[\App\Http\Controllers\LogController::class,'reject']);
    Route::get('log/remove/{id}',[\App\Http\Controllers\LogController::class,'remove']);
    Route::get('test', [\App\Http\Controllers\AjaxController::class, 'test']);
});
