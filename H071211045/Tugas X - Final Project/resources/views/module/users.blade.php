@extends('module')

@section('content')
    <div class="display-5 pt-4">Users</div>

    <div class="mt-2">
        <div class="row">
            <div class="form-outline d-flex">
                <input type="text" class="form-control rounded-0" id="search-input" placeholder="Search For Any Users" />
                <button type="button" class="btn px-3 bg-primary rounded-0">
                    <i class="bi bi-search text-third"></i>
                </button>

                <div class="ms-3 me-3 dropdown">
                    <button class="btn bg-primary text-third rounded-0 px-5 dropdown-toggle" data-bs-toggle="collapse"
                        data-bs-target="#filter-control" aria-expanded="false" aria-controls="filter-control">
                        Filter By
                    </button>
                </div>

                <a href="articles/new" class="bg-primary text-third px-4 d-flex justify-content-center align-items-center">
                    <span class="me-2">New</span>
                    <span class="me-2">User</span>
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>
        </div>

        <div class="row px-3 mt-3 collapse w-50" id="filter-control">
            <div class="display-7 fw-bold">Filter</div>
            <hr class="mt-2 ms-2">
            <div class="d-flex ms-2 filters">


                <div class="col d-flex flex-column">
                    <span class="fw-bold">Date</span>
                    <a class="filter-link" href="users?f=date">Date Joined</a>

                </div>
                <div class="col d-flex flex-column">
                    <span class=" fw-bold">Status</span>
                    <a class="filter-link" href="users?f=status-active">Active</a>
                    <a class="filter-link" href="users?f=status-inactive">Inactive</a>
                    <a class="filter-link" href="users?f=status-blocked">Blocked</a>
                </div>
            </div>
        </div>

        <div class="row px-3 mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Articles Authored</th>
                        <th scope="col">Joined Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->article_count }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td class="actions">
                                <a href="#" class="btn bg-secondary text-third rounded-0">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <button href="#" class="btn bg-danger text-third rounded-0 delete"
                                    data-bs-toggle="modal" data-bs-target="#confirm-delete-modal"
                                    data-id="{{ $user->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No Users Found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade " id="confirm-delete-modal" tabindex="-1" aria-labelledby="confirm-delete-modal-label"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="confirm-delete-modal-label">Are you sure?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    The deleted user will be permanently removed from the system.
                </div>
                <div class="modal-footer">
                    <form id="modal-form" action="{{ route('user.delete')}}" method="POST">
                        @csrf
                        <button type="button" class="btn bg-danger text-fourth rounded-0"
                            data-bs-dismiss="modal">Close</button>
                        <input type="hidden" name="id" id="id">
                        <button type="submit" class="btn bg-primary text-fourth rounded-0">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".delete").click(function() {
            var id = $(this).data("id");
            $('#id').val(id);
            // $("#modal-form").attr('action', action);
        });
    </script>
@endsection
