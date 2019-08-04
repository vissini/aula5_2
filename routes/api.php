<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->prefix('v1')->group(function () {
        Route::resources([
            'products' => 'productController',
            'users' => 'userController',
        ]);
    // Route::resource('products', 'productController');
    // Route::resource('users', 'userController');
    // Route::get('/products', 'productController@index');
    // Route::post('/products', 'productController@store');
    // Route::put('/products/{product}', 'productController@update');
    // Route::get('/products/{product}', 'productController@show');
    // Route::delete('/products/{product}', 'productController@destroy');
  });


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cors_example', function(){
    return ['status'=>'OK'];
  })->middleware('cors');

//   Route::get('cors_example', function(){
//     return ['status'=>'OK'];
// })->middleware('cors');
