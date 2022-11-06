<?php
require 'dbconn.php';

if (isset($_POST['save_product'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
    $series = mysqli_real_escape_string($conn, $_POST['series']);
    $img_src = mysqli_real_escape_string($conn, $_POST['img-sources']);

    if ($title == NULL || $price == NULL || $qty == NULL || $series == NULL || $img_src == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Please fill all the fields!'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO products (`title`,price,qty,series,imgsource) VALUES ('$title','$price','$qty','$series', '$img_src')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Product Added Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Product Not Added'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET['product_id'])) {
    $product_id = mysqli_real_escape_string($conn, $_GET['product_id']);

    $query = "SELECT * FROM products WHERE id='$product_id'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $product = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Product Fetch Successfully by id',
            'data' => $product,
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Product Id Not Found',
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['update_product'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
    $series = mysqli_real_escape_string($conn, $_POST['series']);
    $img_src = mysqli_real_escape_string($conn, $_POST['img-sources']);

    if ($title == null || $price == null || $qty == null || $series == null || $img_src == null) {
        $res = [
            'status' => 422,
            'message' => 'Please fill all the fields!',
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE products SET `title` = '$title', price = '$price', qty = '$qty', series = '$series', imgsource = '$img_src' WHERE id = '$product_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Product Updated Successfully',
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Product Not Updated',
        ];
        echo json_encode($res);
        return;
    }
}


if (isset($_POST['delete_product'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);

    $query = "DELETE FROM products WHERE id = '$product_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Product Deleted Successfully',
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Product Not Deleted',
        ];
        echo json_encode($res);
        return;
    }

}

?>