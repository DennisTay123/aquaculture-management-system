@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'activity'
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
                            <div class="col-6">
                                <h3 class="mb-0">Activity Details</h3>
                            </div>
                            <div class="col-6 text-right">
                                <button id="edit-button" class="btn btn-primary">Edit</button>
                                <a href="{{ route('activity.index') }}" id="back-button" class="btn btn-primary">Back to
                                    list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="activity-form" action="{{ route('activity.update', $activity->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $activity->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Activity</th>
                                        <td>
                                            <span class="view-mode">{{ $activity->activity }}</span>
                                            <input type="text" name="activity" class="form-control edit-mode"
                                                value="{{ $activity->activity }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tank ID</th>
                                        <td>
                                            <span class="view-mode">{{ $activity->tank_id }}</span>
                                            <input type="text" name="tank_id" class="form-control edit-mode"
                                                value="{{ $activity->tank_id }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Employee ID</th>
                                        <td>
                                            <span class="view-mode">{{ $activity->employee_id }}</span>
                                            <input type="text" name="employee_id" class="form-control edit-mode"
                                                value="{{ $activity->employee_id }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Feed Type</th>
                                        <td>
                                            <span class="view-mode">{{ $activity->feed_type }}</span>
                                            <input type="text" name="feed_type" class="form-control edit-mode"
                                                value="{{ $activity->feed_type }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Quantity</th>
                                        <td>
                                            <span class="view-mode">{{ $activity->quantity }}</span>
                                            <input type="number" step="0.01" name="quantity"
                                                class="form-control edit-mode" value="{{ $activity->quantity }}"
                                                style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Unit Measurement</th>
                                        <td>
                                            <span class="view-mode">{{ $activity->unit_measurement }}</span>
                                            <input type="text" name="unit_measurement" class="form-control edit-mode"
                                                value="{{ $activity->unit_measurement }}" style="display:none;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Date Recorded</th>
                                        <td>
                                            {{ \Carbon\Carbon::parse($activity->created_at)->format('Y-m-d') }}
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
            window.setTimeout(function () {
                alert.parentNode.removeChild(alert);
            }, 500);
        }
    }, 5000);
</script>
@endsection