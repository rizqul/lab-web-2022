<?php require_once 'header.php' ?>
<?php
$title = $price = $desc = $qty = $series = $img_sources = '';
$titleErr = $priceErr = $descErr = $qtyErr = $seriesErr = $img_sourcesErr = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['title'])) {
        $titleErr = 'title is required';
    } else {
        $title = filter_input(
            INPUT_POST,
            'title',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }

    if (empty($_POST['price'])) {
        $priceErr = 'price is required';
    } else {
        $price = filter_input(
            INPUT_POST,
            'price',
            FILTER_SANITIZE_NUMBER_FLOAT
        );
    }

    if (empty($_POST['desc'])) {
        $descErr = 'desc is required';
    } else {
        $desc = filter_input(
            INPUT_POST,
            'desc',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }

    if (empty($_POST['qty'])) {
        $qtyErr = 'qty is required';
    } else {
        $qty = filter_input(
            INPUT_POST,
            'qty',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }

    if (empty($_POST['series'])) {
        $seriesErr = 'series is required';
    } else {
        $series = filter_input(
            INPUT_POST,
            'series',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }

    if (empty($_POST['img-source'])) {
        $img_sourcesErr = 'img-source is required';
    } else {
        $img_sources = filter_input(
            INPUT_POST,
            'img-source',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }

    if (empty($titleErr) && empty($priceErr) && empty($descErr) && empty($qtyErr) && empty($seriesErr) && empty($img_sourcesErr)) {
        $sql = "INSERT INTO products (title, price, `desc`, qty, series, imgsource) 
                values ('$title', '$price', '$desc', '$qty', '$series', '$img_sources');";
        if (mysqli_query($conn, $sql)) {
            // success
            header('Location: index.php');
        } else {
            // error
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}

$selectAll = 'SELECT * FROM products';
$result = mysqli_query($conn, $selectAll);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="container">
    <div class="center">
        <div class="ms-auto my-3">
            <button type="button" class="btn btn-primary mx-1" id="add-btn">Add</button>
            <button type="button" class="btn btn-secondary mx-1">Edit</button>
        </div>
    </div>

    <div id="add">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="center mt-2 w-50 mx-auto" id="form">
            <div class="mb-2">
                <label for="title" class="form-label">Product Title</label>
                <input type="text" class="form-control add-form" id="title" name="title" placeholder="Enter product title" value="">
            </div>
            <div class="mb-2">
                <label for="price" class="form-label">Product Price</label>
                <input type="text" class="form-control add-form" id="price" name="price" placeholder="Enter product's price" value="">
            </div>
            <div class="mb-2">
                <label for="desc" class="form-label">Description</label>
                <textarea class="form-control add-form" id="desc" name="desc" placeholder="Enter product's description"></textarea>
            </div>
            <div class="mb-2">
                <label for="qty" class="form-label">Quantity</label>
                <input type="text" class="form-control add-form" id="qty" name="qty" placeholder="Enter product's quantity" value="">
            </div>
            <div class="mb-2">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control add-form" id="series" name="series" placeholder="Enter product's series" value="">
            </div>
            <div class="mb-2">
                <label for="img-source" class="form-label">Image Source</label>
                <input type="text" class="form-control add-form" id="img-source" name="img-source" placeholder="Enter product's image source" value="">
            </div>
            <div class="mt-3">
                <input type="submit" name="submit" value="Submit" class="btn btn-dark " id="submit">
                <input type="button" name="cancel" value="Cancel" class="btn btn-dark" id="cancel">
            </div>
        </form>
    </div>

    <table class="table w-75 mx-auto">
        <thead>
            <tr>
                <th scope="col">Code</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity</th>
                <th scope="col">Series</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $item) : ?>
                <tr>
                    <th scope="row"><?php echo $item['id']; ?></th>
                    <td><?php echo $item['title']; ?></td>
                    <td><?php echo $item['price']; ?></td>
                    <td><?php echo $item['desc']; ?></td>
                    <td><?php echo $item['qty']; ?></td>
                    <td><?php echo $item['series']; ?></td>
                    <td><button type="button" class="btn btn-outline-success btn-sm" onclick="">Show Images</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- <div class="carousel-box">
</div>
<div class="d-flex">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active a">
                <img src="https://images.unsplash.com/photo-1666931813427-0ae8f2b721c1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyfHx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=500&q=60" class="d-block w-100 b" alt="..." />
            </div>
            <div class="carousel-item a">
                <img src="https://images.unsplash.com/photo-1667086143544-0d951effbb84?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw0fHx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=500&q=60" class="d-block w-100 b" alt="..." />
            </div>
            <div class="carousel-item a">
                <img src="https://images.unsplash.com/photo-1667100801847-75d50daf3f25?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=60" class="d-block w-100 b" alt="..." />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div> -->

    <?php include_once 'footer.php'; ?>