<?php

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
    return view('welcome');
});

Route::group(['middleware'=>'auth'],function(){
    Route::get('dashboard', 'Auth\HomeController@index')->name('dashboard');

});

Route::group(['middleware'=>['auth','role:editor']],function(){
    Route::get('role',function(){
        dd('Hi your role is editor');
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Admin Auth
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        //Admin Login Here
        Route::get('login', 'AuthenticatedSessionController@create')->name('login');
        Route::post('login', 'AuthenticatedSessionController@store')->name('adminlogin');
    });
    Route::middleware('admin')->group(function(){
        Route::get('', function(){
            return redirect('admin/dashboard');
        });
        Route::get('dashboard', 'HomeController@index')->name('dashboard');
        Route::get('adminTest','HomeController@adminTest')->name('adminTest');
        Route::get('authorTest','HomeController@authorTest')->name('authorTest');
        Route::get('editorTest','HomeController@editorTest')->name('editorTest');
        Route::resource('posts','PostController');
    });

    Route::post('logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');
});

