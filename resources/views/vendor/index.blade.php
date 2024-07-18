@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'vendor'
])

@section('content')
<div class="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Vendors</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('vendors.create') }}" class="btn btn-primary">Add new
                                    vendor</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="text-primary">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Contact Person</th>
                                        <th scope="col">Contact Number</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Payment Terms</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vendors as $vendor)
                                        <tr>
                                            <td>{{ $vendor->id }}</td>
                                            <td>{{ $vendor->name }}</td>
                                            <td>{{ $vendor->contact_person }}</td>
                                            <td>{{ $vendor->contact_number }}</td>
                                            <td>{{ $vendor->address }}</td>
                                            <td>{{ $vendor->payment_terms }}</td>
                                            <td>
                                                <a href="{{ route('vendors.show', $vendor->id) }}"
                                                    class="btn btn-info">Details</a>
                                                <!-- <a href="{{ route('vendors.edit', $vendor->id) }}"
                                                                class="btn btn-primary">Edit</a> -->
                                                <form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $vendors->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection