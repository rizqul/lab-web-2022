@extends('index')

@section('page')
    <style>
        body {
            overflow: hidden;
        }
    </style>

    <div class="layout-img">
        <img src="{{ asset('contents/sign-in-bg.png') }}" alt="hero" class="img-fluid">
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

    <div class="container login-setup d-flex justify-content-center py-3 text-third ">
        <div class="row">
            <div class="display-6 mb-1">
                <span class="text-primary text-light">CHAD</span>
                <span class="text-third fw-bold">LOGIN</span>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="username" class="form-label row ms-1">Username</label>
                    <div class="input-group">
                        <div class="input-group-addon p-2 bg-primary">
                            <i class="bi bi-person"></i>
                        </div>
                        <input type="username" class="form-control rounded-0" id="username" name="username" value="{{ old('username') }}"
                            placeholder="Enter your username" required>
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
                <button type="submit" class="bg-transparent text-third mt-2 px-3 py-2">LOGIN</button>

                <div class="mt-3">
                    <span class="text-fourth">A newbie chad?</span>
                    <a href=" {{ route('register.show') }}" class="text-third">Sign Up</a>
                </div>
            </form>

        </div>
    </div>
@endsection
