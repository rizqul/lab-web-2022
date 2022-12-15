@extends('module')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <style>
        span.ck-file-dialog-button {
            display: none;
        }
    </style>
@endsection

@section('content')
    @if (Str::contains(Request::url(), 'edit'))
        <div class="display-5 pt-4">Edit User</div>
    @else
        <div class="display-5 pt-4">Create New User</div>
    @endif
    <hr>
    <form action="{{ route('page.users.update') }}" method="POST" enctype="multipart/form-data" id="form">
        @csrf
        <div class="row d-flex">
            <div class="col-6">
                @if (Str::contains(Request::url(), 'edit'))
                    <input type="hidden" name="id" value="{{ $user->id }}">
                @endif

                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control mb-2 rounded-0" id="name" name="name" placeholder="Name" required>

                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control mb-2 rounded-0" id="email" name="email" placeholder="Email" required>

                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control mb-2 rounded-0" id="username" name="username"
                    placeholder="Username" required>

                @if (Str::contains(Request::url(), 'new'))
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control mb-2 rounded-0" id="password" name="password"
                        placeholder="Password" required>
                @endif

                <label for="image" accept="image/*" class="form-label">Profile Picture </label>
                <input type="file" class="form-control rounded-0 mb-4" id="image" name="avatar" placeholder="Image">

                
            </div>

            <div class="col">
                @if (Str::contains(Request::url(), 'edit'))
                    <div class="container bg-primary p-5 rounded d-flex">
                        <img class="img-fluid rounded-circle" id="img-preview"
                            @if (!empty($user->avatar)) 
                                src="{{ asset('storage/' . $user->avatar) }}"
                            @else
                                src="{{ asset('storage/users/default-avatar.png') }}"
                            @endif
                            alt="profile_picture">
                        <div class="ms-5">
                            <div class="display-6 text-white">{{ $user->name }}</div>

                            <hr color="orange">

                            <div class="text-third fw-bold">Username</div>
                            <div class="text-white">{{ $user->username }}</div>

                            <div class="text-third fw-bold mt-4">Email</div>
                            <div class="text-white">{{ $user->email }}</div>

                            <div class="d-flex mt-4">
                                <div class="me-3">
                                    <div class="text-white">Posts : {{ $user->article_count }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>


        <label for="editor" class="form-label">Biography</label>
        <textarea name="biography" id="editor"></textarea>

        <div class="d-flex justify-content-end">
            <button type="submit" class="bg-transparent px-3 py-2 mt-4">Submit</button>
        </div>
    </form>
@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    @if (Str::contains(Request::url(), 'edit'))
        <script>
            $('#name').val('{{ $user->name }}');
            $('#email').val('{{ $user->email }}');
            $('#username').val('{{ $user->username }}');
            $('#image').val('{{ $user->avatar }}');
            $('#id').val('{{ $user->biography }}');
            
            $('#form').attr('action', '{{ route('page.users.update') }}');
        </script>
    @else

        <script>
            $('#form').attr('action', '{{ route('page.users.store') }}');
        </script>
    @endif
@endsection
