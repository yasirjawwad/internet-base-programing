<?php include('./adHeader.php') ?>

<?php

include('../server/config.php');
if (isset($_GET['admin_id']) && isset($_SESSION['admin_id'])) {
    $stmt = $conn->prepare("SELECT * FROM admins WHERE admin_id=? limit 1");
    $stmt->bind_param('i', $_GET['admin_id']);
    $stmt->execute();
    $admins = $stmt->get_result();
} elseif (isset($_POST['edit-order-btn']) && isset($_SESSION['admin_id'])) {
    // $FullName = $_POST['FullName'];
    $admin_id = $_POST['admin_id'];
    $status = $_POST['status'];

    $stmt1 = $conn->prepare("UPDATE admins set status=? where admin_id=? ");
    $stmt1->bind_param('si', $status, $admin_id);
    if ($stmt1->execute()) {
        header('location:admin.php?message=admin profile edited successfully');
    } else {
        header('location:admin.php?error=something went wrond please try again later');
    }
} else {
    header('location:admin.php?error=you need to choose one product to be able to edit');
}
?>


<div id="" class="my-5 py-5">
    <div class="row mx-auto">

        <div class="ecole col-sm-12 col-lg-6 col-md-6 mx-auto pb-3">
            <h3 class="text-center my-2">Admin edit your profile</h3>
            <form action="admin_edit.php" method="post">
                <input type="hidden" name="admin_id" value="<?php echo $_GET['admin_id'] ?>">
                <?php foreach ($admins as $admin) { ?>
                    <div class="form-group">
                        <label for="product-image">Name
                        </label>
                        <input type="text" class="form-control" id="product-name" name="status" value="<?php echo $admin['admin_name']; ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="product-image">Email
                        </label>
                        <input type="text" class="form-control" id="product-name" name="status" value="<?php echo $admin['admin_Email']; ?>" required />
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" name="edit-order-btn" value="edit" class="btn w-100 btn-primary">
                            Edit your profile
                        </button>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>



<?php
include('./adFooter.php'); ?>