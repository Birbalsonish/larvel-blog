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
    if (!Auth::check()) {
        return view('home'); // login/register for guests
    }
    return redirect('/dashboard'); // redirect to dashboard
});

// AdminLTE dashboard
Route::get('/dashboard', function () {
    return view('dashboard'); // no posts or photos loaded here
})->middleware('auth');



// Posts page
Route::get('/posts', function () {
    $posts = Post::where('user_id', auth()->id())->get();
    return view('posts', ['posts' => $posts]); // now Laravel can find posts.blade.php
})->middleware('auth');

Route::get('/photos', function () {
    $photos = Photo::where('user_id', auth()->id())->get();
    return view('photos', ['photos' => $photos]); // now Laravel can find photos.blade.php
})->middleware('auth');


// Existing routes
Route::get('/comment', function () {
    $pages = Page::all();
    return view('comment',['pages'=>$pages]);
});
Route::post('/register', [Usercontroller::class, 'register']);
Route::post('/logout', [Usercontroller::class, 'logout']);
Route::post('/login', [Usercontroller::class, 'login']);
Route::post('/createpost', [Postcreate::class, 'createpost']);
Route::post('/createphoto', [Photocontroller::class, 'createphoto']);
Route::post('/comment', [Photocontroller::class, 'commentpage']);
Route::get('/editpost/{post}', [Postcreate::class, 'editpost']);
Route::put('/editpost/{post}', [Postcreate::class, 'updatepost']);
Route::delete('/deletepost/{post}', [Postcreate::class, 'deletepost']);


// Show login/register page
Route::get('/login', function () {
    return view('auth'); // auth.blade.php
})->name('login'); // important to name it 'login'

// Handle login
Route::post('/login', [Usercontroller::class, 'login']);

Route::post('/register', [Usercontroller::class, 'register']);
