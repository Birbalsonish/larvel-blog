@extends('admin')

@section('content')
<h2>All Photos</h2>

@foreach($photos as $photo)
    <div class="card mb-2 p-2">
        <h3>{{ $photo->title }}</h3>
        <img src="{{ asset('storage/' . $photo->image_path) }}" style="max-width:200px;" class="mb-2">
        <form action="/comment" method="POST" class="mb-2">
            @csrf
            <input name="comment" class="form-control mb-2" type="text" placeholder="Add a comment">
            <button class="btn btn-primary btn-sm" type="submit">Comment</button>
        </form>
        <a href="/comment" class="btn btn-info btn-sm">View Comments</a>
    </div>
@endforeach
@endsection

