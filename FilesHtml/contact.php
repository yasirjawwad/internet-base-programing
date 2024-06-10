<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <title>Contact Us - Food Delivery</title>
    <script src="https://kit.fontawesome.com/d4d6485b0b.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;800&family=Pacifico&family=Poppins:wght@100&family=Raleway:ital,wght@1,300&family=Roboto:wght@300;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../FilesCss/style.css?v=<?php echo time(); ?>">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background: #fff;
        }

        .contact-form {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            height: 55px;
            width: 100%;

            padding: 15px 15px 2px;


        }

        .form-group {
            position: relative;
        }

        input {
            width: 100%;
            height: 100%;
            border: 1px solid rgba(0, 0, 0, 0.1);

        }

        input::placeholder {
            color: rgba(0, 0, 0, 0.7);
            font-size: 15px;
            font-weight: 400;
            text-transform: capitalize;
        }

        .btn {
            background: #1e69f5;
            color: white;
            width: 100%;
            height: 45px;
            border: none;
            outline: none;
            font-size: 18px;
            border-radius: 10px;
        }

        label {
            color: black;
            position: absolute;
            left: 15px;
            top: 0;
            font-size: 16px;
            transform: translateY(20px);
            font-weight: 400;
            text-transform: capitalize;
            transition: 0.5s all;
        }

        textarea {
            padding-top: 25px !important;
        }

        textarea:valid+label,
        textarea:focus+label,
        input:valid+label,
        input:focus+label {
            transform: translateY(8px);
            font-size: 12px;
            color: gray;
        }
    </style>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand text-danger" href="#">Bech delevery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="contact-form">
                    <h2 class="text-center line mb-4">Contact Us</h2>
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="" required />
                            <label for="">Your Name</label>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="" required />
                            <label for="">Your Email</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="" required></textarea>

                            <label for="">Your Message</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn w-100 btn-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php include('../layout/footer.php'); ?>