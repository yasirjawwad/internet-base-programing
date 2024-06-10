<?php include('./adHeader.php') ?>

<?php

include('../server/config.php');
if (isset($_GET['user_id']) && isset($_SESSION['admin_id'])) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id=? limit 1");
    $stmt->bind_param('i', $_GET['user_id']);
    $stmt->execute();
    $users = $stmt->get_result();
} elseif (isset($_POST['edit-cust-btn']) && isset($_SESSION['admin_id'])) {
    $username = $_POST['username'];
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];



    $stmt1 = $conn->prepare("UPDATE users set username=?,email=? where user_id=? ");
    $stmt1->bind_param('ssi', $username, $email, $user_id);
    if ($stmt1->execute()) {
        header('location:custume_management.php?message=Customer Info edited successfully');
    } else {
        header('location:custume_management.php?error=something went wrond please try again later');
    }
} else {
    header('location:custume_management.php?error=you need to choose one product to be able to edit');
}
?>


<div id="" class="my-5 py-5">
    <div class="row mx-auto">

        <div class="ecole col-sm-12 col-lg-6 col-md-6 mx-auto pb-3">
            <h3 class="text-center my-2">Edit customer</h3>
            <form action="sr_Edit_custo.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $_GET['user_id'] ?>">
                <?php foreach ($users as $user) { ?>
                <div class="form-group">
                    <label for="product-name">Full Name</label>
                    <input type="text" class="form-control" id="product-name" name="username"
                        value="<?php echo $user['username']; ?>" required />
                </div>
                <div class="form-group">
                    <label for="product-image">Email
                    </label>
                    <input type="text" class="form-control" id="product-name" name="email"
                        value="<?php echo $user['email']; ?>" required />
                </div>
                <div class="form-group mt-4">
                    <button type="submit" name="edit-cust-btn" value="edit" class="btn w-100 btn-primary">
                        Edit customer info
                    </button>
                </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>



<?php
include('./adFooter.php'); ?>