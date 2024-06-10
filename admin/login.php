<?php
session_start();

include('../server/config.php');
if (isset($_SESSION['admin_logged_in'])) {
    // header('location:admin.php');
    // exit;
}
if (isset($_POST['signin-btn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $stmt = $conn->prepare('SELECT admin_id,admin_name,admin_email from admins WHERE admin_email=? AND admin_password=?');
    $stmt->bind_param('ss', $email, $password);
    if ($stmt->execute()) {
        $stmt->bind_result($admin_id, $admin_name, $admin_email);
        $stmt->store_result();
        if ($stmt->num_rows() == 1) {
            $stmt->fetch();
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_name'] = $admin_name;
            $_SESSION['admin_email'] = $admin_email;
            $_SESSION['admin_logged_in'] = true;
            header('location:admin.php?login_success=logged in successfully');
        } else {
            header('location:login.php?error=please verify your email and password');
        }
    } else {
        header('location:login.php?error=somthing went wrong try again');
    }
}



?>




<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard | My Ecommerce Store</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../FilesCss/admin.css" />
    <link rel="stylesheet" type="text/css" href="../FilesCss/style.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/d4d6485b0b.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand text-danger" href="#">Bech delevery</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container my-2">
        <div class="row justify-content-center">
            <div class="mx-auto row mt-5 w-100">
                <div class="main col-lg-5 col-md-7 col-sm-10  py-2 mx-auto">
                    <div class="header">
                        <h4 class="text-center">Admin</h4>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_GET['error'])) { ?>
                        <p class="text-center text-white bg-danger">
                            <?php echo $_GET['error']; ?></p>
                        <?php } ?>
                        <form action="login.php" method="post">
                            <div class="mb-2">
                                <label for="email" class="form-label"><strong>Email</strong></label>
                                <input type="email" class="form-control" id="email" name="email" required />
                            </div>
                            <div class="mb-2">
                                <label for="password" class="form-label"><strong>Password</strong></label>
                                <input type="password" class="form-control" id="password" name="password" required />
                            </div>

                            <button type="submit" name="signin-btn" value="signin-btn" class="btn btn-dark mt-3 w-100">
                                login
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->



    <?php
    include('./adFooter.php'); ?>