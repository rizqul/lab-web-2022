@extends('index')

@section('page')
    <style>
        body {
            overflow: hidden;
        }
    </style>

    <div class="layout-img">
        <img src="{{ asset('contents/sign-up-bg.jpg') }}" alt="hero" class="img-fluid">
    </div>

    <div class="container register-setup d-flex justify-content-center py-3 text-third ">
        <div class="row">
            <div class="display-6 mb-1">
                <span class="text-primary text-light">NEW</span>
                <span class="text-third fw-bold">CHAD</span>
            </div>
            
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label row ms-1">Name</label>
                    <div class="input-group">
                        <div class="input-group-addon p-2 bg-primary">
                            <i class="bi bi-card-text"></i>
                        </div>
                        <input type="name" class="form-control rounded-0" id="name" name="name"
                            placeholder="Enter your name" required>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="name" class="form-label row ms-1">Username</label>
                    <div class="input-group">
                        <div class="input-group-addon p-2 bg-primary">
                            <i class="bi bi-person"></i>
                        </div>
                        <input type="username" class="form-control rounded-0" id="username" name="username"
                            placeholder="Enter your username" required>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="email" class="form-label row ms-1">Email Address</label>
                    <div class="input-group">
                        <div class="input-group-addon p-2 bg-primary">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <input type="email" class="form-control rounded-0" id="email" name="email"
                            placeholder="Enter your email" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label row ms-1">Password</label>
                    <div class="input-group">
                        <div class="input-group-addon p-2 bg-primary">
                            <i class="bi bi-lock"></i>
                        </div>
                        <input type="password" class="form-control rounded-0" id="password" name="password"
                            placeholder="Enter your password" required>
                    </div>
                </div>
                <button type="submit" class="bg-transparent text-third mt-2 px-3 py-2">REGISTER</button>

                <div class="mt-3 mb-3">
                    <span class="text-fourth">Already a sigma?</span>
                    <a href="/login" class="text-third">Sign in</a>
                </div>
            </form>

        </div>
    </div>
@endsection
