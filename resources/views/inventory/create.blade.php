<!-- resources/views/vendor/create.blade.php -->
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
                                <h3 class="mb-0">Create Vendor</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('vendors.index') }}" class="btn btn-sm btn-primary">Back to list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vendors.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Contact Person:</label>
                                <input type="text" name="contact_person" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Contact Number:</label>
                                <input type="text" name="contact_number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <textarea name="address" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Payment Terms:</label>
                                <input type="text" name="payment_terms" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection