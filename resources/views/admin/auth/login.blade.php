@extends('admin.auth.layout.auth-master')
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <div class="card-header d-flex justify-content-center">
                            <h4>Admin Login</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                                        tabindex="1" value="{{ old('email') }}" required autofocus>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                        <div class="float-right">
                                            <a href="{{ route('admin.password.request') }}" class="text-small">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        </div>
                                    </div>
                                    <input id="password" type="password"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="password"
                                        tabindex="2" required>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                            id="remember_me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Web Laravel Job Portal
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
