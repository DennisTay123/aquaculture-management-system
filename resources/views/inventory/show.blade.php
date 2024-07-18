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
                                <h3 class="mb-0">Inventory Details</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('inventories.edit', $inventory->id) }}"
                                    class="btn btn-primary">Edit</a>
                                <a href="{{ route('inventories.index') }}" class="btn btn-primary">Back to
                                    list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $inventory->id }}</td>
                                </tr>
                                <tr>
                                    <th>Item Code</th>
                                    <td>{{ $inventory->item_code }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $inventory->name }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $inventory->description }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $inventory->category }}</td>
                                </tr>
                                <tr>
                                    <th>Unit Measurement</th>
                                    <td>{{ $inventory->um }}</td>
                                </tr>
                                <tr>
                                    <th>Quantity</th>
                                    <td>{{ $inventory->quantity }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $inventory->price }}</td>
                                </tr>
                                <tr>
                                    <th>Total Price</th>
                                    <td>{{ $inventory->total_price }}</td>
                                </tr>
                                <tr>
                                    <th>Brand</th>
                                    <td>{{ $inventory->brand }}</td>
                                </tr>
                                <tr>
                                    <th>Vendor</th>
                                    <td>{{ $inventory->vendor->name }}</td>
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