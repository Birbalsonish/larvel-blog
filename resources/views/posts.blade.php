@extends('admin')

@section('content')
<h2>All Posts</h2>
@foreach($posts as $post)
    <div class="card mb-2 p-2">
        <h3>{{ $post->title }} by {{ $post->user->name }}</h3>
        <p>{{ $post->body }}</p>
        <a href="editpost/{{ $post->id }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="deletepost/{{ $post->id }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>
@endforeach
@endsection

