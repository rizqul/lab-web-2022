@extends('layout.master')

{{-- {{dd($categories)}} --}}

@section('create-btn', 'Create New Product')
@section('formName', 'Create New Product')

@section('form_input')
    <input type="hidden" name="id" class="form-control form-control-sm" id="id" placeholder="duh" />
    <div class="mb-3 form-floating">
        <input type="text" name="name" class="form-control form-control-sm" id="name" placeholder="duh" />
        <label for="name">Name</label>
    </div>
    <div class="mb-3 form-floating seller">
        <select class="form-select" aria-label="Default select example" name="seller">
            <option selected>Open this select menu</option>
            @foreach ($sellers as $seller)
                <option value="{{ $seller->id }}">{{ $seller->name . ' (ID = ' . $seller->id . ')' }}</option>
            @endforeach
        </select>
        <label for="seller">Seller</label>
    </div>
    <div class="mb-3 form-floating category">
        <select class="form-select" aria-label="Default select example" name="category">
            <option selected>Open this select menu</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name . ' (ID = ' . $category->id . ')' }}</option>
            @endforeach
        </select>
        <label for="category">Category</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="text" name="price" class="form-control form-control-sm" id="price" placeholder="duh" />
        <label for="price">Price</label>
    </div>
    <div class="mb-3 form-floating status">
        <select class="form-select" aria-label="Default select example" name="status">
            <option selected>Open this select menu</option>
            <option value="Available">Available</option>
            <option value="Out Of Stock">Out Of Stock</option>
            <option value="Not Available">Not Available</option>
        </select>
        <label for="status">Status</label>
    </div>
    </div>
@stop

@section('thead')
    <tr>
        <th class="table-primary">Name</th>
        <th class="table-primary">Seller</th>
        <th class="table-primary">Category</th>
        <th class="table-primary">Price</th>
        <th class="table-primary">Status</th>
        <th class="table-primary">Action</th>
    </tr>
@stop

@section('tbody')
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->seller_name }}</td>
            <td>{{ $product->category_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->status }}</td>
            <td>
                <button class="editBtn btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#productAddModal"
                    value="{{ $product->id }}">Edit
                </button>
                <button class="deleteBtn btn btn-danger btn-sm" value="{{ $product->id }}">Delete</button>
            </td>
        </tr>
    @endforeach
@stop

@section('paginate_link', $products->links())
@section('route-form', route('seller.storeEloq'))

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.editBtn', function() {
            $('#goBtn').text('Update');
            $('#formLabel').text('Edit Seller');
            $('#productForm').attr('action', '{{ route('product.updateEloq') }}');
            console.log($(this).val());
            let id = $(this).val();
            $.ajax({
                type: 'GET',
                url: "/product/" + id,
                success: function(response) {
                    // console.log(response);
                    let product = response;
                    $('#id').val(product.id);
                    $('#name').val(product.name);
                    $('#price').val(product.price);
                    $('.seller select').val(product.seller_id).change();
                    $('.category select').val(product.category_id).change();
                    $('.status select').val(product.status).change();
                }
            })
        })

        $(document).on('click', '.deleteBtn', function() {
            let id = $(this).val();
            console.log(id)
            if (confirm('Are you sure you want to delete this item?')) {
                $.ajax({
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        _method: "DELETE"
                    },
                    url: 'seller/deleteQue/' + id,
                    success: function(response) {
                        window.location = '/seller'
                    }
                })
            }
        })

        $('#productAddModal').on('hidden.bs.modal', function() {
            $('#productAddModal form')[0].reset();
            $('#goBtn').text('Submit');
            $('#formLabel').text('Add Seller');
        })
    </script>
@stop
