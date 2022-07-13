<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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


Route::get('/hello' , function(){
    dd(123);
});

//toi form them moi
//add
Route::get('/create' , function(){
    return view('crud.add');
})->name('tao-moi');

//luu
Route::post('/store-123' , function( Request $request  ){
    // dd($request->all());
    //email
    $email = $request->email;
    dd($email);

    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();
})->name('luu-moi');

//form chinh sua
Route::get('/edit/{id?}' , function( $id = 0){
    return view('crud.edit');
})->name('chinh-sua');

//cap nhat du lieu
Route::put('/update', function(Request $request){
    dd($request->all());
})->name('cap-nhat');

//form xoa
Route::get('/form-delete/{id?}' , function( $id = 0){
    return view('crud.delete');
});
//xoa du lieu
Route::delete('/destroy',function(Request $request){
    dd($request->all());
});

//admin
//admin/categories
//admin/users

//admin/profile/edit
//admin/profile/update

Route::prefix('admin')->group( function(){
    //admin/profile/edit
    Route::prefix('profile')->group( function(){
        Route::get('edit' , function(){
            dd('edit');
        });
    } ); 

    //admin/profile/update
    Route::get('profile/update' , function(){
        dd('update');
    });

    
});


