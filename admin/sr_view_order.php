<?php include('./adHeader.php') ?>




<?php

include('../server/config.php');
if (isset($_GET['order_id']) && isset($_SESSION['admin_id'])) {
    $stmt = $conn->prepare("SELECT * FROM ordered_food WHERE order_id=?");
    $stmt->bind_param('i', $_GET['order_id']);
    $stmt->execute();
    $orders = $stmt->get_result();
} elseif (isset($_POST[''])) {
} else {
    header('location:order_management.php?error=you need to choose one product to be able to edit');
}
?>



<div class="container my-5 py-5">
    <a href="./order_management.php" class="btn btn-info"><i class="fa-solid fa-circle-chevron-left"></i> Go back</a>
    <h1 class="mb-4">view order details</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Order food ID</th>
                <th>product img</th>
                <th>product id</th>
                <th>Price</th>
                <th>quantity</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) { ?>
                <tr>
                    <td><?php echo $order['ordered_food_id'] ?></td>
                    <td>
                        <img src="../images_food/<?php echo $order['image_url'] ?>" width="50px" height="50px" class="img-fluid admin_images" alt="">

                    </td>
                    <td><?php echo $order['food_id'] ?></td>

                    <td><?php echo $order['food_price'] ?></td>
                    <td><?php echo $order['quantity'] ?></td>
                    <td>
                        <a href="./sr_edit_order.php?order_id=<?php echo $order['order_id'] ?>" class="btn btn-success btn-sm">Edit</a>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
include('./adFooter.php'); ?>