<?php

require_once 'dbfunc.php';
require_once 'loginfunc.php';

$db = new DBFunc();
$user = new LoginFunc();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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

if (isset($_POST['delete_product'])) {
$product_id = $_POST['product_id'];

if ($db->delete($product_id)) {
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
if (isset($_POST['register'])) {
$email = $_POST['email'];
$uname = $_POST['uname'];
$nPassword = $_POST['password'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


if ($email == null || $uname == null || $password == null) {
$response = [
'status' => 422,
'message' => 'Please fill all the fields!',
];
echo json_encode($response);
return;
}

if ($user->register($email, $uname, $password)) {
$response = [
'status' => 200,
'message' => 'Register Success',
];
echo json_encode($response);
return;
} else {
$response = [
'status' => 500,
'message' => 'Register Not Success',
];
echo json_encode($response);
return;
}
}

if (isset($_POST['login'])) {
$uname = $_POST['uname'];
$password = $_POST['password'];

if ($uname == null || $password == null) {
$response = [
'status' => 422,
'message' => 'Please fill all the fields!',
];
echo json_encode($response);
return;
}

if ($user->login($uname, $password)) {
$response = [
'status' => 200,
'message' => 'Login Success',
];
echo json_encode($response);
return;
} else {
$response = [
'status' => 500,
'message' => 'Login Not Success',
];
echo json_encode($response);
return;
}
}

if (isset($_GET['logout'])) {
echo 'oi';
session_destroy();
header('location: ../index.php');
}