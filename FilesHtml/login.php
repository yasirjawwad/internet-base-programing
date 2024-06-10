<?php
session_start();
include('../server/config.php');
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pasword = $_POST['password'];
    $stmt = $conn->prepare('SELECT * FROM users where email=? AND password= ?');
    $stmt->bind_param('ss', $email, md5($pasword));
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];
            header('location:account.php?message=Logged in succesfully');
        } else {
            header('location:login.php?error=Incorrect email or password');
            exit;
        }
    } else {
        header('location:login.php?error=Could get the login try again later');
        exit;
    }
}

?>

<?php include("../layout/header.php");  ?>
<!-- register part -->

<section id="register" class="my-5 py-5 container-fluid">
    <div class="my-form w-100 container">
        <div class="card mx-auto">
            <div class="card-header">
                <h4 class="card-title text-center line">LOGIN</h4>
            </div>
            <div class="card-body">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="text-center danger"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <form action="login.php" method="POST">
                    <div class="form-group mb-2">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address" required />
                    </div>

                    <div class="form-group mb-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required />
                    </div>

                    <div class="my-3">
                        <input type="checkbox" class="" name="" />
                        <span>Remember Me</span>
                    </div>

                    <div class="form-group mb-2">
                        <button type="submit" name="login" value="login" class="btn btn-primary w-100 btn-block">
                            login
                        </button>
                    </div>
                    <div class="form-group mt-3">
                        <p class="text-center">
                            Don't An Account Yet ?
                            <a href="./register.php"> Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- register end part -->

<?php include("../layout/footer.php");  ?>