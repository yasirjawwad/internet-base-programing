<?php
session_start();
include("../server/config.php");
if (!isset($_SESSION['user_id'])) {
    header('location:login.php? error=you need to login');
} else {
    //   getting the user information
    $user_id = $_SESSION['user_id'];
    $stmt1 = $conn->prepare('SELECT * FROM users WHERE user_id = ?');
    $stmt1->bind_param('i', $user_id);
    $stmt1->execute();
    $resul = $stmt1->get_result();
    // get all accout orders
    $user_id = $_SESSION['user_id'];
    $stmt2 = $conn->prepare('SELECT * FROM orders WHERE user_id = ?');
    $stmt2->bind_param('i', $user_id);
    $stmt2->execute();
    $all_order = $stmt2->get_result();



    // if user did logout
    if (isset($_POST['logout'])) {
        unset($_SESSION['user_id']);
        header('location:login.php');
        // if user want to change his password
    } else if (isset($_POST['update-password'])) {
        $password = $_POST['password'];
        $cpassword = $_POST['confirm-password'];

        if ($password != $cpassword) {
            header("location:account.php?error=Passwords don't match!");
        } else if (strlen($password) < 6) {
            header("location:account.php?error=Password must be at least 6 characters.");
        } else {
            $stmt = $conn->prepare("UPDATE users SET password=? WHERE user_id=? ");
            $stmt->bind_param("si", md5($password), $_SESSION['user_id']);
            if ($stmt->execute()) {

                header('location:account.php?message_updated=password update successfully');
            } else {
                header('location:account.php?error=Not updated try again later');
            }
        }
    }
}
?>

<?php include('../layout/header.php') ?>;
<!-- account part -->

<section id="account" class="container-fluid my-5 py-5">
    <?php if (isset($_GET['payment_message'])) { ?>
    <p class="text-primary text-center  w-5 mx-auto success"><strong>
            <?php echo $_GET['payment_message'] ?>
        </strong></p>
    <?php } ?>
    <?php if (isset($_GET['message'])) { ?>
    <p class="text-primary text-center  w-5 mx-auto success"><strong>
            <?php echo $_GET['message'] ?>
        </strong></p>
    <?php } ?>
    <h2 class="text-center line">Account</h2>
    <div class="row mx-auto py-3 container my-3">
        <div class="col text-center col-lg-6 mx-auto col-md-6 col-sm-12 mb-3">
            <p class="text-primary"><strong>WELCOME again !</strong></p>
            <div class="profile">
                <img src="../images_food/banner4.jpg" alt="" class="profile img-fluid">
                <div>
                    <?php while ($row = $resul->fetch_assoc()) { ?>

                    <p>Name: <strong><?php echo $row['username'];
                                            $_SESSION['username'] = $row['username'] ?></strong>
                    </p>
                    <p>Email: <strong><?php echo $row['email'] ?></strong></p>
                    <form action="account.php" method="post">
                        <button type="submit" name="logout" value="logout"
                            class="btn btn-primary my-2 logout btn-block">
                            <i class="fa-solid fa-right-from-bracket"></i> logout
                        </button>
                    </form>
                    <?php } ?>
                </div>
            </div>

        </div>
        <div id="change-password" class="col-lg-6 mx-auto col-md-6 col-sm-12 mb-3">
            <h4 class="mb-2 text-center">Change your password</h4>
            <form action="account.php" method="post">
                <?php if (isset($_GET['error'])) { ?>
                <p class=" text-center danger"><?php echo $_GET['error'] ?></p>
                <?php } elseif (isset($_GET['message_updated'])) { ?>
                <p class="text-center success"><?php echo $_GET['message_updated'] ?></p>
                <?php } ?>
                <div class="form-group mb-2">
                    <label for="password">password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Enter a password" required />
                </div>

                <div class="form-group mb-2">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm-password" id="confirm-password"
                        placeholder="Confirm your password" required />
                </div>
                <div class="form-groun my-2">

                    <button type=" submit" name="update-password" value="update"
                        class="btn btn-primary w-100 btn-block">
                        update
                    </button>

                </div>
            </form>
        </div>
    </div>
    <h2 class="text-center line my-3">YOUR Orders</h2>
    <div class="container my-3">
        <table class="w-100 table table-striped">
            <tr class="head">
                <th>Order id</th>
                <th>cost</th>
                <th>status</th>
                <th>date</th>
                <th>details</th>
            </tr>
            <?php if ($all_order->num_rows > 0) { ?>
            <?php while ($row = $all_order->fetch_assoc()) { ?>
            <tr>
                <td class="mt-2">
                    <p><?php echo $row['order_id'] ?></p>
                </td>
                <td class="mt-2">
                    <p><?php echo $row['total_price'] ?></p>
                </td>
                <td>
                    <p class=" px-2 badge <?php
                                                    if ($row['status'] == 'paid') {
                                                        echo 'primary';
                                                    } elseif ($row['status'] == 'delivered') {
                                                        echo 'success';
                                                    }
                                                    if ($row['status'] == 'not paid') {
                                                        echo 'danger';
                                                    }
                                                    ?>"><?php echo $row['status'] ?></p>
                </td>

                <td><?php echo $row['ordered_at'] ?></td>
                <td>
                    <form action="../server/order_detail.php" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $row['order_id'] ?>">
                        <input type="hidden" name="status" value="<?php echo $row['status'] ?>">
                        <input type="hidden" name="total_price" value="<?php echo $row['total_price'] ?>">

                        <!-- <input type="hidden" name="total_price" value=""> -->
                        <!-- <input type="hidden" name="order_id" value=""> -->
                        <button type="submit" name="see-detail-btn" value="see-detail" class="btn btn-dark detail">
                            detail
                        </button>
                    </form>
                </td>
            </tr>
            <?php } ?>
            <?php } ?>
        </table>
    </div>
</section>

<!-- account part -->

<?php include('../layout/footer.php') ?>