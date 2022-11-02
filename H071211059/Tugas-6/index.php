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
                VALUES ('$title', '$price', '$desc', '$qty', '$series', '$img_sources');";
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

function theForm()
{
    return '<form method="POST" action="index.php" class="center mt-2 w-50 mx-auto" id="form">
            <div class="mb-2">
                <label for="title" class="form-label">Product Title</label>
                <input type="text" class="form-control add-form form-control-sm" id="title" name="title" placeholder="Enter product title" value="">
            </div>
            <div class="mb-2">
                <label for="price" class="form-label">Product Price</label>
                <input type="text" class="form-control add-form form-control-sm" id="price" name="price" placeholder="Enter product\'s price" value="">
            </div>
            <div class="mb-2">
                <label for="desc" class="form-label">Description</label>
                <textarea class="form-control add-form form-control-sm" id="desc" name="desc" placeholder="Enter product\'s description"></textarea>
            </div>
            <div class="mb-2">
                <label for="qty" class="form-label">Quantity</label>
                <input type="text" class="form-control add-form form-control-sm" id="qty" name="qty" placeholder="Enter product\'s quantity" value="">
            </div>
            <div class="mb-2">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control add-form form-control-sm" id="series" name="series" placeholder="Enter product\'s series" value="">
            </div>
            <div class="mb-2">
                <label for="img-source" class="form-label">Image Source</label>
                <input type="text" class="form-control add-form form-control-sm" id="img-source" name="img-source" placeholder="Enter product\'s image source" value="">
            </div>
            <div class="mt-3">
                <input type="submit" name="submit" value="Submit" class="btn btn-dark " id="submit">
                <input type="button" name="cancel" value="Cancel" class="btn btn-dark" id="cancel">
            </div>
        </form>';
}

function editFormValue($data)
{

    echo '<script>
            document.getElementById("title").value = "";
            document.getElementById("price").value = "";
            document.getElementById("desc").value = "";
            document.getElementById("qty").value = "";
            document.getElementById("series").value = "";
            document.getElementById("img-source").value = "";
            document.getElementById("submit").value = "Update";
        </script>';
}
?>

<div class="carousel-box" id="carousel-box">
</div>
<div class="container">
    <div class="center">
        <div class="ms-auto my-3">
            <button type="button" class="btn btn-primary mx-1" id="add-btn">Add</button>
            <button type="button" class="btn btn-secondary mx-1">Delete</button>
        </div>
    </div>

    <div id="add">
        <?php echo theForm() ?>
    </div>

    <div id="edit">
        <?php
        echo theForm();
        if (isset($_POST['editButton'])) {
            $data = mysqli_fetch_assoc($conn, 'SELECT * FROM projects WHERE id = ' . $_POST["edit"]);
            editFormValue($data);
        }
        ?>
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
                    <form action="" method="POST">
                        <th scope="row"><?php echo $item['id']; ?></th>
                        <td><?php echo $item['title']; ?></td>
                        <td><?php echo $item['price']; ?></td>
                        <td><?php echo $item['desc']; ?></td>
                        <td><?php echo $item['qty']; ?></td>
                        <td><?php echo $item['series']; ?></td>
                        <td><button type="button" class="btn btn-outline-success btn-sm" onclick="viewImages(<?php echo $item['id'] ?>)">Show Images</button></td>
                        <td><button type="button" class="btn btn-outline-success btn-sm" value="<?php echo $item['id'] ?>" id="editButton">Edit</button></td>
                        <td id="<?php echo $item['id'] ?>" class="product-images">
                            <div class="d-flex">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php
                                        $getImagesQuery = "SELECT * FROM image_source WHERE product_id = " . $item['id'];
                                        $getImages = mysqli_query($conn, $getImagesQuery);
                                        $images = mysqli_fetch_all($getImages, MYSQLI_ASSOC);
                                        ?>

                                        <?php foreach ($images as $item) : ?>
                                            <div class="carousel-item <?php if ($images[1] == $item) echo 'active' ?> image-container">
                                                <img src="<?php echo $item['source'] ?>" class="d-block w-100 image" alt="..." />
                                            </div>
                                        <?php endforeach ?>
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
                            </div>
                        </td>
                    </form>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>




    <?php include_once 'footer.php'; ?>