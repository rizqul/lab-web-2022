<div class="tab bg-dark sellers-tab rounded">
    <div class="container my-2 d-flex flex-row">
        <div class="col align-middle label">
            Sellers
            <i class="bi bi-person-lines-fill ms-2"></i>
        </div>
        <div class="col-100">
            <button type="submit" class="btn btn-skin btn-add" id="add-seller">
                <i class="bi bi-plus align-middle"></i></button>
        </div>
    </div>
        <table class="table table-bordered m-auto w-100 h-100">
            <thead class="bg-beige">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($sellers as $data)
                    <tr>
                        <th scope="row">{{ ($sellers ->currentpage()-1) * $sellers ->perpage() + $loop->index + 1 }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->gender }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->status }}</td>

                        <td>
                            <button data="{{ $data }}" class="btn btn-dark edit-button"><i class="bi bi-pencil-fill align-middle"></i></button>
                            <button data="{{ $data->id }}" class="btn btn-danger text-light delete-button"><i class="bi bi-trash-fill align-middle"></i></button>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="7" class="text-center text-beige">No Seller Registered.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

    <div class="card-footer d-flex justify-content-center bg-lemon p-0 m-0">
        {{ $sellers->links() }}
    </div>

</div>
