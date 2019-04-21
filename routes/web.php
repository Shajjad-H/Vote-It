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


Route::get('/login', 'UserController@login');

Route::post('login', 'UserController@comfirme')->middleware('App\Http\Middleware\CasUnconfirmedLogin');



Route::get('/test', function () {
    dd(\App\User::all()->count());
});


 
 

Route::get('/', 'UserController@welcome');

Route::middleware('App\Http\Middleware\CasMiddleware')->group(function () {
    
    Route::resource('posts', 'PostsController');
    Route::post('/posts/comment/{post}', 'PostsController@comment');
    Route::get('/posts/{post}/comment/{comment}/edit', 'PostsController@editComment');
    Route::put('/post/{post}/comment/{comment}', 'PostsController@updateComment');

    Route::resource('votes', 'VotesController');
    Route::get('votes/for/{vote}', 'VotesController@for');
    Route::get('votes/against/{vote}', 'VotesController@against');
    Route::get('votes/indifferent/{vote}', 'VotesController@indifferent');

    
    Route::get('groupe/get/{name}', 'GroupeController@get');
    Route::resource('groupe', 'GroupeController');
    Route::post('groupe/abonner', 'GroupeController@abonner');
    Route::delete('groupe/desabonner/{groupe}', 'GroupeController@desabonner');



    Route::prefix('user/')->group(function () {

        Route::get('index', 'AdminController@index');

        
        Route::middleware('App\Http\Middleware\AdminMiddleware')->group(function (){
            
            Route::get('admin/', 'AdminController@index');
            Route::post('add/{user}/role', 'UserController@addRole');
            Route::delete('{user}/destroy/role/{role}', 'UserController@removeRole');
            
        });

        Route::get('get/{pseudo}', 'UserController@get');
        Route::post('logout', 'UserController@logout');
        Route::get('/{user}', 'UserController@show');



    
    });
 });

 //Route::get('user/get/{pseudo}', 'UserController@get')->middleware('App\Http\Middleware\CasMiddleware');
 

Route::get('/help', function () {
    // dd(Cas::ldapUser());
    return view('pages.help');
});

Route::get('/privacy', function () {
    // dd(Cas::ldapUser());
    return view('pages.privacy');
});

