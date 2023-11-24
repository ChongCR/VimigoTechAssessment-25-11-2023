@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-5">
                    <div class="card-header">
                        <div class="row col-md-12 m-1">
                            <div class="col-md-12 text-center p-5">
                                <h3 class="text-primary">Student Registry Login Panel</h3>
                                <div>
                                    <p><b>South of Australia University</b></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @error('credential')
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <p class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </p>
                            </div>
                        </div>
                        @enderror

                        <form id="loginForm" method="POST" action="{{ route('submit.login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('credential') is-invalid @enderror" name="email" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('credential') is-invalid @enderror" name="password" required autocomplete="current-password">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary w-25">{{ __('Login') }}</button>
                                    <a href="/register">
                                        <button type="button" class="btn btn-success w-25">{{ __('Register') }}</button>
                                    </a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
