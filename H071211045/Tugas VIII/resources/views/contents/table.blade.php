@vite(['resources/sass/table.scss'])

<div class="card w-75 mx-auto mt-5">

    <div class="card-header bg-cooper d-flex flex-row">
        <div class="col text-light m-auto label-output">Book Data</div>
        <div class="col-100">
            <button type="submit" class="btn btn-dark btn-add" id="add-button"><i
                    class="bi bi-plus align-middle"></i></button>
        </div>
    </div>
        <table class="table table-bordered m-auto w-100 h-100">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Favorable</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($books as $book)
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

                @empty
                    <tr>
                        <td colspan="6" class="text-center">No Books Yet ;D</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

    <div class="card-footer d-flex justify-content-center bg-lemon p-0 m-0">
        {{ $books->links() }}
    </div>

</div>


