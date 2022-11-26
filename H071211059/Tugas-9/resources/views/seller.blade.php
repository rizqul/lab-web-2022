@extends('layout.master')

@section('create-btn', 'Create New Seller')

@section('form_input')
    <input type="hidden" name="id" class="form-control form-control-sm" id="id" placeholder="duh"/>
    <div class="mb-3 form-floating">
        <input type="text" name="name" class="form-control form-control-sm" id="name"
               placeholder="duh"/>
        <label for="name">Name</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="text" name="address" class="form-control form-control-sm" id="address"
               placeholder="duh"/>
        <label for="address">Address</label>
    </div>
    <div class="mb-3 form-floating gender">
        <select class="form-select" aria-label="Default select example" name="gender">
            <option selected>Open this select menu</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="plastik indomaret">Plastik Indomaret</option>
        </select>
        <label for="gender">Gender</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="text" name="no_hp" class="form-control form-control-sm" id="no_hp"
               placeholder="duh"/>
        <label for="no_hp">Phone Number</label>
    </div>
    <div class="mb-3 form-floating status">
        <select class="form-select" aria-label="Default select example" name="status">
            <option selected>Open this select menu</option>
            <option value="Active">Active</option>
            <option value="Suspended">Suspended</option>
        </select>
        <label for="status">Status</label>
    </div>
    </div>
@stop

@section('thead')
    <tr>
        <th class="table-primary">Name</th>
        <th class="table-primary">Address</th>
        <th class="table-primary">Gender</th>
        <th class="table-primary">Phone Number</th>
        <th class="table-primary">Status</th>
        <th class="table-primary">Action</th>
    </tr>
@stop

@section('tbody')
    @foreach($sellers as $seller)
    <tr>
            <td>{{$seller->name}}</td>
            <td>{{$seller->address}}</td>
            <td>{{$seller->gender}}</td>
            <td>{{$seller->no_hp}}</td>
            <td>{{$seller->status}}</td>
            <td>
                <button class="editBtn btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#productAddModal"
                        value="{{$seller->id}}">Edit
                </button>
                <button class="deleteBtn btn btn-danger btn-sm" value="{{$seller->id}}">Delete</button>
            </td>
        </tr>
    @endforeach
@stop

@section('paginate_link', $sellers->links())
@section('route-form', route('seller.storeEloq'))

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.editBtn', function () {
            $('#goBtn').text('Update');
            $('#formLabel').text('Edit Seller');
            $('#productForm').attr('action', '{{route('seller.updateEloq')}}');
            console.log($(this).val());
            let id = $(this).val();
            $.ajax({
                type: 'GET',
                url: "/seller/" + id,
                success: function (response) {
                    let seller = response;
                    $('#id').val(seller.id);
                    $('#name').val(seller.name);
                    $('.gender select').val(seller.gender).change();
                    $('#address').val(seller.address);
                    $('#no_hp').val(seller.no_hp);
                    $('.status select').val(seller.status).change();
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
                    url: 'seller/deleteQue/' + id,
                    success: function (response) {
                        window.location='/seller'
                    }
                })
            }
        })

        $('#productAddModal').on('hidden.bs.modal', function () {
            $('#productAddModal form')[0].reset();
            $('#goBtn').text('Submit');
            $('#formLabel').text('Add Seller');
        })
    </script>
@stop