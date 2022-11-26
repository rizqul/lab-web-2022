@extends('layout.master')

{{-- {{dd($categories)}} --}}

@section('create-btn', 'Create New Seller Permission')
@section('formName', 'Create New Seller Permission')

@section('form_input')
    <input type="hidden" name="id" class="form-control form-control-sm" id="id" placeholder="duh" />
    <div class="mb-3 form-floating seller">
        <select class="form-select" aria-label="Default select example" name="seller_id">
            <option selected>Open this select menu</option>
            @foreach ($sellers as $seller)
                <option value="{{ $seller->id }}">{{ $seller->name . ' (ID = ' . $seller->id . ')' }}</option>
            @endforeach
        </select>
        <label for="seller">Seller</label>
    </div>
    <div class="mb-3 form-floating permission">
        <select class="form-select" aria-label="Default select example" name="permission_id">
            <option selected>Open this select menu</option>
            @foreach ($permissions as $permission)
                <option value="{{ $permission->id }}">{{ $permission->name . ' (ID = ' . $permission->id . ')' }}</option>
            @endforeach
        </select>
        <label for="permission">Permission</label>
    </div>
    </div>
@stop

@section('thead')
    <tr>
        <th class="table-primary">Seller</th>
        <th class="table-primary">Permission</th>
        <th class="table-primary">Created At</th>
        <th class="table-primary">Updated At</th>
        <th class="table-primary">Action</th>
    </tr>
@stop

@section('tbody')
    @foreach ($permission_sellers as $item)
        <tr>
            <td>{{ $item->seller_name }}</td>
            <td>{{ $item->permission_name }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->updated_at }}</td>
            <td>
                <button class="editBtn btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#productAddModal"
                    value="{{ $item->id }}">Edit
                </button>
                <button class="deleteBtn btn btn-danger btn-sm" value="{{ $item->id }}">Delete</button>
            </td>
        </tr>
    @endforeach
@stop

@section('paginate_link', $permission_sellers->links())
@section('route-form', route('permissionseller.storeEloq'))

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.editBtn', function() {
            $('#goBtn').text('Update');
            $('#formLabel').text('Edit Seller Permission');
            // $('#productForm').attr('action', '{{ route('product.updateEloq') }}');
            console.log($(this).val());
            let id = $(this).val();
            $.ajax({
                type: 'GET',
                url: "/permissionseller/" + id,
                success: function(response) {
                    // console.log(response);
                    $('.seller select').val(response.seller_id).change();
                    $('.permission select').val(response.permission_id).change();
                }
            })
        })

        // $(document).on('click', '.deleteBtn', function() {
        //     let id = $(this).val();
        //     console.log(id)
        //     if (confirm('Are you sure you want to delete this item?')) {
        //         $.ajax({
        //             type: 'POST',
        //             data: {
        //                 _token: "{{ csrf_token() }}",
        //                 id: id,
        //                 _method: "DELETE"
        //             },
        //             url: 'product/deleteEloq/' + id,
        //             success: function(response) {
        //                 window.location = '/product'
        //             }
        //         })
        //     }
        // })

        $('#productAddModal').on('hidden.bs.modal', function() {
            $('#productAddModal form')[0].reset();
            $('#goBtn').text('Submit');
            $('#formLabel').text('Add Seller');
        })
    </script>
@stop
