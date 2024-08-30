@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'inventory'
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
                                <h3 class="mb-0">Inventory</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('inventories.create') }}" class="btn btn-primary">Add Inventory</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('inventories.index') }}">
                            <div class="row">

                                <div class="col-md-3">
                                    <label for="brand"><strong>Filter by Brand:</strong></label>
                                    <select name="brand" class="form-control">
                                        <option value="">None</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                                                {{ $brand }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="vendor_id"><strong>Filter by Vendor:</strong></label>
                                    <select name="vendor_id" class="form-control">
                                        <option value="">None</option>
                                        @foreach($vendors as $vendor)
                                            <option value="{{ $vendor->id }}" {{ request('vendor_id') == $vendor->id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="category"><strong>Filter by Category:</strong></label>
                                    <select name="additional_category" class="form-control">
                                        <option value="">None</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category }}" {{ request('additional_category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="filter-date"><strong>Filter by Date:</strong></label>
                                    <input type="text" class="form-control datepicker" id="filter-date" name="date"
                                        placeholder="Select a date..." value="{{ request('date') }}">
                                </div>
                            </div>

                            <div class="row mt-2">

                                <div class="col-md-3">
                                    <label for="search"><strong>Search:</strong></label>
                                    <input type="text" name="search" class="form-control" placeholder="Search..."
                                        value="{{ request('search') }}">
                                </div>
                                <div class="col-md-6 d-flex" style="margin-top: 20px; margin-bottom: 0;">
                                    <button class="btn btn-primary mr-2" type="submit">Search</button>
                                    <a href="{{ route('inventories.index') }}" class="btn btn-secondary">Clear</a>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="text-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Item Code</th>
                                        <th>Name</th>
                                        <th>Brand</th>
                                        <th>Vendor</th>
                                        <th>Category</th>
                                        <th>Date Recorded</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    @foreach($inventories as $inventory)
                                        <tr>
                                            <td>{{ $inventory->id }}</td>
                                            <td>{{ $inventory->item_code }}</td>
                                            <td>{{ $inventory->name }}</td>
                                            <td>{{ $inventory->brand }}</td>
                                            <td>{{ $inventory->vendor->name }}</td>
                                            <td>{{ $inventory->category }}</td>
                                            <td>{{ $inventory->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="{{ route('inventories.show', $inventory->id) }}"
                                                    class="btn btn-info">Details</a>
                                                <form action="{{ route('inventories.destroy', $inventory->id) }}"
                                                    method="POST" style="display:inline-block;">
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
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-center" aria-label="...">
                                {{ $inventories->appends(request()->query())->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            flatpickr(".datepicker", {
                dateFormat: "Y-m-d"
            });
        });
    </script>
@endpush
@endsection