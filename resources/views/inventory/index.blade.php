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
                                <h3 class="mb-0">Inventories</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('inventories.create') }}" class="btn btn-primary">Add new
                                    item</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="text-primary">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Item Code</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">UM</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Vendor</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventories as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->item_code }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->um }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->brand }}</td>
                                            <td>{{ $item->vendor->name }}</td>
                                            <td>
                                                <a href="{{ route('inventories.show', $item->id) }}"
                                                    class="btn btn-info">Details</a>
                                                <!-- <a href="{{ route('inventories.edit', $item->id) }}"
                                                                    class="btn btn-primary">Edit</a> -->
                                                <form action="{{ route('inventories.destroy', $item->id) }}" method="POST"
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
                            {{ $inventories->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection