<?php
session_start();
include('../server/config.php');
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirm-password'];

    if ($password != $cpassword) {
        header("location:register.php?error=Passwords don't match!");
    } else if (strlen($password) < 6) {
        header("location:register.php?error=Password must be at least 6 characters.");
    } else {
        $stmt1 = $conn->prepare("SELECT * FROM users where email=?");
        $stmt1->bind_param('s', $email);
        $stmt1->execute();
        $result = $stmt1->get_result();
        if ($result->num_rows > 0) {
            header("location:register.php?error=User Already registered");
        } else {
            $stmt = $conn->prepare("INSERT INTO users(username,password,email) VALUES (?,?,?)");
            $stmt->bind_param("sss", $name, md5($password), $email);
            $stmt->execute();
            $user_id = $stmt->insert_id;
            $_SESSION['user_id'] = $user_id;
            header('location:account.php?message=Successfully Registered');
        }
    }
}
?>


<?php include('../layout/header.php') ?>;

<!-- register part -->

<section id="register" class="my-5 py-5 container-fluid">
    <div class="my-form w-100 container">
        <div class="card mx-auto">
            <div class="card-header">
                <h4 class="card-title text-center">REGISTRATION</h4>
            </div>
            <div class="card-body">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="text-center danger"><?php echo $_GET['error'] ?></p>
                <?php } ?>
                <form action="register.php" method="POST">
                    <div class="form-group mb-2">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your full name" required />
                    </div>

                    <div class="form-group mb-2">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address" required />
                    </div>

                    <div class="form-group mb-2">
                        <label for="password">password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter a password" required />
                    </div>

                    <div class="form-group mb-2">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Confirm your password" required />
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" class="" name="" required />
                        <span>Accept All Terms & Conditions</span>
                    </div>

                    <div class="form-group mb-2">
                        <button type="submit" name="register" value="register" class="btn btn-primary w-100 btn-block">
                            Register
                        </button>
                    </div>
                    <div class="form-group mb-2">
                        <p class="text-center">
                            ALready Have An Account?
                            <a href="./login.php">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- register end part -->

<?php include('../layout/footer.php') ?>;