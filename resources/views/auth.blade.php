@extends('admin')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-6">

      
        <div class="card mb-4 p-4">
            <h2 class="card-title text-center mb-3">Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input name="name" type="text" placeholder="Name" class="form-control mb-2">
                <input name="email" type="email" placeholder="Email" class="form-control mb-2">
                <input name="password" type="password" placeholder="Password" class="form-control mb-2">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
        </div>

    
        <div class="card mb-4 p-4">
            <h2 class="card-title text-center mb-3">Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input name="loginname" type="text" placeholder="Name" class="form-control mb-2">
                <input name="loginpassword" type="password" placeholder="Password" class="form-control mb-2">
                <button type="submit" class="btn btn-success btn-block">Login</button>
            </form>
        </div>

    </div>
</div>
@endsection
