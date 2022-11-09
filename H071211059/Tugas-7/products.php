<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="#">Navbar</a>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <form class="d-flex ms-auto me-5" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- ADD PRODUCT MODAL -->
    <div class="modal fade" id="productAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="min-width: 75%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="saveProduct">
                    <div class="modal-body">
                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <div class="mb-3 form-floating">
                            <input type="text" name="code" class="form-control" id="floatingCode" placeholder="duh" />
                            <label for="floatingCode">Code</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="title" class="form-control" id="floatingTitle" placeholder="duh" />
                            <label for="floatingTitle">Title</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="price" class="form-control" id="floatingPrice" placeholder="duh" />
                            <label for="floatingPrice">Price</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="qty" class="form-control" id="floatingQty" placeholder="duh" />
                            <label for="floatingQty">Quantity</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="series" class="form-control" id="floatingSeries"
                                placeholder="duh" />
                            <label for="floatingSeries">Series</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="prod_desc" class="form-control" id="floatingSeries"
                                placeholder="duh" />
                            <label for="floatingSeries">Product Description</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="img-sources" class="form-control" id="floatingSrc"
                                placeholder="duh" />
                            <label for="floatingSrc">Image Source</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="container">
        <div class="top-menu mt-5 mb-3">
            <h3>XY Store Products

                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                    data-bs-target="#productAddModal">
                    Add Products
                </button>
            </h3>
        </div>

        <table class="table table-bordered table-hover" id="products-table">
            <thead>
                <tr>
                    <th class="table-primary">Code</th>
                    <th class="table-primary">Title</th>
                    <th class="table-primary">Price</th>
                    <th class="table-primary">Quantity</th>
                    <th class="table-primary">Series</th>
                    <th class="table-primary">Description</th>
                    <th class="table-primary">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td class="col-md-1"></td>
                    <td class="col-md-3"></td>
                    <td class="col-md-1"></td>
                    <td></td>
                    <td class="col-md-2"></td>
                    <td class="col-md-3"></td>
                    <td class="col-md-2"></td>
                </tr>
            </tbody>
        </table>

    </div>

















    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="main.js"></script>
</body>

</html>