<?php
session_start();
include('../server/config.php');
if (isset($_GET['food_id']) && isset($_SESSION['admin_id'])) {
    $stmt = $conn->prepare('DELETE FROM foods where food_id=?');
    $stmt->bind_param('i', $_GET['food_id']);
    if ($stmt->execute()) {
        header('location:food_managment.php?message=Food deleted successfully');
    } else {
        header('location:food_managment.php?error=something went wrond please try again later');
    }
} else {
    header('location:food_managment.php?error=you need to select a food to deleted');
}
