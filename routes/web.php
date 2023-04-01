<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::put('/user/edit',[UserController::class,'store']);


Route::get('/home', function () {
    return QrCode::generate('Karam');
    return view('home');
});

Route::get('/restaurant/public', [RestaurantController::class,'all_restaurants_public']);
Route::get('/restaurant/{restaurant}/public',[RestaurantController::class,'public_view'])->name('public_view');

Route::resource('restaurant', RestaurantController::class);
Route::resource('menu', MenuController::class);

Route::put('/menu/{menu}/update-status',[MenuController::class,'update_status']);
Route::get('/menu/{menu}/public',[MenuController::class,'public_view']);

Route::resource('section', SectionController::class);

Route::resource('item', ItemController::class)->except('create');
Route::get('/item/create/{menu}',[ItemController::class,'create']);

Route::get('/restaurant/{restaurant}/menus',[RestaurantController::class,'menus']);






require __DIR__.'/auth.php';
