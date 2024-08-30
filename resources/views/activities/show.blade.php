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
                        <h3 class="mb-0">Activity Details</h3>
                    </div>
                    <div class="card-body">
                        <h4>{{ $activity->activity }}</h4>
                        <p><strong>Tank ID:</strong> {{ $activity->tank_id }}</p>
                        <p><strong>Employee ID:</strong> {{ $activity->employee_id }}</p>
                        <p><strong>Feed Type:</strong> {{ $activity->feed_type }}</p>
                        <p><strong>Quantity:</strong> {{ $activity->quantity }}</p>
                        <p><strong>Unit Measurement:</strong> {{ $activity->unit_measurement }}</p>
                        <p><strong>Start Date:</strong> {{ $activity->start_date }}</p>
                        @if ($activity->end_date)
                            <p><strong>End Date:</strong> {{ $activity->end_date }}</p>
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('activities.index') }}" class="btn btn-primary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection