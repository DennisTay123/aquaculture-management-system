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
                                <h3 class="mb-0">Inventory Details</h3>
                            </div>
                            <div class="col-4 text-right">
                                <button id="edit-button" class="btn btn-primary">Edit</button>
                                <a href="{{ route('inventories.index') }}" id="back-button" class="btn btn-primary">Back
                                    to list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="inventory-form" action="{{ route('inventories.update', $inventory->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $inventory->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Item Code</th>
                                        <td>
                                            <span class="view-mode">{{ $inventory->item_code }}</span>
                                            <input type="text" name="item_code" class="form-control edit-mode"
                                                value="{{ $inventory->item_code }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>
                                            <span class="view-mode">{{ $inventory->name }}</span>
                                            <input type="text" name="name" class="form-control edit-mode"
                                                value="{{ $inventory->name }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>
                                            <span class="view-mode">{{ $inventory->description }}</span>
                                            <textarea name="description" class="form-control edit-mode"
                                                style="display:none;">{{ $inventory->description }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>
                                            <span class="view-mode">{{ $inventory->category }}</span>
                                            <input type="text" name="category" class="form-control edit-mode"
                                                value="{{ $inventory->category }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Price Per Unit</th>
                                        <td>
                                            <span class="view-mode">{{ $inventory->price }}</span>
                                            <input type="number" step="0.01" name="price" class="form-control edit-mode"
                                                value="{{ $inventory->price }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Unit Measurement</th>
                                        <td>
                                            <span class="view-mode">{{ $inventory->um }}</span>
                                            <input type="text" name="um" class="form-control edit-mode"
                                                value="{{ $inventory->um }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Quantity</th>
                                        <td>
                                            <span class="view-mode">{{ $inventory->quantity }}</span>
                                            <input type="number" name="quantity" class="form-control edit-mode"
                                                value="{{ $inventory->quantity }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Total Price</th>
                                        <td>
                                            <span class="view-mode">{{ $inventory->total_price }}</span>
                                            <input type="number" step="0.01" name="total_price"
                                                class="form-control edit-mode" value="{{ $inventory->total_price }}"
                                                style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Brand</th>
                                        <td>
                                            <span class="view-mode">{{ $inventory->brand }}</span>
                                            <input type="text" name="brand" class="form-control edit-mode"
                                                value="{{ $inventory->brand }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Vendor</th>
                                        <td>
                                            <span class="view-mode">{{ $inventory->vendor->name }}</span>
                                            <select name="vendor_id" class="form-control edit-mode"
                                                style="display:none;">
                                                @foreach($vendors as $vendor)
                                                    <option value="{{ $vendor->id }}" {{ $vendor->id == $inventory->vendor_id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Date Recorded</th>
                                        <td>
                                            <span class="view-mode">{{ $inventory->created_at->format('Y-m-d') }}</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="text-right edit-mode" style="display:none;">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" id="cancel-button" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('edit-button').addEventListener('click', function () {
        document.querySelectorAll('.view-mode').forEach(function (element) {
            element.style.display = 'none';
        });
        document.querySelectorAll('.edit-mode').forEach(function (element) {
            element.style.display = 'block';
        });
        document.getElementById('edit-button').classList.remove('btn-primary');
        document.getElementById('edit-button').classList.add('btn-danger');
        document.getElementById('edit-button').innerText = 'Editing';
        document.getElementById('back-button').style.display = 'none';
    });

    document.getElementById('cancel-button').addEventListener('click', function () {
        document.querySelectorAll('.view-mode').forEach(function (element) {
            element.style.display = 'block';
        });
        document.querySelectorAll('.edit-mode').forEach(function (element) {
            element.style.display = 'none';
        });
        document.getElementById('edit-button').classList.remove('btn-danger');
        document.getElementById('edit-button').classList.add('btn-primary');
        document.getElementById('edit-button').innerText = 'Edit';
        document.getElementById('back-button').style.display = 'inline-block';
    });

    // Auto dismiss alert after 5 seconds
    window.setTimeout(function () {
        var alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('hide');
            // Remove the alert from the DOM after the transition
            window.setTimeout(function () {
                alert.parentNode.removeChild(alert);
            }, 500);
        }
    }, 5000);
</script>
@endsection