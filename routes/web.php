<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ScootersController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ManagersController;
use App\Http\Controllers\AdminController;


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

Route::get('/', [ScootersController::class, 'scooters']);

Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin', 'auth', 'PreventBackHistory']], function(){

    Route::get('/scooters', [AdminController::class, 'scooters'])->name('admin.scooters');

    Route::get('/scooters/{id}', [AdminController::class, 'showOneKind'])->name('admin.scooter');
        
    Route::get('/scooters/{id}/delete', [AdminController::class, 'deleteOneScooterKind'])->name('admin.scooter-delete');

    Route::get('/rent-places', [AdminController::class, 'rentPlaces'])->name('admin.rent-places');
    
    Route::get('/rent-places/{id}/delete', [AdminController::class, 'deleteOneRentPlace'])->name('admin.rent-place-delete');
    
    Route::get('/clients', [AdminController::class, 'clients'])->name('admin.clients');
    
    Route::get('/managers', [AdminController::class, 'managers'])->name('admin.managers');
    
    Route::get('/add-new-kind', [AdminController::class, 'addNewKind'])->name('admin.add-new-kind');
    
    Route::get('/scooters/{id}/add-new-scooter', [AdminController::class, 'addNewScooter'])->name('admin.add-new-scooter');

    Route::get('/scooters/{id}/{scooterId}/delete', [AdminController::class, 'deleteOneScooter'])->name('admin.scooter-item-delete');
    
    Route::get('/add-new-rent-place', [AdminController::class, 'addNewRentPlace'])->name('admin.add-new-rent-place');

    
    Route::post('/add-new-kind-button', [AdminController::class, 'addNewKindButton'])->name('admin.add-new-kind-button');
    
    Route::post('/add-new-rent-place-button', [AdminController::class, 'addNewRentPlaceButton'])->name('admin.add-new-rent-place-button');

    Route::post('/scooters/{id}/add-new-scooter-button', [AdminController::class, 'addNewScooterButton'])->name('admin.add-new-scooter-button');
});

Route::group(['prefix'=>'manager', 'middleware'=>['isManager', 'auth', 'PreventBackHistory']], function(){
    Route::get('/clients', [ManagersController::class, 'clients'])->name('manager.clients');
    
    Route::get('/rents', [ManagersController::class, 'rents'])->name('manager.rents');

    Route::get('/rents/{id}/refuse', [ManagersController::class, 'rentRefuse'])->name('manager.rents-refuse');

    Route::post('/rents/{id}', [ManagersController::class, 'rentAccept'])->name('manager.rents-accept');
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser', 'auth', 'PreventBackHistory']], function(){
    Route::get('/scooters', [UsersController::class, 'scooters'])->name('user.scooters');

    Route::get('/scooters/{id}', [UsersController::class, 'scooter'])->name('user.scooter');
    
    Route::get('/rent-places', [UsersController::class, 'rentPlaces'])->name('user.rent-places');

    Route::get('/reviews', [UsersController::class, 'reviews'])->name('user.reviews');

    Route::get('/create-review', [UsersController::class, 'createReview'])->name('user.create-review');

    Route::post('/create-review-button', [UsersController::class, 'createReviewButton'])->name('user.create-review-button');

    Route::get('/reviews/{id}/delete', [UsersController::class, 'deleteReview'])->name('user.delete-review');

    Route::post('/scooters/{id}/{scooterId}', [UsersController::class, 'scooterRent'])->name('user.scooter-rent');
});