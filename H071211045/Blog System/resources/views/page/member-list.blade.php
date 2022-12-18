@extends('index')

@section('head')
    <style>
        .btn.bg-third:hover {
            background-color: var(--secondary) !important;
            color: var(--third) !important;
        }
    </style>
@endsection

@section('page')
    <div class="p-5 bg-dark mb-3"></div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="display-6 text-third fw-bold">Member List</div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark mb-2">
                    <div class="card-body mt-3">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->level }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="{{route('page.member',  $user->username)}}" class="btn bg-third text-primary rounded-0">View Profile <i class="bi bi-person-fill"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection