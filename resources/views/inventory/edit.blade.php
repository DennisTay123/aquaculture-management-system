<!-- resources/views/inventory/edit.blade.php -->
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
                                <h3 class="mb-0">Edit Inventory</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('inventories.index') }}" class="btn btn-sm btn-primary">Back to
                                    list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Item Code:</label>
                                <input type="text" name="item_code" class="form-control"
                                    value="{{ $inventory->item_code }}" required>
                            </div>
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" class="form-control" value="{{ $inventory->name }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea name="description"
                                    class="form-control">{{ $inventory->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Category:</label>
                                <input type="text" name="category" class="form-control"
                                    value="{{ $inventory->category }}" required>
                            </div>
                            <div class="form-group">
                                <label>Unit Measurement:</label>
                                <input type="text" name="um" class="form-control" value="{{ $inventory->um }}" required>
                            </div>
                            <div class="form-group">
                                <label>Quantity:</label>
                                <input type="number" name="quantity" class="form-control"
                                    value="{{ $inventory->quantity }}" required>
                            </div>
                            <div class="form-group">
                                <label>Price:</label>
                                <input type="number" step="0.01" name="price" class="form-control"
                                    value="{{ $inventory->price }}" required>
                            </div>
                            <div class="form-group">
                                <label>Total Price:</label>
                                <input type="number" step="0.01" name="total_price" class="form-control"
                                    value="{{ $inventory->total_price }}" required>
                            </div>
                            <div class="form-group">
                                <label>Brand:</label>
                                <input type="text" name="brand" class="form-control" value="{{ $inventory->brand }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Vendor:</label>
                                <select name="vendor_id" class="form-control" required>
                                    @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}" {{ $vendor->id == $inventory->vendor_id ? 'selected' : '' }}>{{ $vendor->name }}</option>
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