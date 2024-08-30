@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'user'
])

@section('content')
<div class="content">
    <div class="container-fluid">
        <form method="POST" action="{{ route('admin.register') }}">
            @csrf
            <div class="form-group">
                <label for="email">User Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Send Registration Link</button>
        </form>
    </div>
</div>
@endsection