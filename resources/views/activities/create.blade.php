@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'activity'
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
                                <h3 class="mb-0">Create Activity</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('activities.index') }}" class="btn btn-sm btn-primary">Back to
                                    list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('activities.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tank ID:</label>
                                <input type="number" name="tank_id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Employee ID:</label>
                                <input type="number" name="employee_id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Activity:</label>
                                <input type="text" name="activity" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Feed Type:</label>
                                <input type="text" name="feed_type" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Unit Measurement:</label>
                                <input type="text" name="unit_measurement" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Quantity:</label>
                                <input type="number" step="0.01" name="quantity" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Activity Date:</label>
                                <input type="date" name="start_date" class="form-control" value="{{ $date ?? '' }}"
                                    required>
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