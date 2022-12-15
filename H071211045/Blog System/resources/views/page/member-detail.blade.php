@extends('index')

@section('head')
    <style>
        body {
            background-color: var(--secondary) !important;
        }
    </style>
@endsection

@section('page')
    <div class="py-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card bg-fourth">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <img 
                            class="img-fluid rounded-circle"
                            id="img-preview"
                            @if (!empty($user->avatar))
                                src="{{ asset('storage/' . $user->avatar) }}"
                            @else
                                src="{{ asset('storage/users/default-avatar.png') }}" 
                            @endif
                            alt="profile_picture">
                        </div>
                        <div class="display-6 text-center mt-3">{{ $user->name }}</div>
                        <hr color="orange">
                        <div class="text-third fw-bold">Username</div>
                        <div class="text-center">{{ $user->username }}</div>

                        <div class="text-third fw-bold mt-4">Email</div>
                        <div class="text-center">{{ $user->email }}</div>

                        <div class="d-flex mt-4">
                            <div class="me-3">
                                <div class="text-center text-fourth bg-primary px-3 py-2 rounded">
                                    <i class="fa-solid fa-bolt text-third me-2"></i>Posts : {{ $user->article_count }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card bg-fourth">
                    <div class="card-body">
                        <div class="display-6">Biography</div>
                        <hr color="orange">
                        <div class="text-midde">
                            {!! $user->biography !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection