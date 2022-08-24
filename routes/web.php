<?php

use App\Http\Controllers\CPanel\CPanel\ShowCPanelController;
use App\Http\Controllers\CPanel\Permission\CrashedPermissionController;
use App\Http\Controllers\CPanel\Permission\PermissionController;
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

Route::get('/', function () {
    return view('welcome');
});


// Website Domain
Route::prefix('shofeetom')->group(function () {

    // Cpanel Domain
    Route::prefix('cpanel')->group(function () {
       

        // Cpanel Routes
        // {{ Show CPanel Function In ShowCPanelController}}
        Route::get('/', [ShowCPanelController::class, 'showCPanel'])->name('cpanel.dashboard');

        
            // Resource Routes
            // role Resources 
            Route::prefix('/')->group(function () {
                Route::resource('roles', RoleController::class);

            // Permission Resources
            Route::resource('permissions', PermissionController::class);
            // Crashed Permission
            Route::get('permissions-archived/crashed', [CrashedPermissionController::class, 'showCrashedPermission'])->name('crashed_permission.show');
            // End Resource Routes
            Route::get('permissions-archived/{id}/crashed', [CrashedPermissionController::class, 'retrivePermission'])->name('crashed_permission.retrive');
            // Force Delete Permission
            Route::delete('permissions-archived/{id}/crashed/force-delete', [CrashedPermissionController::class, 'forceDeletePermission'])->name('crashed_permission.force_delete');

          
        });
    });
});


