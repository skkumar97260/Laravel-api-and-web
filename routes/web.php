<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\ProductController;

Route::get('/welcome', function () {
    return view('auth.signup');
});
Route::get('/login', [AuthController::class, 'loginView'])->name('login');

Route::get('/signup', [AuthController::class, 'signupView'])->name('signup');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');

Route::middleware('auth')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});




//http://localhost:8000/products  -->web.php

// use App\Models\Product;
// use App\Models\User;

// public function indexView()
// {
//     $products = Product::all();
//     $users = User::all();

//     return view('products.index', compact('products', 'users')); // for frontend blade to pass full like post,get,update,delete( mulipile api like product, user, order)
// }
//
// Route::get('/products', [ProductController::class, 'indexView'])->name('products.index'); // for frontend blade