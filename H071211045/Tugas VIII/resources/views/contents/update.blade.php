@vite(['resources/sass/update.scss'])

<div id="overlay-modal" >

    <div class="card w-50" id="modal">
        <div class="card-header label-input d-flex">
            <div class="col display-7 m-auto" id="updating-label">Add/Edit Data</div>
            <div class="col text-end m-auto">
                <button type="button" class="btn-close m-0" id="close-button"></button>
            </div>
        </div>
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" id="form-field">
            @csrf
            <input class="d-none" type="hidden" id="edit-id" name="id">
            <div class="row mt-2">
                <div class="col-2 m-3 display-7">Book Name</div>
                <div class="col-9 m-2"><input type="text"
                        class="form-control @error('book_name') is-invalid @enderror" placeholder="Book Name"
                        name="book_name" id="book_name"></div>

                @error('book_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            <div class="row">
                <div class="col-2 m-3 display-7">Author</div>
                <div class="col-9 m-2"><input type="text" class="form-control @error('author') is-invalid @enderror"
                        placeholder="Author" name="author" id="author"></div>

                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            <div class="row">
                <div class="col-2 m-3 display-7">Category</div>
                <div class="col-9 m-2"><input type="text"
                        class="form-control @error('category') is-invalid @enderror" placeholder="Category"
                        name="category" id="category"></div>

                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            <div class="row">
                <div class="col-2 m-3 display-7">Favorable</div>
                <div class="col-9 m-2">
                    <select class="form-select" aria-label="Default select example" name="favorable" id="favorable">
                        <option selected value="">- Is the book is favorable? -</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            <div class="row m-3">
                <button type="submit" name="save" class="btn text-light" id="submit-button">Add Data</button>
            </div>
        </form>
    </div>
</div>
