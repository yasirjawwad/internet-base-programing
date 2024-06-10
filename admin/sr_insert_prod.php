<?php
session_start();
include('../server/config.php');
if (isset($_POST['add-prod-btn']) && $_SESSION['admin_id']) {
    $food_name = $_POST['food_name'];
    $image_url = $_POST['image_url'];
    $food_price = $_POST['food_price'];
    $category = $_POST['category'];
    $image_url1 = $_POST['image_url1'];
    $image_url2 = $_POST['image_url2'];
    $image_url3 = $_POST['image_url3'];
    $description = $_POST['description'];
    $stmt = $conn->prepare("INSERT INTO foods (food_name,image_url,food_price,category,image_url1,image_url2,image_url3,description) values(?,?,?,?,?,?,?,?)");
    $stmt->bind_param('ssdsssss', $food_name, $image_url, $food_price, $category, $image_url1, $image_url2, $image_url3, $description);
    if ($stmt->execute()) {
        header('location:product_managment.php?message=New product added successfully');
    } else {
        header('location:product_managment.php?error=something went wrond please try again later');
    }
}