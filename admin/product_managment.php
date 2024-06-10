<?php include('./adHeader.php') ?>

<?php

// determine page number
include('../server/config.php');
if (isset($_GET['page_no']) && $_GET['page_no'] != '') {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}
// return number of foods
$stmt1 = $conn->prepare('SELECT COUNT(*) as total_of_item from foods');
$stmt1->execute();
$stmt1->bind_result($total_records);
$stmt1->store_result();
$stmt1->fetch();
// 3-foods per page

$total_record_per_page = 10;
$offset = ($page_no - 1) * $total_record_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;

$adjacents = "2";
$total_no_of_pages = ceil($total_records / $total_record_per_page);
// 4-get food
$stmt2 = $conn->prepare("SELECT * FROM foods LIMIT $offset,$total_record_per_page");
$stmt2->execute();
$foods = $stmt2->get_result();


?>



<section class="food container-fluid">

    <div class="container my-5 py-5">
        <?php if (isset($_GET['message'])) { ?>
            <p class="text-center w-100 my-2 success"><?php echo $_GET['message'] ?></p>
        <?php } elseif (isset($_GET['error'])) { ?>
            <p class="text-center w-100  my-2 danger"><?php echo $_GET['error'] ?></p>
        <?php } ?>
        <div class="row w-100">
            <div class="col-12">

                <h2>Food List</h2>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($foods as $food) { ?>
                            <tr>
                                <td><?php echo $food['food_id'] ?></td>
                                <td>
                                    <img src="../images_food/<?php echo $food['image_url'] ?>" width="50px" height="50px" class="img-fluid admin_images" alt="">

                                </td>
                                <td><?php echo $food['food_name'] ?></td>
                                <td>Description A</td>
                                <td>$<?php echo $food['food_price'] ?></td>
                                <td>
                                    <a href="./sr_Edit_prod.php?food_id=<?php echo $food['food_id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="./sr_delete_prod.php?food_id=<?php echo $food['food_id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                        <!-- <tr>
                            <td>2</td>
                            <td>food B</td>
                            <td>Description B</td>
                            <td>$20.00</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr> -->

                        <div class="add-new my-3">
                            <button class="btn addnew-btn btn-success">
                                <i class="fa-solid fa-plus"></i> add new
                                food
                            </button>
                        </div>
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
    <!--  -->
    <hr />
    <!-- popup add food -->
    <div id="addItem" class="addItem">
        <div class="row mx-auto">
            <i class="fa-solid close-btn fa-times"></i>
            <div class="ecole col-sm-12 col-lg-6 col-md-6 mx-auto pb-3">
                <h3 class="text-center my-2">Add new food</h3>
                <form action="./sr_insert_prod.php" method="post">
                    <div class="form-group">
                        <label for="food-name">food Name</label>
                        <input type="text" class="form-control" id="food-name" name="food_name" placeholder="Enter food name" required />
                    </div>
                    <div class="form-group">
                        <label for="food-image">Food Image
                        </label>
                        <input type="text" class="form-control" id="food-name" name="image_url" placeholder="Enter food image" required />
                    </div>

                    <div class="form-group">
                        <label for="food-price">Price ($)</label>
                        <input type="number" class="form-control" id="food-price" name="food_price" placeholder="Enter food price" required />
                    </div>
                    <div class="form-group">
                        <label for="food-price">category</label>
                        <input type="text" class="form-control" id="food-price" name="category" placeholder="Enter food category" required />
                    </div>

                    <div class="form-group">
                        <label for="food-price">related img1</label>
                        <input type="text
                        " class="form-control" id="food-price" name="image_url1" placeholder="Enter image1" required />
                    </div>
                    <div class="form-group">
                        <label for="food-price">related img2</label>
                        <input type="text" class="form-control" id="food-price" name="image_url2" placeholder="Enter image2" required />
                    </div>
                    <div class="form-group">
                        <label for="food-price">related img3</label>
                        <input type="text" class="form-control" id="food-price" name="image_url3" placeholder="Enter image3" required />
                    </div>

                    <label for="food-description">Description</label>
                    <textarea class="form-control" id="food-description" rows="3" name="description" placeholder="Enter food description"></textarea>

                    <div class="form-group mt-4">
                        <button type="submit" name="add-prod-btn" value="add" class="btn w-100 btn-primary">
                            Add food
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- <hr /> -->

<script>
    const addnewItem = document.querySelector(".addnew-btn ");
    const close = document.querySelector(".close-btn ");
    const addNewItem = document.querySelector(".addnew-btn ");
    const addItem = document.getElementById("addItem");
    addNewItem.addEventListener("click", () => {
        addItem.style.display = "block";
    });

    close.addEventListener("click", () => {
        addItem.style.display = "none";
    });
</script>


<?php
include('./adFooter.php'); ?>