@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'inventory'
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
                                <h3 class="mb-0">Create Inventory Item</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('inventories.index') }}" class="btn btn-primary">Back to list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('inventories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="item_code">Item Code:</label>
                                <input type="text" name="item_code" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="brand">Brand:</label>
                                <input type="text" name="brand" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select name="category" class="form-control" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category }}">{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="um">Unit Measurement:</label>
                                <input type="text" name="um" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="price">Price Per Unit:</label>
                                <input type="number" step="0.01" name="price" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="total_price">Total Price:</label>
                                <input type="number" step="0.01" name="total_price" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="vendor_id">Vendor:</label>
                                <select name="vendor_id" class="form-control">
                                    <option value="">Select Vendor</option>
                                    @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
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