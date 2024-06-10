<?php include('./adHeader.php'); ?>
<?php

if (!isset($_SESSION['admin_id'])) {
    header("location:login.php?error=You need to login");
} else {
}

?>


<div class="container my-5 py-5">
    <h1>Admin Profile</h1>
    <div class="row my-4">
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="https://via.placeholder.com/150" alt="Admin Avatar" />
                <div class="card-body text-left">
                    <h5 class="card-title">Admin name:
                    </h5>
                    <h5><span class="text-primary"><?php echo $_SESSION['admin_name'] ?></span></h5>
                    <h5 class="card-text">Email :
                    </h5>
                    <h5><span class="text-primary"><?php echo $_SESSION['admin_email'] ?></span></h5>
                    <a href="./admin_edit.php?admin_id=?<?php echo $_SESSION['admin_id'] ?>"
                        class="btn btn-primary">Edit
                        Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <?php if (isset($_GET['login_success'])) { ?>
            <p class="text-center my-3 success"><?php echo $_GET['login_success'] ?></p>
            <?php } ?>
            <h3>Update Password</h3>
            <form>
                <div class="form-group">
                    <label for="current-password">Current Password</label>
                    <input type="password" class="form-control" id="current-password" required />
                </div>
                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="password" class="form-control" id="new-password" required />
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirm-password" required />
                </div>
                <button type="submit" class="btn my-4 btn-primary">
                    Update Password
                </button>
            </form>
        </div>
    </div>
</div>
<?php
include('./adFooter.php'); ?>