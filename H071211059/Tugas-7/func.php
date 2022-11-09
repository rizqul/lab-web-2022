<?php

require_once 'dbfunc.php';

$db = new DBFunc();

if (isset($_POST['submit_product'])) {
    $code = $_POST['code'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $series = $_POST['series'];
    $prod_desc = $_POST['prod_desc'];
    $img_src = $_POST['img-sources'];

    if ($code == null || $title == null || $price == null || $qty == null || $series == null || $prod_desc == null || $img_src == null) {
        $response = [
            'status' => 422,
            'message' => 'Please fill all the fields!',
        ];
        echo json_encode($response);
        return;
    }

    if ($db->insert($code, $title, $price, $qty, $series, $prod_desc, $img_src)) {
        $response = [
            'status' => 200,
            'message' => 'Product Added Successfully',
        ];
        echo json_encode($response);
        return;
    } else {
        $response = [
            'status' => 500,
            'message' => 'Product Not Added',
        ];
        echo json_encode($response);
        return;
    }
}

if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];

    $product = $db->selectOne($id);

    $res = [
        'status' => 200,
        'message' => 'Product Fetch Successfully by id',
        'data' => json_encode($product),
    ];
    echo json_encode($res);

}

if (isset($_POST['edit_product'])) {
    $code = $_POST['code'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $series = $_POST['series'];
    $prod_desc = $_POST['prod_desc'];
    $img_src = $_POST['img-sources'];
    

    if ($code == null || $title == null || $price == null || $qty == null || $series == null || $prod_desc == null || $img_src == null) {
        $response = [
            'status' => 422,
            'message' => 'Please fill all the fields!',
        ];
        echo json_encode($response);
        return;
    }

    if ($db->update($code, $title, $price, $qty, $series, $prod_desc, $img_src)) {
        $response = [
            'status' => 200,
            'message' => 'Product Added Successfully',
        ];
        echo json_encode($response);
        return;
    } else {
        $response = [
            'status' => 500,
            'message' => 'Product Not Added',
        ];
        echo json_encode($response);
        return;
    }
}
