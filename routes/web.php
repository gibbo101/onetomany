<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

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

Route::get('/create', function() {

  $user = User::findOrFail(1);
  $post = new Post(['title'=>'My first post with Edwin Diaz', 'body'=>'I love laravel']);

  $user->posts()->save($post);

  return "Done";

});


Route::get('/read', function() {
 $user = User::findOrFail(1);

 
 foreach($user->posts as $post) {
  echo "<p>Title: " . $post->title . "<br> Body: " . $post->body . "<br>";
 }
});

Route::get('/update', function() {
  $user = User::findOrFail(1);

  $user->posts()->whereId(1)->update(['title'=>'I love laravel', 'body'=>'This is awesome']);
});

