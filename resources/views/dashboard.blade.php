@extends('admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>


<div class="card mb-4 p-3">
    <h2>Create Post</h2>
    <form action="/createpost" method="POST">
        @csrf
        <input name="title" type="text" placeholder="Title" class="form-control mb-2">
        <textarea name="body" placeholder="Body" class="form-control mb-2"></textarea>
        <button type="submit" class="btn btn-primary">Save Post</button>
    </form>
</div>


<div class="card mb-4 p-3">
    <h2>Upload Photo</h2>
    <form action="/createphoto" method="POST" enctype="multipart/form-data">
        @csrf
        <input name="title" type="text" placeholder="Photo Title" class="form-control mb-2">
        <input name="image" type="file" class="form-control mb-2">
        <button type="submit" class="btn btn-success">Save Photo</button>
    </form>
</div>
@endsection

