@vite(['resources/sass/delete.scss'])

<div id="overlay-delete">
    <div class="container w-50" id="delete">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger m-3" role="alert">
                    <h4 class="alert-heading">Are you sure?</h4>
                    <p>Once you delete this book, you won't be able to recover it.</p>
                    <hr>
                    <p class="mb-0">Are you sure you want to delete this data?</p>
                </div>
                <div class="d-flex justify-content-center m-3">
                    <form action="{{ route('delete') }}" method="POST" id="form-delete">
                        @csrf
                        <input class="d-none" type="hidden" id="delete-id" name="id">
                        <button type="submit" class="btn bg-red text-light px-4 mx-1" id="confirm-delete">Yes</button>
                    </form>

                    <button class="btn bg-cooper text-light px-4 mx-1" id="cancel-delete">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
