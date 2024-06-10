<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

    <script src="https://kit.fontawesome.com/d4d6485b0b.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;800&family=Pacifico&family=Poppins:wght@100&family=Raleway:ital,wght@1,300&family=Roboto:wght@300;500&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../FilesCss/style.css?v=<?php echo time(); ?>">

    <title>Document</title>
</head>

<body>
    <!-- begining of the navbar -->

    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand text-danger" href="#">Bech delevery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="nav-container collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="../FilesHtml/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../FilesHtml/shopping.php
                        ">All foods</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact.php">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../FilesHtml/cart.php"><i class="fa-solid fa-shopping-bag">
                                <?php if (isset($_SESSION['quantity'])) { ?>
                                <span class="cart-quantity"><?php echo $_SESSION['quantity'] ?></span>
                                <?php } ?>
                            </i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../FilesHtml/account.php"><i class="fa-solid fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of the navbar -->