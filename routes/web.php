<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductController2;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
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

Route::get('list', [ProductController::class, 'index']);
Route::get('add', [ProductController::class, 'add']);//add and save go together
Route::post('save', [ProductController::class, 'save']);
Route::get('edit/{id}', [ProductController::class, 'edit']);//edit and update go together
Route::post('update', [ProductController::class, 'update']);//edit and update go together
Route::get('delete/{id}', [ProductController::class, 'delete']);//edit and update go together

Route::get('/', [ProductController2::class, 'index']);
Route::get('products', [ProductController2::class, 'getProducts']);

Route::get('/search', [SearchController::class, 'Search'])->name('web.search');

Route::get('/login', [CustomerController::class, 'login']);
Route::get('/register', [CustomerController::class, 'register']);
Route::post('/register-user', [CustomerController::class, 'registerUser'])->name('register-user');
Route::post('login-user', [CustomerController::class, 'loginUser'])->name('login-user');
Route::get('logout', [CustomerController::class, 'logout']);
Route::get('/profile', [CustomerController::class, 'profile']);
Route::get('profileedit/{id}', [CustomerController::class, 'edit3']);
Route::post('update3', [CustomerController::class, 'update3']);
Route::get('deleteProfile/{id}', [CustomerController::class, 'confirmDelete']);

Route::get('singleProduct/{id}', [ProductController2::class, 'getSingleProduct']);
Route::post('addToCart/{id}', [CartOrderController::class, 'addToCart']);
Route::get('cart', [CartController::class, 'index']);
Route::get('removeItem/{id}', [CartOrderController::class, 'removeItem']);
Route::get('quantityEdit/{id}', [CartOrderController::class, 'quantityEdit']);
Route::post('quantityUpdate', [CartOrderController::class, 'quantityUpdate']);

Route::get('admindashboard.admin.list', [AdminController::class, 'index']);
Route::get('admindashboard.admin', [AdminController::class, 'admin']);

Route::get('admindashboard.login2', [AdminController::class, 'login2']);
Route::post('login-admin', [AdminController::class, 'loginadmin'])->name('login-admin');
Route::get('logout2', [AdminController::class, 'logout2']);

Route::get('admindashboard.product.list2', [ProductController::class, 'index2']);
Route::get('admindashboard.product.add', [ProductController::class, 'add']);
Route::get('admindashboard.product.edit/{id}', [ProductController::class, 'edit']);

Route::get('admindashboard.admin.list', [AdminController::class, 'index']);
Route::get('admindashboard.admin.add2', [AdminController::class, 'add2']);
Route::post('save2', [AdminController::class, 'save2']);
Route::get('admindashboard.admin.edit2/{id}', [AdminController::class, 'edit2']);
Route::post('update2', [AdminController::class, 'update2']);
Route::get('delete2/{id}', [AdminController::class, 'delete2']);




