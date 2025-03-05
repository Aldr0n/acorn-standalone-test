<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

dd('web.php');

Route::get('/welcome', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'This is an example API response from Acorn',
    ]);
});