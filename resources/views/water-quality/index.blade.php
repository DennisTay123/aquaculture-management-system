@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'waterQuality'
])

@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">Water Quality Record</h3>
                </div>

                <div class="card-body">
                    <!-- Form for all filters -->
                    <form method="GET" action="{{ route('waterQuality.index') }}">
                        <!-- First row: DO, Temperature, pH, Ammonia filters -->
                        <div class="row mb-1">
                            <!-- Filters for DO -->
                            <div class="col-md-3">
                                <div class="form-group" style="margin: 0">
                                    <label for="do_operator"><strong>DO Filter:</strong></label>
                                    <div class="input-group" style="margin: 0">
                                        <select name="do_operator" class="form-control-sm border"
                                            style="border-radius: 0.25rem;height: 2.5rem;">
                                            <option value=">" {{ request('do_operator') == '>' ? 'selected' : '' }}>&gt;
                                            </option>
                                            <option value="<" {{ request('do_operator') == '<' ? 'selected' : '' }}>&lt;
                                            </option>
                                        </select>
                                        <input type="text" name="do_value" class="form-control border"
                                            style="border-radius: 0.25rem;" placeholder="DO Value"
                                            value="{{ request('do_value') }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Filters for Temperature -->
                            <div class="col-md-3">
                                <div class="form-group" style="margin: 0">
                                    <label for="temperature_operator"><strong>Temperature Filter:</strong></label>
                                    <div class="input-group" style="margin: 0">
                                        <select name="temperature_operator" class="form-control-sm border"
                                            style="border-radius: 0.25rem;height: 2.5rem;">
                                            <option value=">" {{ request('temperature_operator') == '>' ? 'selected' : '' }}>&gt;</option>
                                            <option value="<" {{ request('temperature_operator') == '<' ? 'selected' : '' }}>&lt;</option>
                                        </select>
                                        <input type="text" name="temperature_value" class="form-control border"
                                            style="border-radius: 0.25rem;" placeholder="Temperature Value"
                                            value="{{ request('temperature_value') }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Filters for pH -->
                            <div class="col-md-3">
                                <div class="form-group" style="margin: 0">
                                    <label for="ph_operator"><strong>pH Filter:</strong></label>
                                    <div class="input-group" style="margin: 0">
                                        <select name="ph_operator" class="form-control-sm border"
                                            style="border-radius: 0.25rem;height: 2.5rem;">
                                            <option value=">" {{ request('ph_operator') == '>' ? 'selected' : '' }}>&gt;
                                            </option>
                                            <option value="<" {{ request('ph_operator') == '<' ? 'selected' : '' }}>&lt;
                                            </option>
                                        </select>
                                        <input type="text" name="ph_value" class="form-control border"
                                            style="border-radius: 0.25rem;" placeholder="pH Value"
                                            value="{{ request('ph_value') }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Filters for Ammonia -->
                            <div class="col-md-3">
                                <div class="form-group" style="margin: 0">
                                    <label for="ammonia_operator"><strong>Ammonia Filter:</strong></label>
                                    <div class="input-group" style="margin: 0">
                                        <select name="ammonia_operator" class="form-control-sm border"
                                            style="border-radius: 0.25rem; height: 2.5rem;">
                                            <option value=">" {{ request('ammonia_operator') == '>' ? 'selected' : '' }}>
                                                &gt;</option>
                                            <option value="<" {{ request('ammonia_operator') == '<' ? 'selected' : '' }}>
                                                &lt;</option>
                                        </select>
                                        <input type="text" name="ammonia_value" class="form-control border"
                                            style="border-radius: 0.25rem;" placeholder="Ammonia Value"
                                            value="{{ request('ammonia_value') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Second row: Date filters and buttons -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">
                                <div class="form-group mb-0">
                                    <label for="start_date" class="mb-1"><strong>From:</strong></label>
                                    <input type="text" id="start_date" name="start_date"
                                        class="form-control border datepicker" style="border-radius: 0.25rem;"
                                        placeholder="Start Date" value="{{ request('start_date') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-0">
                                    <label for="end_date" class="mb-1"><strong>To:</strong></label>
                                    <input type="text" id="end_date" name="end_date"
                                        class="form-control border datepicker" style="border-radius: 0.25rem;"
                                        placeholder="End Date" value="{{ request('end_date') }}">
                                </div>
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
                                    <th scope="col">Entry ID</th>
                                    <th scope="col">DO</th>
                                    <th scope="col">Temperature</th>
                                    <th scope="col">pH</th>
                                    <th scope="col">Ammonia</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Synced At</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @foreach ($waterQualityData as $data)
                                    <tr>
                                        <td>{{ $data->entry_id }}</td>
                                        <td>{{ $data->field1 }}</td>
                                        <td>{{ $data->field2 }}</td>
                                        <td>{{ $data->field3 }}</td>
                                        <td>{{ $data->field4 }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>{{ $data->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-center" aria-label="...">
                        {{ $waterQualityData->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Initialize Flatpickr
            flatpickr(".datepicker", {
                dateFormat: "Y-m-d"
            });
        });
    </script>
@endpush