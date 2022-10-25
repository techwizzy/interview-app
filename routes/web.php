<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        $message = 'Good to see you again,  ' . Auth::user()->name;
        return redirect('access/permissions')->with('success', $message);
        })->name('dashboard');

    Route::group(['prefix' => 'access', 'as' => 'access.'], function () {
        Route::get('users/list', [ UserController::class, 'getUsers'])->name('users.list');
        Route::post('users/delete-user', [UserController::class, 'deleteUser'])->name('users.delete-user');
        Route::post('users/restore/{id}', [UserController::class, 'restore'])->name('users.restore');
        Route::resources([
            'users' => UserController::class
        ]);

        Route::resources([
            'roles' => RoleController::class
        ]);

        Route::resources([
            'permissions' => PermissionController::class
        ]);

        Route::resources([
            'activities' => ActivityController::class
        ]);

    });

});

require __DIR__.'/auth.php';
