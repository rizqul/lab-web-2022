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

    @if (session('status'))
        <style>
            #message {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
            }

            #inner-message {
                margin: 0 auto;
            }

            #message span {
                letter-spacing: 1.2px;
            }
        </style>
        <div id="message">
            <div class="m-2 float-end">
                <div class="alert alert-dark alert-dismissible fade show rounded-0" role="alert">
                    <strong>Hola Amigos!</strong> {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            </div>
        </div>
    @endif

    <div class="container register-setup d-flex justify-content-center py-3 text-third ">
        <div class="row px-5">
            <div class="display-6 mb-1">
                <span class="text-primary text-light">BECOME A</span>
                <span class="text-third fw-bold">CHAD</span>
            </div>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3 mt-3 row">
                    <label for="name" class="form-label col-2 ms-1 text-start">Name</label>
                    <div class="input-group col">
                        <div class="input-group-addon p-2 bg-primary">
                            <i class="bi bi-card-text"></i>
                        </div>
                        <input type="name" class="form-control rounded-0" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Enter your name" required>
                    </div>
                </div>

                <div class="mb-3 mt-3 row">
                    <label for="name" class="form-label col-2 ms-1 text-start">Username</label>
                    <div class="input-group col">
                        <div class="input-group-addon p-2 bg-primary">
                            <i class="bi bi-person"></i>
                        </div>
                        <input type="username" class="form-control rounded-0" id="username" name="username" value="{{ old('username') }}"
                            placeholder="Enter your username" required>
                    </div>
                </div>

                <div class="mb-3 mt-3 row">
                    <label for="email" class="form-label col-2 ms-1 text-start">Email</label>
                    <div class="input-group col">
                        <div class="input-group-addon p-2 bg-primary">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <input type="email" class="form-control rounded-0" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Enter a valid email" required>
                    </div>
                </div>
                <hr>
                <div class="mb-3 row">
                    <label for="password" class="form-label col-2 ms-1 text-start">New Password</label>
                    <div class="col">

                        <div class="input-group mt-2">
                            <div class="input-group-addon p-2 bg-primary">
                                <i class="bi bi-lock"></i>
                            </div>
                            <input type="password" class="form-control rounded-0" id="new_password" name="new_password"
                                placeholder="Enter a new password" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="password" class="form-label col-2 ms-1 text-start">Confirm Password</label>
                    <div class="col">
                        <div class="input-group mt-2">
                            <div class="input-group-addon p-2 bg-primary">
                                <i class="bi bi-lock"></i>
                            </div>
                            <input type="password" class="form-control rounded-0" id="confirm_password" name="confirm_password"
                                placeholder="Enter the same password" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="bg-transparent text-third mt-2 px-5 py-3">REGISTER</button>
                </div>

                <div class="mt-3 mb-3">
                    <span class="text-fourth">Already a sigma?</span>
                    <a href="{{ route('login.show') }}" class="text-third">Sign in</a>
                </div>
            </form>
        </div>
    </div>
@endsection
