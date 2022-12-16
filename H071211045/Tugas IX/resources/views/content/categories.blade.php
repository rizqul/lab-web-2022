<div class="tab bg-dark categories-tab rounded">
    <div class="container my-2 d-flex flex-row">
        <div class="col align-middle label">
            Categories
            <i class="bi bi-collection-fill ms-2"></i>
        </div>
        <div class="col-100">
            <button type="submit" class="btn btn-skin btn-add" id="add-category">
                <i class="bi bi-plus align-middle"></i></button>
        </div>
    </div>
        <table class="table table-bordered m-auto w-100 h-100">
            <thead class="bg-beige">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($categories as $data)
                    <tr>
                        <th scope="row">{{ ($categories ->currentpage()-1) * $categories ->perpage() + $loop->index + 1 }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                            <button data="{{ $data }}" data-type="category" class="btn btn-dark edit"><i class="bi bi-pencil-fill align-middle"></i></button>
                            <button data="{{ $data->id }}" data-type="category" class="btn btn-danger text-light delete"><i class="bi bi-trash-fill align-middle"></i></button>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center text-beige">No Categories Added.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

    <div class="container d-flex justify-content-center mt-3">
        {{ $categories->links() }}
    </div>

</div>
