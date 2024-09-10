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
                                <a href="{{ route('activity.index') }}" class="btn btn-primary">Back to list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('activity.store') }}" method="POST">
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
                                <select name="activity" id="activity" class="form-control" required>
                                    <option value="">Select Activity</option>
                                    <option value="Feeding">Feeding</option>
                                    <option value="ChangeWater">Change Water</option>
                                    <option value="Cleaning">Cleaning</option>
                                </select>
                            </div>
                            <div class="form-group" id="feed-type-group" style="display:none;">
                                <label>Feed Type:</label>
                                <select name="feed_type" class="form-control">
                                    <option value="">Select Feed Type</option>
                                    @foreach($feedTypes as $id => $name)
                                        <option value="{{ $name }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quantity:</label>
                                <input type="number" step="0.01" name="quantity" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Unit Measurement:</label>
                                <input type="text" name="unit_measurement" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Date:</label>
                                <input type="text" name="start_date" class="form-control datepicker"
                                    value="{{ $date ?? '' }}" required>
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

@push('scripts')
    <!-- Include Flatpickr CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Initialize Flatpickr for date input fields
            flatpickr('.datepicker', {
                dateFormat: 'Y-m-d'
            });

            // Show or hide the Feed Type field based on selected activity
            const activitySelect = document.getElementById('activity');
            const feedTypeGroup = document.getElementById('feed-type-group');

            activitySelect.addEventListener('change', function () {
                if (activitySelect.value === 'Feeding') {
                    feedTypeGroup.style.display = 'block';
                } else {
                    feedTypeGroup.style.display = 'none';
                }
            });

            // Trigger change event to handle the case where the form is pre-filled
            activitySelect.dispatchEvent(new Event('change'));
        });
    </script>
@endpush