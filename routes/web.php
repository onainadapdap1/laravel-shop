<?php

use App\Http\Controllers\Admin\RegisteredController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CollectionController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
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
    return view('frontend.index');
});

Auth::routes();

Route::get('collections', [CollectionController::class, 'index']);

// frontend
Route::get('collection/{group_url}', [CollectionController::class, 'groupview']);
Route::get('collection/{group_url}/{cate_url}', [CollectionController::class, 'categoryview']);
Route::get('collection/{group_url}/{cate_url}/{subcate_url}', [CollectionController::class, 'subcategoryview']);
Route::get('collection/{group_url}/{cate_url}/{subcate_url}/{prod_url}', [CollectionController::class, 'productview']);

Route::post('/add-to-cart', [CartController::class, 'addToCart']);
Route::get('/cart', [CartController::class, 'index']);
Route::get('/load-cart-data', [CartController::class, 'cartloadbyajax']);
Route::post('/update-to-cart', [CartController::class, 'updatetocart']);
Route::delete('/delete-from-cart', [CartController::class, 'deletefromcart']);
Route::get('clear-cart', [CartController::class, 'clearcart']);

Route::group(['middleware' => ['auth', 'isUser']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/my-profile', [UserController::class, 'myprofile']);
    Route::post('/my-profile-update', [UserController::class, 'profileupdate']);
});

Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard' , function () {
        return view("admin.dashboard");
    });

    // registered user
    Route::get('registered-user', [RegisteredController::class, 'index']);
    Route::get('role-edit/{id}', [RegisteredController::class, 'edit']);
    Route::put('role-update/{id}', [RegisteredController::class, 'updaterole']);

    // collection -> group
    Route::get('/group', [GroupController::class, 'index']);
    Route::get('/group-add', [GroupController::class, 'create']);
    Route::post('/group-store', [GroupController::class, 'store']);
    Route::get('/group-edit/{id}', [GroupController::class, 'edit']);
    Route::put('/group-update/{id}', [GroupController::class, 'updte']);
    Route::get('/group-delete/{id}', [GroupController::class, 'delete']);
    Route::get('/group-deleted-records', [GroupController::class, 'deletedrecords']);
    Route::get('/group-re-store/{id}', [GroupController::class, 'deletedrestore']);

    // collection -> category
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category-add', [CategoryController::class, 'create']);
    Route::post('/category-store', [CategoryController::class, 'store']);
    Route::get('/category-edit/{id}', [CategoryController::class, 'edit']);
    Route::put('/category-update/{id}', [CategoryController::class, 'update']);
    Route::get('/category-delete/{id}', [CategoryController::class, 'delete']);
    Route::get('/category-deleted-records', [CategoryController::class, 'deletedrecords']);
    Route::get('/category-re-store/{id}', [CategoryController::class, 'deletedrestore']);

    // collection -> sub category
    Route::get('/sub-category', [SubCategoryController::class, 'index']);
    Route::post('/sub-category-store', [SubcategoryController::class, 'store']);
    Route::get('/subcategory-edit/{id}', [SubcategoryController::class, 'edit']);
    Route::put('/sub-category-update/{id}', [SubcategoryController::class, 'update']);
    Route::get('/subcategory-delete/{id}', [SubcategoryController::class, 'delete']);

    // collection -> products
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/add-products', [ProductController::class, 'create']);
    Route::post('/store-product', [ProductController::class, 'store']);
    Route::get('/edit-products/{id}', [ProductController::class, 'edit']);
    Route::put('/update-product/{id}', [ProductController::class, 'update']);

});

Route::group(['middleware' => ['auth', 'isVendor']], function () {
    Route::get('/vendor-dashboard', function () {
        return view("vendor.vendor-dashboard");
    });
});
