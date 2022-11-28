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
                    <th scope="col">Seller's ID</th>
                    <th scope="col">Permission's ID</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                {{-- @forelse ($books as $book)
                    <tr>
                        <th scope="row">{{ ($books ->currentpage()-1) * $books ->perpage() + $loop->index + 1 }}</th>
                        <td>{{ $book->book_name }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category }}</td>

                        @if ($book->favorable == 1)
                            <td>Yes</td>
                        @else
                            <td>No</td>
                        @endif

                        <td>
                            <button data="{{ $book }}" class="btn btn-dark edit-button"><i class="bi bi-pencil-fill align-middle"></i></button>
                            <button data="{{ $book->id }}" class="btn btn-danger text-light delete-button"><i class="bi bi-trash-fill align-middle"></i></button>
                        </td>
                    </tr>

                @empty --}}
                    <tr>
                        <td colspan="4" class="text-center text-beige">No Any Permission Of Seller Submitted.</td>
                    </tr>
                {{-- @endforelse --}}

            </tbody>
        </table>

    {{-- <div class="card-footer d-flex justify-content-center bg-lemon p-0 m-0">
        {{ $books->links() }}
    </div> --}}

</div>
