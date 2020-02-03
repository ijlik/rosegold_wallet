<?php

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

Route::get('/', function (){
    return view('welcome');
});
Route::get('/faq', function (){
    return view('faq');
});
Route::get('/privacy', function (){
    return view('privacy');
});
Route::get('/terms', function (){
    return view('terms');
});

Auth::routes();

Route::group(['middleware'=>['auth','is_not_blocked']],function (){
    Route::get('/home','HomeController@index');
    Route::get('/wallet', 'WalletController@index');
    Route::post('/wallet', 'WalletController@send');

    Route::get('/message','MessageController@index');
    Route::post('/message','MessageController@send');
    Route::post('/message/reply','MessageController@reply');
    Route::post('/message/delete','MessageController@delete');

    Route::get('/setting', 'UserController@setting');
    Route::post('/setting', 'UserController@password');
    Route::post('/setting/pin', 'UserController@pin');

    Route::get('/history', 'WalletController@history');

});

Route::get('/get_message','MessageController@getMessageTotal');
Route::get('/get_new_message/{id}','MessageController@getMessage');
Route::get('/get_balance','WalletController@getBalance');
