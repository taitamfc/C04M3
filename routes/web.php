<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WeatherController;
use App\Models\Type;
use App\Models\Book;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

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
    return view('layouts.admin.master');
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

Route::resource('photos',CustomerController::class);
/*
    photos
        GET     => /             => index       => photos.index
        GET     => /create       => create      => photos.create
        POST    => /store        => store       => photos.store
        GET     => /{id}/edit    => edit        => photos.edit
        GET     => /{id}         => show        => photos.show
        PUT     => /{id}         => update      => photos.update
        DELETE  => /{id}         => destroy     => photos.destroy
*/

Route::group(['prefix' => 'tasks'], function(){
    // trang danhs sach
    Route::get('/' , [TaskController::class,'index'] )->name('tasks.index');

    //trang them moi
    Route::get('/create' , [TaskController::class,'create'] )->name('tasks.create');

    //luu moi
    Route::post('/store' , [TaskController::class,'store'] )->name('tasks.store');

    //trang chinh sua
    Route::get('/{id}/edit' , [TaskController::class,'edit'] )->name('tasks.edit');
    //http://127.0.0.1:8000/tasks/1/edit

    //xem chi tiet thong tin
    Route::get('/{id}' , [TaskController::class,'show'] )->name('tasks.show');

    //cap nhap
    Route::put('/{id}' , [TaskController::class,'update'] )->name('tasks.update');

    //delete
    Route::delete('/{id}' , [TaskController::class,'destroy'] )->name('tasks.destroy');
});

Route::get('/login' , function(){
    echo '<h1>Login</h1>';
})->name('login');


Route::get('/khu-vuc-uong-bia/{age?}',function($age = 0){
    echo '<h1>Uong Bia</h1>';
})->middleware('check.age')->name('uong-bia');

Route::get('/khu-vuc-nuoc-ngot/{age?}',function($age = 0){
    echo '<h1>Uong Nuoc ngot</h1>';
})->name('uong-nuoc-ngot');

Route::get('admin',AdminController::class);

Route::resource('students',StudentController::class);
Route::resource('books',BookController::class);

Route::get('/hasMany',function(){
    //tim record co khoa chinh = 1
    $item = Type::find(1);
    dd($item->books->toArray());
});
Route::get('/belongsTo',function(){
    //first => fetch(); Oblect
    //get => fetchAll(); Array
    // $item = Book::find(2);
    $item = Book::where('id','=',2)->first();
    dd($item->type->toArray());
});

Route::get('/belongsToMany',function(){
    $item = Student::find(1);
    dd($item->borrow_books->toArray());
});

Route::get('weather',[WeatherController::class,'show_form']);

Route::get('/testLang',function(){
    $cr_lang = session('cr_lang');
    App::setlocale($cr_lang);
    echo __('messages.hello');
});

Route::get('/changeLang/{lang}', function($lang){
    session(['cr_lang'=>$lang]);
    return redirect('/testLang');
});


Route::get('admin',function(){

})->name('admin');


Route::get('login',function(Request $request){

    
    $credentials = [
        'email' => 'admin@gmail.com',
        'password' => '123456'
    ];

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect('xem_danh_sach');
    }

})->name('login');


Route::get('register',function(){
    // $user = new User();
    // $user->name     = 'admin';
    // $user->email    = 'admin@gmail.com';
    // $user->password = Hash::make(123456);
    // $user->save();

    // dd($user);
});

Route::get('xem_danh_sach',function(){
    $user = Auth::user();
    if ( Gate::forUser($user)->allows('xem_danh_sach') ) {
        echo 'Trang danh sach';
    }else{
        abort(403);
    }
});

Route::get('xoa_tai_nguyen',function(){
    $user = Auth::user();
    if ( Gate::forUser($user)->allows('delete') ) {
        echo 'Trang xoa tai nguyen';
    }else{
        abort(403);
    }
});