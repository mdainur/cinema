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
    return view('index');
})->name('index');
Route::get('/admin', function () {
   if (Auth::check()){
       
       if (Auth::user()->role=="admin" || Auth::user()->role=="moderator" ){ 
    return view('admin');
       }
    else {
    return redirect()->route('index');
}
   }
 else {
    return redirect()->route('index');
}
   });
Route::get('/about', function () {
    return view('about');
});
Route::get('/movie_details', function () {
    return view('movie_details');
});
Route::get('/schedule', function () {
    $days = \App\Models\Day::all();
    return view('schedule', compact('days'));
});
 
Route::get('/profile', function () {
    
    if (Auth::check()){
    return view('profile');}
 else {
    return redirect()->route('index');
}
})->name('profile');

Route::post('/update/{userId}', 'Controller@updateProfile');
Route::post('/updatepass/{userId}', 'Controller@updatepass');
Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');




Route::resource('movies','MovieController');

Route::resource('days','DayController');
Route::resource('schedules','ScheduleController');