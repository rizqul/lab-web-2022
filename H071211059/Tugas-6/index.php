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

    <!-- ADD PRODUCT FORM -->
    <div class="modal fade" id="productAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="saveProduct">
                    <div class="modal-body">
                        <div id="errorMessage" class="alert alert-warning d-none"></div>

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
                            <input type="text" name="img-sources" class="form-control" id="floatingSrc"
                                placeholder="duh" />
                            <label for="floatingSrc">Image Source</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>XY Store Products
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#productAddModal">
                                Add Products
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
require "dbconn.php";
$select_all = "SELECT * FROM products";
$result = mysqli_query($conn, $select_all);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
                        <table class="table table-bordered table-hover" id="products-table">
                            <thead>
                                <tr>
                                    <th class="table-primary">ID</th>
                                    <th class="table-primary">Title</th>
                                    <th class="table-primary">Price</th>
                                    <th class="table-primary">Quantity</th>
                                    <th class="table-primary">Series</th>
                                    <th class="table-primary">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $items): ?>
                                <tr>
                                    <td><?php echo $items['id']; ?></td>
                                    <td><?php echo $items['title']; ?></td>
                                    <td><?php echo $items['price']; ?></td>
                                    <td><?php echo $items['qty']; ?></td>
                                    <td><?php echo $items['series']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="<?php echo '#images-' . $items['id'];?>">
                                            View Images
                                        </button>
                                    </td>
                                    <div class="modal fade" id="<?php echo 'images-' . $items['id'] ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="min-width: 80vw;">
                                            <div class="modal-content" style=" background-color: black;">
                                                <div class="modal-body">
                                                    <div id="<?php echo 'carousel-' . $items['id'] ?>"
                                                        class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <?php $imgs = explode(',', $items['imgsource']);?>
                                                            <?php foreach ($imgs as $image): ?>
                                                            <div
                                                                class="carousel-item <?php if ($image == $imgs[0]) echo 'active'?>">
                                                                <img src="<?php echo $image ?>" class="d-block w-100"
                                                                    alt="<?php echo $image?>"
                                                                    style="max-width: 100%; max-height: 85vh; object-fit: contain;">
                                                            </div>
                                                            <?php endforeach;?>
                                                        </div>
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="<?php echo '#carousel-' . $items['id'];?>"
                                                            data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="<?php echo '#carousel-' . $items['id'];?>"
                                                            data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>