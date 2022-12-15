@extends('admin.template-forms')

@section('title', 'Register')

@section('content')

    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">REGISTER</h4>
        <div class="row mt-3">
            <div class="col-2 text-center ms-auto">
            <a class="btn btn-link px-3" href="#">
                <i class="fa fa-youtube text-white text-lg"></i>
            </a>
            </div>
            <div class="col-2 text-center px-1">
            <a class="btn btn-link px-3" href="#">
                <i class="fa fa-github text-white text-lg"></i>
            </a>
            </div>
            <div class="col-2 text-center me-auto">
            <a class="btn btn-link px-3" href="#">
                <i class="fa fa-linkedin text-white text-lg"></i>
            </a>
            </div>
        </div>
        </div>
    </div>

    <div class="card-body">
        <form role="form" class="text-start" method="POST" action="{{ route('register') }}">
            @csrf
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" required>
                </div>
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" required>
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" required>
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password Confirmation</label>
                    <input name="password_confirmation" type="password" class="form-control" required>
                </div>
                <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input name="remember" class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Register</button>
                </div>
                <p class="mt-4 text-sm text-center">
                    Do you have an account?
                    <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Sign in</a>
                </p>
        </form>
    </div>

@endsection
