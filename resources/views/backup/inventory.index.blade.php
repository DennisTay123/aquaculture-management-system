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
                            <div class="col-7">
                                <h3 class="mb-0">Inventory</h3>
                            </div>
                            <div class="input-group col-md-5">
                                <input type="text" name="search" class="form-control border" placeholder="Search..."
                                    style="margin: 10px; ">
                                <a href="{{ route('inventories.create') }}" class="btn btn-primary">Add Inventory</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('inventories.index') }}">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="category"><strong>Filter by Category:</strong></label>
                                    <select name="category" class="form-control">
                                        <option value="">None</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category }}">{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="brand"><strong>Filter by Brand:</strong></label>
                                    <select name="brand" class="form-control">
                                        <option value="">None</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand }}">{{ $brand }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="vendor_id"><strong>Filter by Vendor:</strong></label>
                                    <select name="vendor_id" class="form-control">
                                        <option value="">None</option>
                                        @foreach($vendors as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="vendor_id"><strong>Filter by Date:</strong></label>
                                    <div class="input-group-append date" data-provide="datepicker">
                                        <input type="text" class="form-control" id="filter-date" name="date"
                                            placeholder="Select a date..."
                                            style="margin-bottom: 10px; margin-right: 10px;">

                                        <button class="btn btn-primary" type="submit" style="margin-top: 0px; "><i
                                                class="nc-zoom-split"></i> Search</button>
                                    </div>
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
                        <div class="pagination justify-content-end">
                            {{ $inventories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#filter-date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    });
</script>
@endsection