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
?>