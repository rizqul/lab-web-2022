<?php
require_once 'loginfunc.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!$_SESSION['login'])
    header("Location: index.php");
?>

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
                <a href="func.php/?logout=1" id="logout">Logout</a>
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
                            <input type="text" name="code" class="form-control form-control-sm" id="sCode"
                                placeholder="duh" />
                            <label for="sCode">Code</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="title" class="form-control form-control-sm" id="sTitle"
                                placeholder="duh" />
                            <label for="sTitle">Title</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="price" class="form-control form-control-sm" id="sPrice"
                                placeholder="duh" />
                            <label for="sPrice">Price</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="qty" class="form-control form-control-sm" id="sQty"
                                placeholder="duh" />
                            <label for="sQty">Quantity</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="series" class="form-control form-control-sm" id="sSeries"
                                placeholder="duh" />
                            <label for="sSeries">Series</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="prod_desc" class="form-control form-control-sm" id="sProd_desc"
                                placeholder="duh" />
                            <label for="sProd_desc">Product Description</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="img-sources" class="form-control form-control-sm" id="sImg_src"
                                placeholder="duh" />
                            <label for="sImg_src">Image Source</label>
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

    <!-- Edit PRODUCT MODAL -->
    <div class="modal fade" id="productEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="min-width: 75%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editProduct">
                    <div class="modal-body">
                        <div id="errorMessage" class="alert alert-warning d-none"></div>
                        <input type="hidden" name="product_id" id="product_id">
                        <div class="mb-3 form-floating">
                            <input type="text" name="code" class="form-control form-control-sm" id="code"
                                placeholder="duh" />
                            <label for="code">Code</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="title" class="form-control form-control-sm" id="title"
                                placeholder="duh" />
                            <label for="title">Title</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="price" class="form-control form-control-sm" id="price"
                                placeholder="duh" />
                            <label for="price">Price</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="qty" class="form-control form-control-sm" id="qty"
                                placeholder="duh" />
                            <label for="qty">Quantity</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="series" class="form-control form-control-sm" id="series"
                                placeholder="duh" />
                            <label for="series">Series</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="prod_desc" class="form-control form-control-sm" id="prod_desc"
                                placeholder="duh" />
                            <label for="prod_desc">Product Description</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" name="img-sources" class="form-control form-control-sm" id="img_src"
                                placeholder="duh" />
                            <label for="img_src">Image Source</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
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

        <table class="table table-bordered table-hover" id="the-table">
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
                <?php
                require_once 'func.php';
                $products = $db->view();
                foreach ($products as $items): ?>
                <tr>
                    <td>
                        <?php echo $items['product_code']; ?>
                    </td>
                    <td>
                        <?php echo $items['title']; ?>
                    </td>
                    <td>
                        <?php echo $items['price']; ?>
                    </td>
                    <td>
                        <?php echo $items['qty']; ?>
                    </td>
                    <td>
                        <?php echo $items['series']; ?>
                    </td>
                    <td>
                        <?php echo $items['product_desc']; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="<?php echo '#images-' . $items['id']; ?>">
                            View Images
                        </button>
                        <button type="button" value="<?= $items['id']; ?>" class="editProductBtn btn btn-success btn-sm"
                            data-bs-toggle="modal" data-bs-target="#productEditModal">Edit</button>
                        <button type="button" value="<?= $items['id']; ?>"
                            class="deleteProductBtn btn btn-danger btn-sm">Delete</button>
                    </td>
                    <div class="modal fade" id="<?php echo 'images-' . $items['id'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="min-width: 80vw;">
                            <div class="modal-content" style="background-color: #dedede;">
                                <div class="modal-body">
                                    <div id="<?php echo 'carousel-' . $items['id'] ?>" class="carousel slide"
                                        data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php $imgs = explode(',', $items['imgsrc']); ?>
                                            <?php foreach ($imgs as $image): ?>
                                            <div class="carousel-item <?php if ($image == $imgs[0]) {
                            echo 'active';
                        }
                                            ?>">
                                                <img src="<?php echo $image ?>" class="d-block w-100"
                                                    alt="<?php echo $image ?>"
                                                    style="max-width: 100%; max-height: 85vh; object-fit: contain;">
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="<?php echo '#carousel-' . $items['id']; ?>"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="<?php echo '#carousel-' . $items['id']; ?>"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                <?php endforeach; ?>
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