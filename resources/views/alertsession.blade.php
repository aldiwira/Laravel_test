@if ($message = Session::get('error'))
<div class="alert alert-danger" role="alert">
    <p class="text-center">{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p class="text-center">{{ $message }}</p>
</div>
@endif