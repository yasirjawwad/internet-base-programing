<?php include('./adHeader.php') ?>

<?php

include('../server/config.php');
if (isset($_GET['order_id']) && isset($_SESSION['admin_id'])) {
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id=? limit 1");
    $stmt->bind_param('i', $_GET['order_id']);
    $stmt->execute();
    $orders = $stmt->get_result();
} elseif (isset($_POST['edit-order-btn']) && isset($_SESSION['admin_id'])) {
    // $FullName = $_POST['FullName'];
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $stmt1 = $conn->prepare("UPDATE orders set status=? where order_id=? ");
    $stmt1->bind_param('si', $status, $order_id);
    if ($stmt1->execute()) {
        header('location:order_management.php?message=order status edited successfully');
    } else {
        header('location:order_management.php?error=something went wrond please try again later');
    }
} else {
    header('location:order_management.php?error=you need to choose one product to be able to edit');
}
?>


<div id="" class="my-5 py-5">
    <div class="row mx-auto">

        <div class="ecole col-sm-12 col-lg-6 col-md-6 mx-auto pb-3">
            <h3 class="text-center my-2">Edit order Status</h3>
            <form action="sr_edit_order.php" method="post">
                <input type="hidden" name="order_id" value="<?php echo $_GET['order_id'] ?>">
                <?php foreach ($orders as $order) { ?>
                    <div class="form-group">
                        <label for="colorSelect">Select a status for the order:</label>
                        <select class="form-control" id="colorSelect" name="status">
                            <option value="not paid" <?php if ($order['status'] == 'not paid') echo 'selected'; ?>>not paid
                            </option>
                            <option value="paid" <?php if ($order['status'] == 'paid') echo 'selected'; ?>>paid</option>
                            <option value="cancelled" <?php if ($order['status'] == 'cancelled') echo 'selected'; ?>>
                                cancelled
                            </option>
                            <option value="delivered" <?php if ($order['status'] == 'delivered') echo 'selected'; ?>>
                                delivered
                            </option>
                        </select>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" name="edit-order-btn" value="edit" class="btn w-100 btn-primary">
                            Edit order status
                        </button>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>



<?php
include('./adFooter.php'); ?>