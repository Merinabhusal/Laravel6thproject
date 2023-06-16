<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\customercontroller;
use App\Http\Controllers\Customercontroller as ControllersCustomercontroller;
use App\Http\Controllers\Gallarycontroller;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Cart;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[PagesController::class,'home'])->name('home');

Route::get('/viewproduct/{product}',[PagesController::class,'viewproduct'])->name('viewproduct');

Route::get('/userlogin',[PagesController::class,'userlogin'])->name('userlogin');

Route::get('/userregister',[UserController::class,'userregister'])->name('user.register');
Route::post('/userregister',[UserController::class,'userstore'])->name('user.register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','isadmin'])->name('dashboard');


Route::middleware(['auth'])->group(function(){
    Route::get('/mycart',[CartController::class,'index'])->name('cart.index');
    Route::post('/mycart/store',[CartController::class,'store'])->name('cart.store');
});


Route::get('/showproducts/{id}', [PagesController::class, 'showproducts'])->name('showproducts');


Route::get('/cart/destroy/{id}',[CartController::class,'destroy'])->name('cart.destroy');

Route::middleware(['auth','isadmin'])->group(function () {



//category
    Route::get('/category',[categoryController::class,'index'])->name('category.index');
    Route::get('/category/create',[categoryController::class,'create'])->name('category.create');
    Route::post('/category/store',[categoryController::class,'store'])->name('category.store');
    Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/{id}/update',[CategoryController::class,'update'])->name('category.update');
    //Route::get('/category{id}/destroy',[CategoryController::class,'destroy'])->name('category.destroy');
    
    Route::post('/category/destroy',[CategoryController::class,'destroy'])->name('category.destroy');
    
    
    
    
    
    
     
    
    
    //Customers
    
    Route::get('/customer',[Customercontroller::class,'index'])->name('customer.index');
    Route::get('/customer/create',[customercontroller::class,'create'])->name('customer.create');
    Route::post('/customer',[customercontroller::class,'store'])->name('customer.store');
    Route::get('/customer/{id}/edit',[customercontroller::class,'edit'])->name('customer.edit');
    Route::post('/customer/{id}/update',[customercontroller::class,'update'])->name('customer.update');
    Route::post('/customer/destroy',[customercontroller::class,'destroy'])->name('customer.destroy'); 
    
    
    //products
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/{id}/update',[ProductController::class,'update'])->name('product.update');
    Route::post('/product/destroy',[ProductController::class,'destroy'])->name('product.destroy'); 

   

    
    


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



  

});

require __DIR__.'/auth.php';
