<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comment</title>

</head>
<body>
    <h1>Comment Section</h1>

    <div style ="border:1px solid gray; padding:10px; margin:10px;">
        @foreach($pages as $page)
        @csrf
            <p>{{ $page->comment }}</p>
            <hr>
        @endforeach
</body>
</html>