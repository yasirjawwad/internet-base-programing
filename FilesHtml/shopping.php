<?php session_start() ?>
<?php include('../layout/header.php');
include('../server/config.php');
if (isset($_GET['page_no'])) {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

$total_number_per_page = 10;
$offset = ($page_no - 1) * $total_number_per_page;
// calculate the numbre of total pages; we will need it to know where to stop on next
$stmt1 = $conn->prepare("SELECT COUNT(*) as total_number_of_items FROM foods");
$stmt1->execute();
$stmt1->bind_result($total_of_items);
$stmt1->store_result();
$stmt1->fetch();
$total_number_of_pages = ceil($total_of_items / $total_number_per_page);
$stmt = $conn->prepare("SELECT * FROM foods LIMIT $offset,$total_number_per_page");
$stmt->execute();
$foods = $stmt->get_result();
?>

<!-- btn container -->
<section id="btn" class="container pt-5 my-5">
    <!-- <i class="fas filter fa-filter"></i> -->
    <div class="search-food">
        <h2 class="line text-left mb-3">Our Foods</h2>
        <form id="searcher-form" action="">
            <div class="form-group d-flex dfl">

                <input id="searchInput" type="text" placeholder="search..." class="form-control">
                <i id="searchButton" class="fas fa-search"></i>

            </div>
            </article>
            <h5 class="my-2">Category:</h5>
            <div class="allcategory">
                <article id="category-search">
                    <div class="form-group">
                        <input value="all" class="form-check-input category" type="radio" name="category" checked>
                        <label class=" form-check-label" for="">ALL</label>
                    </div>
                    <div class="form-group">
                        <input value="breakfeast" class="form-check-input category" type="radio" name="category">
                        <label class=" form-check-label" for="">Breakfeast</label>
                    </div>
                    <div class="form-group">
                        <input value="dinner" class="form-check-input category" type="radio" name="category">
                        <label class=" form-check-label" for="">Dinner</label>
                    </div>
                    <div class="form-group">
                        <input value="lunch" class="form-check-input category" type="radio" name="category">
                        <label class=" form-check-label" for="">lunch</label>
                    </div>
                    <div class="form-group">
                        <input value="homemade" class="form-check-input category" type="radio" name="category">
                        <label class=" form-check-label" for="">homemade</label>
                    </div>

                </article>
            </div>
            <h5 class="my-2">Price:</h5>
            <article class="w-50">
                <input class="form-range price-range" type="range" name="" min="100" max="1000" id="">
                <h6 class="d-flex justify-content-between"><small class="text-left">100</small> <small class="text-right">1000</small>
                </h6>
            </article>
            <button type='submit' id="filter-btn" class="btn btn-dark px-4 rounded w-100">filter</button>
        </form>
    </div>

    <!-- btn container -->
    <!-- shpping part  -->
    <section class="conatiner-fluid my-5" id="feature">
        <div class="row mx-auto container text-center">
            <?php foreach ($foods as $food) { ?>
                <!-- item1 one -->
                <div class="items prod-sea col-lg-4 col-md-4 col-6 mb-2" data-id='<?= $food['category'] ?>'>
                    <div class="image-heart">
                        <img src="../images_food/<?php echo $food['image_url'] ?>" alt="" class="img-fluid" />
                        <i class="fa-solid fa-heart"></i>
                        <i class="fa-solid fa-thumbs-up"></i>
                    </div>
                    <div class="food-information my-1">
                        <div class="icons">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h5><?php echo $food['food_name'] ?></h5>
                        <h4>$<?php echo $food['food_price'] ?></h4>
                        <a href="./single.php?food_id=<?php echo $food['food_id'] ?>" class="btn btn-dark">order now</a>
                    </div>
                </div>
                <!-- item1 end -->
            <?php } ?>


        </div>
    </section>
</section>
<!-- shpping part  end-->

<!--  pagination part  -->
<!-- <div class="range w-50 my-5">
            <label for="rangeInput">Select a value:</label>
            <input
                type="range"
                class="form-range"
                id="rangeInput"
                min="0"
                max="100"
                value="50"
                w-50
            />
        </div> -->
<nav id="panignation" aria-label="page navigation example">
    <ul class="pagination mt-5">
        <li class="page-item">
            <a class="page-link
             <?php if ($page_no <= 1) {
                    echo "disabled";
                } else {
                    $page_no--;
                } ?>" href="./shopping.php?page_no=<?php echo $page_no ?>">prev</a>
        </li>
        <?php if ($page_no > 1) { ?>
            <li class="page-item">
                <a class="page-link" href="./shopping.php?page_no=<?php echo $page_no - 1 ?>">
                    <?php echo $page_no - 1; ?>
                </a>
            </li>
        <?php } else { ?>
            <li class="page-item">
                <a class="page-link" href="./shopping.php?page_no=<?php echo 1 ?>">1</a>
            </li>
        <?php } ?>
        <?php if ($page_no > 2) { ?>
            <li class="page-item">
                <a class="page-link" href="./shopping.php?page_no=<?php echo $page_no ?>">
                    <?php echo $page_no; ?>
                </a>
            </li>
        <?php } else { ?>
            <li class="page-item">
                <a class="page-link" href="./shopping.php?page_no=<?php echo 2 ?>">2</a>
            </li>
        <?php } ?>
        <?php if ($page_no >= $total_number_of_pages - 1) { ?>
            <li class="page-item">
                <a class="page-link disabled" href="#">next</a>
            </li>
        <?php } else { ?>
            <li class="page-item">
                <a class="page-link" href="?page_no=<?php echo (intval($page_no) + 2) ?>">next</a>
            </li>
        <?php } ?>
    </ul>
</nav>

<!--  pagination end  -->
<script src="../FilesJs/shopping.js"></script>
<?php include('../layout/footer.php') ?>