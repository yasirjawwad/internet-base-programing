<?php

// determine page number
include('../server/config.php');
if (isset($_GET['page_no']) && $_GET['page_no'] != '') {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}
// return number of products
$stmt1 = $conn->prepare('SELECT COUNT(*) as total_of_item from users');
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
$stmt2 = $conn->prepare("SELECT * FROM users LIMIT $offset,$total_record_per_page");
$stmt2->execute();
$users = $stmt2->get_result();


?>


<?php include('./adHeader.php'); ?>

<div class="container my-5 py-5">
    <?php if (isset($_GET['message'])) { ?>
    <p class="text-center w-100 my-2 success"><?php echo $_GET['message'] ?></p>
    <?php } elseif (isset($_GET['error'])) { ?>
    <p class="text-center w-100  my-2 danger"><?php echo $_GET['error'] ?></p>
    <?php } ?>
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-5">Customer List</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo $user['user_id'] ?></td>
                        <td><?php echo $user['username'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td>
                            <a href="./sr_Edit_custo.php?user_id=<?php echo $user['user_id'] ?>"
                                class="btn btn-primary">
                                Edit
                            </a>
                            <a class="btn btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    <!-- <tr>
                        <td>2</td>
                        <td>Jane Doe</td>
                        <td>janedoe@example.com</td>
                        <td>
                            <button class="btn btn-primary">
                                Edit
                            </button>
                            <button class="btn btn-danger">
                                Delete
                            </button>
                        </td>
                    </tr> -->
                </tbody>
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
    </div>
</div>
<?php
include('./adFooter.php'); ?>