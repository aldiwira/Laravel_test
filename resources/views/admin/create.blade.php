@extends('template')

@section('title')
Admin
@endsection

@section('body')
<div class="container">
    <div class="container">
        <div class="d-flex justify-content-between">
            <h4>Users</h4>
            <div class="my-2">
                <a type="button" class="btn btn-primary" href="{{route('admin.index')}}">Home</a>
                <a type="button" class="btn btn-danger" href="{{route('logout')}}">Logout</a>
            </div>
        </div>
        @include('alertsession')
        <form method="POST" action="{{route('admin.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameid"
                    placeholder="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="nameid"
                    placeholder="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password"
                    required>
            </div>
            <div class="form-group">
                <label for="biodata">Biodata</label>
                <textarea class="form-control" name="biodata" id="biodata" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
@endsection

@section('js')
<script>
    let current = 1;
    const token = "Bearer {{Session::get('token')[0]}}";
    
</script>
@endsection