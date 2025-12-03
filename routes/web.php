<?php
use App\Models\Page;
use App\Models\Post;
use App\Models\Photo;
use App\Models\photos;
use App\Http\Controllers\Postcreate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Photocontroller;

Route::get('/', function () {
    $post=Post::where('user_id',auth()->id())->get();
    $photo=Photo::where('user_id',auth()->id())->get();
    return view('home',['posts'=>$post, 'photos'=>$photo]);
});
Route::get('/comment', function () {
    $pages=Page::all();
    return view('comment',['pages'=>$pages]);
});
Route::post('/register', [Usercontroller::class, 'register']);
Route::post('/logout', [Usercontroller::class, 'logout']);
Route::post('/login', [Usercontroller::class, 'login']);
Route::post('/createpost', [Postcreate::class, 'createpost']);
Route::post('/createphoto', [Photocontroller::class, 'createphoto']);
Route::post('/comment', [Photocontroller::class, 'commentpage']);
