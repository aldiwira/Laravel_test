@extends('template')

@section('title')
Login
@endsection

@section('body')
<div class="vh-100 bg-dark text-white p-5">
    <div class="container h-100 d-flex justify-content-center align-items-center">


        <div class="bg-white text-dark p-4 rounded m-3 w-50">
            <h3>{{$data->name}}</h3>
            <h5>{{$data->email}}</h5>
            <hr>
            <span>{{$data->biodata}}</span>
            <br>
            <div class="my-2">
                <a type="button" class="btn btn-primary" href="{{route('logout')}}">Logout</a>
            </div>
        </div>
    </div>
</div>
@endsection