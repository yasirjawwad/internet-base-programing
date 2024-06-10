<?php
include("../server/config.php");
if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];
    $stmt = $conn->prepare('SELECT * FROM foods where food_id=?');
    $stmt->bind_param('i', $food_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt1 = $conn->prepare('SELECT * FROM comments where food_id=?');
    $stmt1->bind_param('i', $food_id);
    $stmt1->execute();
    $comment = $stmt1->get_result();
}
?>

<?php include('../layout/header.php'); ?>

<section id="single-item" class="container-fluid py-5 my-5">
    <div class="row px-5 my-2 container">
        <div class="col-lg-6 col-md-12 sm-12">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <img src="../images_food/<?php echo $row['image_url'] ?>" alt="" class="img-fluid big-image" />
                <div class="small-images">
                    <img src="../images_food/<?php echo $row['image_url'] ?>" alt="" class="img-fluid small-img" />
                    <img src="../images_food/<?php echo $row['image_url1'] ?>" alt="" class="img-fluid small-img" />
                    <img src="../images_food/<?php echo $row['image_url2'] ?>" alt="" class="img-fluid small-img" />
                    <img src="../images_food/<?php echo $row['image_url3'] ?>" alt="" class="img-fluid small-img" />
                </div>
        </div>
        <div class="food-detail col-lg-6 col-md-12 col-sm-12">
            <h6 class="mb-4"><?php echo $row['category'] ?></h6>
            <h2 class="text-uppercase mb-3"><?php echo $row['food_name'] ?></h2>
            <h4 class="text-danger">$<?php echo $row['food_price'] ?></h4>
            <form action="./cart.php" method="post">
                <input type="hidden" name="image_url" value="<?php echo $row['image_url'] ?>">
                <input type="hidden" name="food_price" value="<?php echo $row['food_price'] ?>">
                <input type="hidden" name="food_name" value="<?php echo $row['food_name'] ?>">
                <input type="hidden" name="food_id" value="<?php echo $row['food_id'] ?>">

                <input type="number" name="quantity" value="1" />
                <button type='submit' name="single_btn" value="order_now" class="btn btn-dark">order now</button>
            </form>
            <h3 class="mt-5">Food Details</h3>
            <p>
                <?php echo $row['description'] ?>
            </p>
        </div>
    <?php } ?>
    </div>
</section>

<section class="comments container-fluid">
    <div class="container">
        <div class="row ">

            <div class="col-lg-6 col-md-9 col-sm-12 ">
                <h3 class="mb-4">Food comments (<span><?= ($comment->num_rows) ?></span>):</h3>
                <?php while ($row = $comment->fetch_assoc()) { ?>
                    <div class="person">
                        <h4 class="name">
                            @<?= substr($row['username'], 0, 3) . str_repeat('*', strlen($row['username']) - 5) . substr($row['username'], 8, strlen($row['username'])); ?>
                        </h4>
                        <p><?= $row['comment'] ?></p>
                        <div>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span class="comment-date"><?= $formattedDate = date("F d, Y", strtotime($row['Date'])); ?></span>
                        </div>
                    </div>

                <?php } ?>
            </div>
            <div class="  col-lg-6 col-md-9 col-sm-12">
                <!-- indirim partt-->
                <section id="indirim" class="w-100 h-100 mb-5">
                    <div class="container indirim">
                        <p class="text-danger">MID SAISON SALES</p>
                        <h1>
                            AUTOMN COLLECTION <br />
                            UP TO 30% OFF
                        </h1>
                        <button class="btn btn-danger py-2 px-5">order now</button>
                    </div>
                </section>
                <!-- indirim part end-->
            </div>
</section>

<script>
    const bigImage = document.querySelector(".big-image");
    const smallImage = [...document.getElementsByClassName("small-img")];
    smallImage.forEach((element) => {
        element.addEventListener("click", (e) => {
            bigImage.src = `${e.target.src}`;
        });
    });
</script>
<?php include('../layout/footer.php'); ?>