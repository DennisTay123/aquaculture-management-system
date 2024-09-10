@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'user'
])

@section('content')
<div class="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h3 class="mb-0">Users List</h3>
                            </div>
                            <div class="col-3">
                                <form method="GET" action="{{ route('users.index') }}" class="mt-3">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Search for users">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin: 0px;">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thread-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contact Number</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->contact_number }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>
                                                <a href="{{ route('users.show', $user->id) }}"
                                                    class="btn btn-info">Details</a>
                                                @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager')
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                        style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $users->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection