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
                    <th scope="col">Seller</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($products as $p)
                    <tr>
                        <th scope="row">{{ ($products ->currentpage()-1) * $products ->perpage() + $loop->index + 1 }}</th>
                            <td>{{ $p->name }}</td>

                            @foreach ($sellers as $s)
                                @if ($s->id == $p->seller_id)
                                    <td>{{ $s->name }}</td>
                                @endif
                            @endforeach

                            @foreach ($categories as $c)
                                @if ($c->id == $p->category_id)
                                    <td>{{ $c->name }}</td>
                                @endif
                            @endforeach

                            <td>{{ $p->price }}</td>
                            <td>{{ $p->status }}</td>

                            <td>
                                <button data="{{ $p }}" data-type="product" class="btn btn-dark edit"><i class="bi bi-pencil-fill align-middle"></i></button>
                                <button data="{{ $p->id }}" data-type="product" class="btn btn-danger text-light delete"><i class="bi bi-trash-fill align-middle"></i></button>
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
