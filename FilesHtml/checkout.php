<?php session_start();
include('../server/config.php');
if (isset($_POST['cart-checkout']) && intval($_POST['total']) != 0) {
    $total_value =  $_POST['total'];

    $stmt = $conn->prepare('SELECT * FROM users where user_id=?');
    $stmt->bind_param('i', $_SESSION['user_id']);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
    }
} else {
    header('location:index.php');
}






?>
<?php include('../layout/header.php') ?>

<!-- register part -->

<section id="register" class="checkout my-5 py-5 container-fluid">
    <div class="my-form w-100 container">
        <div class="card mx-auto">
            <div class="card-header">
                <h4 class="card-title text-center line">CHECKOUT</h4>
            </div>
            <div class="card-body">
                <?php if (!isset($_SESSION['user_id'])) { ?>
                <p class="text-center danger mb-3">You need to loggin to place an order. <a href="./login.php">login</a>
                </p>
                <?php } ?>
                <form action="../server/place_order.php" method="POST">
                    <input type="hidden" name="user_id"
                        value="<?php if (isset($_SESSION['user_i'])) $_SESSION['user_id']; ?>">
                    <div class="form-group-part1 my-2">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name" required />
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="<?php if (isset($row) && !empty($row)) echo $row['email'] ?>"
                                placeholder="Enter your email" required />
                        </div>

                    </div>
                    <div class="form-group-part1 mb-2">
                        <div class="form-group">
                            <label for="telephone">Telefon</label>
                            <input type="tel" class="form-control" name="telephone" id="telephone"
                                placeholder="Enter phone number" required />
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter your City"
                                required />
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address"
                            placeholder="Enter phone address" required />
                    </div>
                    <div class="my-3">
                        <p>
                            Total Amount:
                            <span class="text-danger">$<?php echo $total_value ?></span>
                        </p>
                    </div>
                    <div class="form-group mb-2">
                        <?php if (isset($_SESSION['user_id'])) { ?>
                        <button type="submit" name="checkout-page-btn" value='checkout' class="btn btn-primary w-100 ">
                            CheckOut
                        </button>
                        <?php } else { ?>
                        <p class="btn btn-primary w-100">checkout</p>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- register end part -->

<?php include('../layout/footer.php') ?>