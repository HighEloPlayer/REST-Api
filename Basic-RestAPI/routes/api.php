<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


 
Route::get('products', [ProductController::class, 'allProducts']);

Route::post('product/add',[ProductController::class, 'addProduct']);

Route::get('products/{product_id}',[ProductController::class, 'singleProduct']);

Route::get('products/{category}/category',[ProductController::class, 'categoryProduct']);

Route::put('products/{product_id}/update',[ProductController::class, 'updateProduct']);

Route::delete('products/{product_id}/delete',[ProductController::class, 'deleteProduct']);

Route::get('products/{title}/search',[ProductController::class, 'searchProduct']);

Route::get('products/category/categories',[ProductController::class, 'allCategory']);

Route::get('products/category/{category_name}',[ProductController::class, 'categoryProduct']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
