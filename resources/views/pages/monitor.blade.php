@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'monitor'
])

@section('content')
<div class="content">
    <div class="row justify-content-center">
        <!-- Monitor Content (Charts and Gauges) -->
        <div class="col-md-6 mb-4">
            <!-- First Column of Iframes -->
            <!-- Dissolved Oxygen Chart -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Dissolved Oxygen</h3>
                </div>
                <div class="card-body text-center">
                    <iframe width="450" height="260" style="border: 1px solid #cccccc;"
                        src="https://thingspeak.com/channels/2210102/charts/1?days=1&dynamic=true&title=Dissolved+Oxygen&type=line&xaxis=Time&yaxis=Dissolved+Oxygen%2C+ppm"></iframe>
                </div>
            </div>
            <!-- Temperature Chart -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Temperature</h3>
                </div>
                <div class="card-body text-center">
                    <iframe width="450" height="260" style="border: 1px solid #cccccc;"
                        src="https://thingspeak.com/channels/2210102/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Temperature&type=line"></iframe>
                </div>
            </div>
            <!-- pH Chart -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">pH</h3>
                </div>
                <div class="card-body text-center">
                    <iframe width="450" height="260" style="border: 1px solid #cccccc;"
                        src="https://thingspeak.com/channels/2210102/charts/3?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=pH&type=line"></iframe>
                </div>
            </div>
            <!-- Ammonia Chart -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Ammonia</h3>
                </div>
                <div class="card-body text-center">
                    <iframe width="450" height="260" style="border: 1px solid #cccccc;"
                        src="https://thingspeak.com/channels/2210102/charts/4?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Ammonia&type=line&yaxis=mg%2FL&yaxismax=1&yaxismin=0"></iframe>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Second Column of Iframes -->
            <!-- DO Gauge -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">DO Gauge</h3>
                </div>
                <div class="card-body text-center">
                    <iframe width="450" height="260" style="border: 1px solid #cccccc;"
                        src="https://thingspeak.com/channels/2210102/widgets/846871"></iframe>
                </div>
            </div>
            <!-- RTD Gauge -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">RTD Gauge</h3>
                </div>
                <div class="card-body text-center">
                    <iframe width="450" height="260" style="border: 1px solid #cccccc;"
                        src="https://thingspeak.com/channels/2210102/widgets/693873"></iframe>
                </div>
            </div>
            <!-- pH Gauge -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">pH Gauge</h3>
                </div>
                <div class="card-body text-center">
                    <iframe width="450" height="260" style="border: 1px solid #cccccc;"
                        src="https://thingspeak.com/channels/2210102/widgets/693876"></iframe>
                </div>
            </div>
            <!-- Ammonia Gauge -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Ammonia Gauge</h3>
                </div>
                <div class="card-body text-center">
                    <iframe width="450" height="260" style="border: 1px solid #cccccc;"
                        src="https://thingspeak.com/channels/2210102/widgets/839027"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            // Initialize charts for the monitor page
            demo.initChartsPages();
        });
    </script>
@endpush