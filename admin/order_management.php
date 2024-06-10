<?php include('./adHeader.php'); ?>

<?php

// determine page number
include('../server/config.php');
if (isset($_GET['page_no']) && $_GET['page_no'] != '') {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}
// return number of products
$stmt1 = $conn->prepare('SELECT COUNT(*) as total_of_item from orders');
$stmt1->execute();
$stmt1->bind_result($total_records);
$stmt1->store_result();
$stmt1->fetch();
// 3-products per page

$total_record_per_page = 10;
$offset = ($page_no - 1) * $total_record_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;

$adjacents = "2";
$total_no_of_pages = ceil($total_records / $total_record_per_page);
// 4-get product
$stmt2 = $conn->prepare("SELECT * FROM orders LIMIT $offset,$total_record_per_page");
$stmt2->execute();
$orders = $stmt2->get_result();


?>

<div class="container my-5 py-5">
    <?php if (isset($_GET['message'])) { ?>
        <p class="text-center w-100 my-2 success"><?php echo $_GET['message'] ?></p>
    <?php } elseif (isset($_GET['error'])) { ?>
        <p class="text-center w-100  my-2 danger"><?php echo $_GET['error'] ?></p>
    <?php } ?>
    <h1 class="mb-4">Order Management</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Order Date</th>
                <th>Total Price</th>
                <th>Order Status</th>
                <th>Edit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) { ?>
                <tr>
                    <td><?php echo $order['order_id'] ?></td>
                    <td><?php echo $order['user_id'] ?></td>
                    <td><?php echo $order['ordered_at'] ?></td>
                    <td><?php echo $order['total_price'] ?></td>
                    <td>
                        <span class="badge <?php
                                            if ($order['status'] == 'delivered') {
                                                echo 'badge-success';
                                            } elseif ($order['status'] == 'paid') {
                                                echo 'badge-info';
                                            } elseif ($order['status'] == 'cancelled') {
                                                echo 'badge-danger';
                                            } else {
                                                echo 'badge-warning';
                                            }



                                            ?> "><?php echo $order['status'] ?></span>
                    </td>
                    <td>
                        <a href="./sr_edit_order.php?order_id=<?php echo $order['order_id'] ?>" class="btn btn-success btn-sm">Edit</a>
                    </td>
                    <td>
                        <a href="./sr_view_order.php?order_id=<?php echo $order['order_id']  ?>" class="btn btn-primary btn-sm">View</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <!-- <tr>
            <td>2</td>
            <td>Jane Smith</td>
            <td>2023-05-10</td>
            <td>$75.00</td>
            <td>
                <span class="badge badge-success">Shipped</span>
            </td>
            <td>
                <a href="#" class="btn btn-primary btn-sm">View</a>
            </td>
        </tr> -->
        <!-- <tr>
            <td>3</td>
            <td>Bob Johnson</td>
            <td>2023-05-09</td>
            <td>$100.00</td>
            <td>
                <span class="badge badge-danger">Cancelled</span>
            </td>
            <td>
                <a href="#" class="btn btn-primary btn-sm">View</a>
            </td>
        </tr> -->
    </table>
    <nav class="pag" area-label="page navigation example">
        <ul class="pagination">
            <li class="page-item <?php if ($page_no <= 1)
                                        echo 'disabled';
                                    ?>">
                <a href="<?php if ($page_no <= 1) {
                                echo '#';
                            } else {
                                echo "?page_no=" . ($page_no - 1);
                            } ?>" class="page-link">prev</a>
            </li>
            <li class="page-item">
                <a href="?page_no=1" class="page-link">1</a>
            </li>
            <li class="page-item">
                <a href="?page_no=2" class="page-link">2</a>
            </li>
            <?php if ($page_no >= 3) { ?>
                <li class="page-item">
                    <a href="#" class="page-link">...</a>
                    <a href="<?php echo "?page_no=" . $page_no ?>" class="page-link"><?php echo $page_no ?></a>
                </li>
            <?php } ?>

            <li class="page-item <?php if ($page_no >= $total_no_of_pages) echo "disabled"; ?>">
                <a href="<?php if ($page_no >= $total_no_of_pages) {
                                echo '#';
                            } else {
                                echo "?page_no=" . ($page_no + 1);
                            } ?>" class="page-link">next</a>
            </li>
        </ul>
    </nav>
</div>
<?php
include('./adFooter.php'); ?>