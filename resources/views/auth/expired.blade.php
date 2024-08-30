@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'register'
])

@section('content')
<div class="content">
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">{{ __('Registration Link Expired') }}</h2>
                <div class="card-body">
                    The registration link has expired. Please contact management to get a new link.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection