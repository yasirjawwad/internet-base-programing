<?php
session_start();
include('./config.php');
if (isset($_GET['payment_id']) && isset($_SESSION['payment_food_id'])) {
    $food_id = intval($_SESSION['payment_food_id']);
    $payment_id = $_GET['payment_id'];
    $status = 'paid';
    $stmt = $conn->prepare("UPDATE ordered_food SET status='paid' where order_id=?");
    $stmt->bind_param('i', $food_id);
    $stmt1 = $conn->prepare("UPDATE orders SET status='paid' where order_id=?");
    $stmt1->bind_param('i', $food_id);
    if ($stmt->execute()) {
        $stmt1->execute();
        $stmt1 = $conn->prepare("INSERT INTO payment(payment_id,order_id) values(?,?)");
        $stmt1->bind_param('si', $payment_id, $food_id);
        $stmt1->execute();
        header('location:../FilesHtml/account.php?payment_message=Food has been paid successfully');
    } else {
        // if something went wrong
    }
}
