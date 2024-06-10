<?php
session_start();
include("./config.php");
if (isset($_POST['checkout-page-btn'])) {
    $name = $_POST['name'];
    $telephone = $_POST['telephone'];
    $user_id = intval($_SESSION['user_id']);
    $email = $_POST['email'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $total = $_SESSION['total'];
    $quantity = $_SESSION['quantity'];
    $status = 'not paid';
    $stmt = $conn->prepare('INSERT INTO orders (user_id,name,quantity,status,city,phone_number,adress,total_price) values(?,?,?,?,?,?,?,?)');
    $stmt->bind_param('isissssd', $user_id, $name, $quantity, $status, $city, $telephone, $address, $total);
    if ($stmt->execute()) {
        $order_id = $stmt->insert_id;
        $_SESSION['order_id'] = $order_id;
        foreach ($_SESSION['cart'] as $key => $value) {
            $food_id = $value['food_id'];
            $quantity = $value['quantity'];
            $image_url = $value['image_url'];
            $food_price = $value['food_price'];
            $status = 'not paid';
            $stmt1 = $conn->prepare('INSERT INTO ordered_food(food_id,quantity,status,user_id,order_id,image_url,food_price) values(?,?,?,?,?,?,?)');
            $stmt1->bind_param('iisiisd', $food_id, $quantity, $status, $user_id, $order_id, $image_url, $food_price);
            if ($stmt1->execute()) {
                // $_SESSION['order_id'] = $stmt1->insert_id;
                header('location:../FilesHtml/payment.php');
            } else {
                header('location:../FilesHtml/checkout.php? error=could not place the orders');
                exit();
            }
        }
    } else {
        header('location:../FilesHtml/cart.php? error=could not take the oreder');
    }
}