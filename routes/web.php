<?php

use App\Post;
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

// Route::get('/posts', function (){
//     $posts = Post::all();
//     return view('posts', compact('posts'));
// });

//bitan je raspored ruta

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{id}', 'PostController@show');
Route::post('/posts', 'PostController@store');
Route::post('/posts/{id}', 'CommentController@store');

Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');
Route::get('/logout', 'LoginController@destroy');

Route::get('/login', 'LoginController@create')->name('login'); //redirekcija na 
//login ako nije ulogovan
Route::post('/login', 'LoginController@store');




// Route::get('/post/{id}', function ($id){
//     $post = Post::findOrFail($id);
//     return view('single-post', compact('post'));
// });


