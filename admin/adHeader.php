<?php
session_start();
if (!isset($_SESSION['admin_id']) || !$_SESSION['admin_logged_in'] == true) {
    header('location:login.php?error=admin you need to login');
    exit();
} ?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard | My Ecommerce Store</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../FilesCss/admin.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/d4d6485b0b.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar  navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand text-danger" href="#">Bech delevery</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./payment_process.php">Payment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./order_management.php">orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./product_managment.php">products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./custume_management.php">customers</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./admin.php">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./logout.php?logout=1">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>