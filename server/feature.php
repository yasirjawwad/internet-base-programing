<?php
include('config.php');

$stmt = $conn->prepare("SELECT * FROM foods LIMIT 4");
$stmt->execute();
$feature_result = $stmt->get_result();
