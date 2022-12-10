@extends('index')

@section('login')
    <div class="layout-img">
        <img src="{{ asset('contents/sign-in-bg.png') }}" alt="hero" class="img-fluid">
    </div>

    <div class="container login-setup d-flex justify-content-center py-3 text-third ">
        <div class="row">
            <div class="display-6 mb-1">
                <span class="text-primary text-light">CHAD</span>
                <span class="text-third fw-bold">LOGIN</span>

            </div>
            <form action="" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="username" class="form-label row ms-1">Username</label>
                    <div class="input-group">
                        <div class="input-group-addon p-2 bg-primary">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <input type="username" class="form-control rounded-0" id="username" name="username"
                            placeholder="Enter your username">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label row ms-1">Password</label>
                    <div class="input-group">
                        <div class="input-group-addon p-2 bg-primary">
                            <i class="bi bi-lock"></i>
                        </div>
                        <input type="password" class="form-control rounded-0" id="password" name="password"
                            placeholder="Enter your password">
                    </div>
                </div>
                <button type="submit" class="bg-transparent text-third mt-2 px-3 py-2">LOGIN</button>

                <div class="mt-3">
                    <span class="text-fourth">A newbie chad?</span>
                    <a href="/register" class="text-third">Sign Up</a>
                </div>
            </form>

        </div>
    </div>
@endsection
