@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'register'
])

@section('content')
<div class="content">
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">{{ __('Account Registration') }}</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.complete.store', $token) }}">
                        @csrf
                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="nc-icon nc-single-02"></i>
                                </span>
                            </div>
                            <input name="name" type="text" class="form-control" placeholder="Name"
                                value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group{{ $errors->has('contact_number') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="nc-icon nc-mobile"></i>
                                </span>
                            </div>
                            <input name="contact_number" type="text" class="form-control" placeholder="Contact Number"
                                value="{{ old('contact_number') }}" required>
                            @if ($errors->has('contact_number'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('contact_number') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="nc-icon nc-map-big"></i>
                                </span>
                            </div>
                            <textarea name="address" class="form-control" placeholder="Address"
                                required>{{ old('address') }}</textarea>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="nc-icon nc-key-25"></i>
                                </span>
                            </div>
                            <input name="password" type="password" class="form-control" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="nc-icon nc-key-25"></i>
                                </span>
                            </div>
                            <input name="password_confirmation" type="password" class="form-control"
                                placeholder="Password Confirmation" required>
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-check text-left">
                            <label class="form-check-label">
                                <input class="form-check-input" name="agree_terms_and_conditions" type="checkbox"
                                    required>
                                <span class="form-check-sign"></span>
                                {{ __('I agree to the') }}
                                <a href="#something">{{ __('terms and conditions') }}</a>.
                            </label>
                            @if ($errors->has('agree_terms_and_conditions'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('agree_terms_and_conditions') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="card-footer">
                            <button type="submit"
                                class="btn btn-info btn-round">{{ __('Complete Registration') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection