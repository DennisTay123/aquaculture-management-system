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
                                <h3 class="mb-0">Vendor Details</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('vendors.index') }}" class="btn btn-primary">Back to
                                    list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $vendor->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $vendor->name }}</td>
                                </tr>
                                <tr>
                                    <th>Contact Person</th>
                                    <td>{{ $vendor->contact_person }}</td>
                                </tr>
                                <tr>
                                    <th>Contact Number</th>
                                    <td>{{ $vendor->contact_number }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $vendor->address }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Term</th>
                                    <td>{{ $vendor->payment_terms }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection