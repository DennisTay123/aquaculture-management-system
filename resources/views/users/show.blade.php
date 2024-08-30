<!-- resources/views/users/show.blade.php -->
@extends('layouts.app', ['class' => '', 'elementActive' => 'users'])

@section('content')
<div class="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">User Details</h3>
                    </div>
                    <div class="card-body">
                        <form id="user-form" action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Role:</label>
                                <input type="text" name="role" class="form-control" value="{{ $user->role }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label>Password (leave blank to keep current password):</label>
                                <input type="password" name="password" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password:</label>
                                <input type="password" name="password_confirmation" class="form-control" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary" style="display: none;"
                                id="save-btn">Update</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button id="edit-btn" class="btn btn-primary">Edit</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('edit-btn').addEventListener('click', function () {
        let form = document.getElementById('user-form');
        let inputs = form.querySelectorAll('input');
        inputs.forEach(input => input.readOnly = false);
        document.getElementById('save-btn').style.display = 'inline-block';
    });
</script>
@endsection