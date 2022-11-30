<div class="tab bg-dark products-tab rounded" style="display:none">
    <div class="container my-2 d-flex flex-row">
        <div class="col align-middle label">
            Products
            <i class="ms-2 bi bi-box-seam-fill"></i>
        </div>
        <div class="col-100">
            <button type="submit" class="btn btn-skin btn-add" id="add-product">
                <i class="bi bi-plus align-middle"></i></button>
        </div>
    </div>
        <table class="table table-bordered m-auto w-100 h-100">
            <thead class="bg-beige">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Seller's ID</th>
                    <th scope="col">Category's ID</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($products as $data)
                    <tr>
                        <th scope="row">{{ ($products ->currentpage()-1) * $products ->perpage() + $loop->index + 1 }}</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->seller_id }}</td>
                            <td>{{ $data->category_id }}</td>
                            <td>{{ $data->price }}</td>
                            <td>{{ $data->status }}</td>

                            <td>
                                <button data="{{ $data }}" class="btn btn-dark edit-button"><i class="bi bi-pencil-fill align-middle"></i></button>
                                <button data="{{ $data->id }}" class="btn btn-danger text-light delete-button"><i class="bi bi-trash-fill align-middle"></i></button>
                            </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="7" class="text-center text-beige">No Product Stored.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

    <div class="card-footer d-flex justify-content-center mt-3">
        {{ $products->links() }}
    </div>

</div>
