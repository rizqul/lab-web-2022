<div class="tab bg-dark seller-permissions-tab rounded">
    <div class="container my-2 d-flex flex-row">
        <div class="col align-middle label">
            Seller Permissions
            <i class="bi bi-person-fill-lock ms-2"></i>
        </div>
        <div class="col-100">
            <button type="submit" class="btn btn-skin btn-add" id="add-seller-permission">
                <i class="bi bi-plus align-middle"></i></button>
        </div>
    </div>
        <table class="table table-bordered m-auto w-100 h-100">
            <thead class="bg-beige">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Seller</th>
                    <th scope="col">Permission</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($sellerPerms as $data)
                    <tr>
                        <th scope="row">{{ ($sellerPerms ->currentpage()-1) * $sellerPerms ->perpage() + $loop->index + 1 }}</th>

                        @foreach ( $sellers as $s )
                            @if ( $s->id == $data->seller_id )
                                <td>{{ $s->name }}</td>
                            @endif
                        @endforeach

                        @foreach ( $permissions as $p )
                            @if ( $p->id == $data->permission_id )
                                <td>{{ $p->name }}</td>
                            @endif
                        @endforeach

                        <td>
                            <button data="{{ $data }}" data-type="seller-permission" class="btn btn-dark edit"><i class="bi bi-pencil-fill align-middle"></i></button>
                            <button data="{{ $data->id }}" data-type="seller-permission" class="btn btn-danger text-light delete"><i class="bi bi-trash-fill align-middle"></i></button>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center text-beige">No Any Permission Of Seller Submitted.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

    <div class="card-footer d-flex justify-content-center mt-3">
        {{ $sellerPerms->links() }}
    </div>

</div>
