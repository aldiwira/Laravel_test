@extends('template')

@section('title')
Login
@endsection

@section('body')
<div class="vh-100 bg-dark text-white p-5">
    <div class="container h-100 d-flex justify-content-center align-items-center">


        <div class="bg-white text-dark p-4 rounded m-3 w-50">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 class="text-center">Login</h1>
                <p class="text-center text-secondary">Login with valid email and password</p>
                @include('alertsession')
                <div class="form-group my-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="email"
                        placeholder="Email address" required>
                </div>
                <div class="form-group my-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password"
                        required>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Login</button>
                    <a class="btn btn-success" type="button" href="{{ route('register') }}">Register</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection