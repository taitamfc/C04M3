<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('books',BookController::class);
/*
    books
        GET     => /             => index       => books.index
        GET     => /create       => create      => books.create
        POST    => /store        => store       => books.store
        GET     => /{id}/edit    => edit        => books.edit
        GET     => /{id}         => show        => books.show
        PUT     => /{id}         => update      => books.update
        DELETE  => /{id}         => destroy     => books.destroy
*/

