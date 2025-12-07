<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="/editpost/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        <input name="title" type="text" value="{{ $post->title }}" placeholder="title">
        <textarea name="body">{{ $post->body }}</textarea>
        <button type="submit">Edit Post</button>
    </form>
</body>
</html>