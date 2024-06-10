<?php
session_start();
include('./config.php');
if (isset($_POST['comments'])) {
    $dateString = date("Y-m-d");
    $order_id = $_POST['order_id'];
    $username = $_POST['username'];
    $comment = $_POST['comment'];
    echo $order_id;
    echo $comment;
    echo $username;
    echo $order_id;
    $stmt = $conn->prepare('SELECT food_id FROM ordered_food WHERE order_id = ?');
    $stmt->bind_param('i', $order_id);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_array()) {
            $conn1 = $conn->prepare("INSERT INTO comments (food_id,username,comment,Date) VALUES(?,?,?,?)");
            $conn1->bind_param('isss', $row['food_id'], $username, $comment, $dateString);
            if (!$conn1->execute()) {
                header('location:../FilesHtml/account.php?error=comment didnt not inserted');
            };
        }
        header('location:../FilesHtml/account.php?message=comment added successfully');
    } else {
        echo 'errpr';
    }
} else {
    echo "is not set";
}
