<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
</head>
<body>
@auth
    <h1> welcome, {{ auth()->user()->name }} </h1>
<form action="/logout" method="POST">
    @csrf
    <button type="submit">logout</button>
    </form>
     <div style="border:1px solid black; padding:20px; margin:20px;">
        <h2>create post<h2>
            <form action="/createpost" method ="post">
                @csrf
                <input name="title" type="text" placeholder="title">
                <input name="body" type="text" placeholder="body">
                <button type="submit">save post</button>
            </form>
            <form action="/createphoto" method="post" enctype="multipart/form-data">
                @csrf
                <input name="title" type="text" placeholder="photo title">
                <input name="image" type="file">
                <button type="submit">upload photo</button>
            </form>
        </div>

        <div style="border:1px solid black; padding:20px; margin:20px;">
            <h2>all posts<h2>
                <div style ="border:1px solid gray; padding:10px; margin:10px;">
            @foreach($posts as $post)
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->body }}</p>
            <hr>
            @endforeach
            </div>
        </div>
              <div style="border:1px solid black; padding:20px; margin:20px;">
             <h2>all photos</h2>
            <div style ="border:1px solid gray; padding:10px; margin:10px;">
            @foreach($photos as $photo)
            <h3>{{ $photo->title }}</h3>
            <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}" style="max-width:200px;">
            <form action="/comment" method="POST">
                @csrf
                <input name="comment" type="text" placeholder="Add a comment">
                <button type="submit">comment</button>
            </form>
            <button><a href="/comment">View Comments</a></button>
              <hr>
            @endforeach

            </div>
        </div>


@else
  <div style="border:1px solid black; padding:20px; margin:20px;">
    <h2>register<h2>
    <form action="/register" method="POST" >
        @csrf
     <input    name="name" type="text" placeholder="name">
        <input name="email" type="email" placeholder="email">
        <input name="password" type="password" placeholder="password">
        <button type="submit">register</button>
        </form>
</div>

<div style="border:1px solid black; padding:20px; margin:20px;" >
    <h2>login<h2>
         <form action="/login" method="POST" >
        @csrf
     <input    name="loginname" type="text" placeholder="name">
        <input name="loginpassword" type="password" placeholder="password">
        <button type="submit">login</button>
        </form>
</div>

@endauth



 
</body>
</html>