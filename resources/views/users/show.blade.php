@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'users'
])

@section('content')
<div class="content">
    <div class="container-fluid mt--7">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">User Details</h3>
                            </div>
                            <div class="col-4 text-right">
                                <button id="edit-button" class="btn btn-primary">Edit</button>
                                <a href="{{ route('users.index') }}" id="back-button" class="btn btn-primary">Back to
                                    list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="user-form" action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>
                                            <span class="view-mode">{{ $user->name }}</span>
                                            <input type="text" name="name" class="form-control edit-mode"
                                                value="{{ $user->name }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Role</th>
                                        <td>
                                            <span class="view-mode">{{ $user->role }}</span>
                                            <select name="role" class="form-control edit-mode" style="display:none;">
                                                <option value="Admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                                                </option>
                                                <option value="Manager" {{ $user->role == 'manager' ? 'selected' : '' }}>
                                                    Manager
                                                </option>
                                                <option value="Employee" {{ $user->role == 'employee' ? 'selected' : '' }}>Employee</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            <span class="view-mode">{{ $user->email }}</span>
                                            <input type="email" name="email" class="form-control edit-mode"
                                                value="{{ $user->email }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Contact Number</th>
                                        <td>
                                            <span class="view-mode">{{ $user->contact_number }}</span>
                                            <input type="text" name="contact_number" class="form-control edit-mode"
                                                value="{{ $user->contact_number }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>
                                            <span class="view-mode">{{ $user->address }}</span>
                                            <input type="text" name="address" class="form-control edit-mode"
                                                value="{{ $user->address }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="text-right edit-mode" style="display:none;">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" id="cancel-button" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('edit-button').addEventListener('click', function () {
        document.querySelectorAll('.view-mode').forEach(function (element) {
            element.style.display = 'none';
        });
        document.querySelectorAll('.edit-mode').forEach(function (element) {
            element.style.display = 'block';
        });
        document.getElementById('edit-button').classList.remove('btn-primary');
        document.getElementById('edit-button').classList.add('btn-danger');
        document.getElementById('edit-button').innerText = 'Editing';
        document.getElementById('back-button').style.display = 'none';
    });

    document.getElementById('cancel-button').addEventListener('click', function () {
        document.querySelectorAll('.view-mode').forEach(function (element) {
            element.style.display = 'block';
        });
        document.querySelectorAll('.edit-mode').forEach(function (element) {
            element.style.display = 'none';
        });
        document.getElementById('edit-button').classList.remove('btn-danger');
        document.getElementById('edit-button').classList.add('btn-primary');
        document.getElementById('edit-button').innerText = 'Edit';
        document.getElementById('back-button').style.display = 'inline-block';
    });

    // Auto dismiss alert after 5 seconds
    window.setTimeout(function () {
        var alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('hide');
            // Remove the alert from the DOM after the transition
            window.setTimeout(function () {
                alert.parentNode.removeChild(alert);
            }, 500);
        }
    }, 5000);
</script>
@endsection