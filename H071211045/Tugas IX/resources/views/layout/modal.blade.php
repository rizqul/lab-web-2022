<div class="overlay">
    <div class="container input-box bg-dark rounded" tabindex="-1" aria-hidden="true">
        <div class="d-flex ">
            <div class="col display-7 ms-3 label label-modal my-2" id="modal-title"></div>
            <div class="col text-end mx-auto my-2">
                <button class="btn bg-dark m-0" id="close-modal"><i class="bi bi-box-arrow-left"></i></button>
            </div>
        </div>

        <hr>

        {{-- INPUT REQUEST --}}
        <form action="" method="post" id="sender">
            @csrf
            <div class="container requests">

                {{-- Product --}}
                <section id="product-modal">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="product_name">

                    <label for="seller" class="form-label mt-2">Seller</label>
                    <select class="form-select" name="seller_id">
                        <option value="" selected>-- Select a seller --</option>
                        @foreach ($sellers as $x)
                            <option value="{{ $x->id }}">{{ $x->name }}</option>
                        @endforeach
                    </select>

                    <label for="category" class="form-label mt-2">Category</label>
                    <select class="form-select" name="category_id">
                        <option value="" selected>-- Select a Category --</option>
                        @foreach ($categories as $x)
                            <option value="{{ $x->id }}">{{ $x->name }}</option>
                        @endforeach
                    </select>

                    <label for="price" class="form-label mt-2">Price</label>
                    <input type="number" class="form-control" placeholder="Price" name="product_price">

                    <label for="status" class="form-label mt-2">Status</label>
                    <select class="form-select" name="product_status">
                        <option value="" selected>-- Select a Status --</option>
                        <option value="ready">Ready on Stock</option>
                        <option value="not ready">Not Ready</option>
                    </select>
                </section>

                {{-- Seller --}}
                <section id="seller-modal">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="seller_name">

                    <label for="address" class="form-label mt-2">Address</label>
                    <input type="text" class="form-control" placeholder="Address" name="seller_address">

                    <label for="gender" class="form-label mt-2">Gender</label>
                    <select class="form-select" name="seller_gender">
                        <option value="" selected>-- Select a Gender --</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    <label for="phone" class="form-label mt-2" name="seller_phone">Phone</label>
                    <input type="text" class="form-control" placeholder="Phone" name="seller_phone">

                    <label for="status" class="form-label mt-2">Status</label>
                    <select class="form-select" name="seller_status">
                        <option value="" selected>-- Select a Status --</option>
                        <option value="active">Active</option>
                        <option value="not active">Not Active</option>
                    </select>
                </section>

                {{-- Category --}}
                <section id="category-modal">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="category_name">

                    <label for="status" class="form-label mt-2">Status</label>
                    <select class="form-select" name="category_status">
                        <option value="" selected>-- Select a Status --</option>
                        <option value="active">Active</option>
                        <option value="not active">Not Active</option>
                    </select>
                </section>

                {{-- Permission --}}
                <section id="permission-modal">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="permission_name">

                    <label for="description" class="form-label mt-2">Description</label>
                    <input type="text" class="form-control" placeholder="Description" name="permission_description">

                    <label for="status" class="form-label mt-2">Status</label>
                    <select class="form-select" name="permission_status">
                        <option value="" selected>-- Select a Status --</option>
                        <option value="active">Active</option>
                        <option value="not active">Not Active</option>
                    </select>
                </section>

                {{-- Seller Permission --}}
                <section id="seller-permission-modal">
                    <label for="seller" class="form-label">Seller</label>
                    <select class="form-select" name="permission_seller_id">
                        <option value="" selected>-- Select a Seller --</option>
                        @foreach ($sellers as $x)
                            <option value="{{ $x->id }}">{{ $x->name }}</option>
                        @endforeach
                    </select>

                    <label for="permission" class="form-label mt-2">Permission</label>
                    <select class="form-select" name="permission_id">
                        <option value="" selected>-- Select a Permission --</option>
                        @foreach ($permissions as $x)
                            <option value="{{ $x->id }}">{{ $x->name }}</option>
                        @endforeach
                    </select>

                    {{-- <label for="status" class="form-label mt-2">Status</label>
                    <select class="form-select" name="seller_permission_status">
                        <option value="" selected>-- Select a Status --</option>
                        <option value="active">Active</option>
                        <option value="not active">Not Active</option>
                    </select> --}}
                </section>

                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn bt-modal mt-4" id="submit" value="SUBMIT">
                </div>
            </div>
            <br>
        </form>

    </div>
</div>
