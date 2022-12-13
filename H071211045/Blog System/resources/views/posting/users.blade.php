@extends('module')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
@endsection

@section('content')
    @if (Str::contains(Request::url(), 'edit'))
        <div class="display-5 pt-4">Edit User</div>
    @else
        <div class="display-5 pt-4">Create New User</div>
    @endif
    <hr>

    <form>
        <div class="w-50">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control mb-2 rounded-0" id="name" name="name" placeholder="Name" 
            @if (Str::contains(Request::url(), 'edit'))
                value="{{ $user->name }}"
            @endif>
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control mb-2 rounded-0" id="email" name="email" placeholder="Email"
            @if (Str::contains(Request::url(), 'edit'))
                value="{{ $user->email }}"
            @endif>
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control mb-2 rounded-0" id="username" name="username" placeholder="Username"
            @if (Str::contains(Request::url(), 'edit'))
                value="{{ $user->username }}"
            @endif>
            <label for="image" accept="image/*" class="form-label">Profile Picture  </label>
            <input type="file" class="form-control mb-4" id="image" name="avatar" placeholder="Image"
            @if (Str::contains(Request::url(), 'edit'))
                value="{{ $user->avatar }}"
            @endif>
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
@endsection
