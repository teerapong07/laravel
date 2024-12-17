<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BackOfficeController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $title = 'About';
    return view('about', compact('title'));
});

Route::get('/contact', function () {
    $name = 'test';
    $age = 20;
    $salary = 1000;

    return view('contact', compact('name', 'age', 'salary'));
});

Route::get('/profile', function () {
    return view('profile', ['name' => 'test', 'age' => 20]);
});


Route::get('/params/{name}/{age}/{salary}', function ($name, $age, $salary) {
    return view('params', compact('name', 'age', 'salary'));
});

// POST
route::get('/post', function (Request $request) {
    return view('post');
});

route::post('/post', function (Request $request) {
    $name = $request->name;
    return json_encode(['name' => $name]);
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/response', function () {
    return response()->json(['name' => 'John']);
});

Route::get('/product', function () {
    $product = [
        ['id' => 1, 'name' => 'Product 1', 'price' => 100],
        ['id' => 2, 'name' => 'Product 2', 'price' => 200],
        ['id' => 3, 'name' => 'Product 3', 'price' => 300],
    ];
    return response()->json($product);
});

Route::get('response-type', function () {
    // 401 Unauthorized
    // 403 Forbidden
    // 404 Not Found
    // 500 Internal Server Error
    // 503 Service Unavailable
    // 200 OK
    // 201 Created
    // 204 No Content
    // 301 Moved Permanently
    // 302 Found
    // 307 Temporary Redirect
    // 400 Bad Request
    // 405 Method Not Allowed
    // 429 Too Many Requests
    // 500 Internal Server Error
    // 503 Service Unavailable

    return response('Unauthorized', 401);
});

Route::get('/redirect', function () {
    return redirect('/target');
});

Route::get('/target', function () {
    return response()->json(['message' => 'Target']);
});

Route::get('/customers', [CustomerController::class, 'list']);
Route::get('/customers/{id}', [CustomerController::class, 'detail']);
Route::post('/customers', [CustomerController::class, 'create']);
Route::put('/customers/{id}', [CustomerController::class, 'update']);
Route::delete('/customers/{id}', [CustomerController::class, 'delete']);

Route::get('/users', [UserController::class, 'list']);
Route::get('/users/form', [UserController::class, 'form']);
Route::post('/users', [UserController::class, 'create']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'delete']);
Route::get('/users/form/{id}', [UserController::class, 'edit']);


Route::get('/user/signIn', [UserController::class, 'signIn']);
Route::post('/user/signInProcess', [UserController::class, 'signInProcess']);
Route::get('/user/signOut', [UserController::class, 'signOut']);
Route::get('/user/info', [UserController::class, 'info'])->middleware(EnsureTokenIsValid::class);

Route::get('/backoffice', [BackOfficeController::class, 'index'])->middleware(EnsureTokenIsValid::class);


// Product
Route::get('/product/list', [ProductController::class, 'list']);
Route::get('/product/form', [ProductController::class, 'form']);
Route::post('/product', [ProductController::class, 'save']);
Route::get('/product/{id}', [ProductController::class, 'edit']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::get('/product/remove/{id}', [ProductController::class, 'remove']);

Route::post('/product/search', [ProductController::class, 'search']);
Route::get('/product-sort', [ProductController::class, 'sort']);
Route::get('/product-price-more-than', [ProductController::class, 'priceMoreThan']);
Route::get('/product-price-less-than', [ProductController::class, 'priceLessThan']);
Route::get('/product-price-between', [ProductController::class, 'priceBetween']);
Route::get('/product-price-not-between', [ProductController::class, 'priceNotBetween']);
Route::get('/product-price-in', [ProductController::class, 'priceIn']);
Route::get('/product-price-not-in', [ProductController::class, 'priceNotIn']);
Route::get('/product-price-max-min-count-avg', [ProductController::class, 'priceMaxCountAvg']);

Route::get('/product-type-list', [ProductController::class, 'productTypeList']);
Route::get('/list-by-product-type/{productTypeId}', [ProductController::class, 'listByProductType']);

Route::get('/product-type/list', [ProductTypeController::class, 'index']);
