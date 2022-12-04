@extends('layout.master')

@section('create-btn', 'Create New Category')
@section('formName', 'Create New Category')

@section('form_input')
    <input type="hidden" name="id" class="form-control form-control-sm" id="id" placeholder="duh" />
    <div class="mb-3 form-floating">
        <input type="text" name="name" class="form-control form-control-sm" id="name" placeholder="duh" />
        <label for="name">Name</label>
    </div>
    <div class="mb-3 form-floating status">
        <select class="form-select" aria-label="Default select example" name="status" id="status">
            <option selected>Open this select menu</option>
            <option value="Status 1">Status 1</option>
            <option value="Status 2">Status 2</option>
        </select>
        <label for="status">Status</label>
    </div>
    </div>
@stop

@section('thead')
    <tr>
        <th class="table-primary">Name</th>
        <th class="table-primary">Status</th>
        <th class="table-primary">Created At</th>
        <th class="table-primary">Updated At</th>
        <th class="table-primary">Action</th>
    </tr>
@stop

@section('tbody')
    @foreach ($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->status }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
            <td>
                <button class="editBtn btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#productAddModal"
                    value="{{ $category->id }}">Edit
                </button>
                <button class="deleteBtn btn btn-danger btn-sm" value="{{ $category->id }}">Delete</button>
            </td>
        </tr>
    @endforeach
@stop

@section('paginate_link', $categories->links())
@section('route-form', route('category.storeEloq'))

@section('js')
    <script>
        $(document).on('click', '.editBtn', function() {
            $('#goBtn').text('Update');
            $('#formLabel').text('Edit Category');
            $('#productForm').attr('action', '{{route('category.updateQue')}}');
            console.log($(this).val());
            let id = $(this).val();

            $.ajax({
                type: 'GET',
                url: "/category/" + id,
                success: function(response) {
                    let category = response;
                    $('#id').val(category.id);
                    $('#name').val(category.name);
                    $('.status select').val(category.status).change();
                }
            })
        })

        $(document).on('click', '.deleteBtn', function () {
            let id = $(this).val();
            console.log(id)
            if (confirm('Are you sure you want to delete this item?')) {
                $.ajax({
                    type: 'POST',
                    data: {_token : "{{csrf_token()}}",
                        id: id,
                        _method: "DELETE"},
                    url: 'category/deleteQue/' + id,
                    success: function (response) {
                        window.location='/category'
                    }
                })
            }
        })
        
        $('#productAddModal').on('hidden.bs.modal', function() {
            $('#productAddModal form')[0].reset();
            $('#goBtn').text('Submit');
            $('#formLabel').text('Add Category');
        })
    </script>
@stop
