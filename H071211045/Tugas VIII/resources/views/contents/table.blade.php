@vite(['resources/sass/table.scss'])

<div class="card w-75 output-data m-auto mt-5">
    <div class="card-header bg-cooper d-flex flex-row">
        <div class="col text-light m-auto label-output">Book Data</div>
        <div class="col-100">
            <button type="submit" class="btn btn-dark btn-add" id="add-button"><i class="bi bi-plus align-middle"></i></button>
        </div>
    </div>

    <table class="table table-bordered">
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
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $book->book_name }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category }}</td>
                    <td>{{ $book->favorable }}</td>
                    <td>
                        <button value="{{ $book->id }}" class="btn btn-dark"><i class="bi bi-pencil-fill align-middle"></i></button>
                        <button value="{{ $book->id }}" class="btn btn-danger text-light"><i class="bi bi-trash-fill align-middle"></i></button>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="6" class="text-center">No Books Yet ;D</td>
                </tr>
            @endforelse

        </tbody>
    </table>
    {{-- {{ $books->links() }} --}}
    <div class="d-flex justify-content-center">
        {{ $books->links('pagination::bootstrap-5') }}
    </div>
</div>
