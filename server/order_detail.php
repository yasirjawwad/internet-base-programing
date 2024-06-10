<?php

use LDAP\Result;

session_start();
include("./config.php");
if (isset($_POST['see-detail-btn'])) {
    // $image_url = $_POST['image_url'];
    // $status = $_POST['status'];
    // $quantity = $_POST['quantity'];
    // $order_id = $_POST['order_id'];
    // $food_price = $_POST['food_price'];
    // $image_url = $_POST['image_url'];
    // $ordered_at = $_POST['ordered_at'];
    // $total_price = $quantity * $food_price;
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    $total_price = $_POST['total_price'];
    $stmt = $conn->prepare('SELECT * FROM ordered_food WHERE order_id = ?');
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    header('location:../FilesHtml/account.php');
}

?>

<?php include('../layout/header.php') ?>;
<!-- account part -->
<section id="account" class="container-fluid my-5 py-5">

    <h2 class="text-center line my-3">Order details</h2>
    <div class="container text-end">
        <button class="btn btn-dark comment-btn addnew-btn">how was it!</button>
    </div>
    <div class="container my-3">
        <table class="w-100 table-striped">
            <tr class="head">
                <th>product</th>
                <th>status</th>
                <th>price</th>
                <th>quantity</th>
                <th>date</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>

                <td class="mt-2">
                    <div class="first">
                        <img src="../images_food/<?php echo $row['image_url'] ?>" alt="" class="img-fluid" />
                    </div>
                </td>
                <td>
                    <p class=" "><?php echo $row['status'] ?></p>
                </td>
                <td>
                    <h5>$<?php echo $row['food_price'] ?></h5>
                </td>
                <td><?php echo $row['ordered_at'] ?></td>
                <td>
                    <h5><?php echo $row['quantity'] ?></h5>
                </td>


            </tr>
            <?php } ?>
        </table>
        <?php if ($status == 'not paid') { ?>
        <div class="my-2 w-100 paynowContainer">
            <form action="../FilesHtml/payment.php" method="post">
                <input type="hidden" name='total' value="<?php echo $total_price ?>">
                <input type="hidden" name='order_id' value="<?php echo $order_id ?>">
                <button type="submit" name="detail-paynow-btn" class="btn btn-dark detail">
                    pay now
                </button>
            </form>
        </div>
        <?php } ?>
    </div>


</section>

<!-- add items -->
<section class='add' style="position: relative;">
    <div id="addItem" class="addItem">
        <div class="row mx-auto">
            <i class="fa-solid close-btn fa-times"></i>
            <div class="ecole col-sm-12 col-lg-6 col-md-6 mx-auto pb-3">
                <h3 class="text-center my-2">Commentaire</h3>
                <form action="./comments.php" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="username"
                            value="<?= $_SESSION['username']; ?>" />
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="order_id" value='<?= $order_id; ?>' />
                    </div>
                    <textarea class="form-control" rows="3" name="comment" placeholder="Type your comment here:"
                        maxlength="100"></textarea>
                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <div class="rating-stars">
                            <input type="radio" name="rating" id="star5" value="5" class="d-none">
                            <label for="star5" class="star-icon"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating" id="star4" value="4" class="d-none">
                            <label for="star4" class="star-icon"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating" id="star3" value="3" class="d-none">
                            <label for="star3" class="star-icon"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating" id="star2" value="2" class="d-none">
                            <label for="star2" class="star-icon"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating" id="star1" value="1" class="d-none">
                            <label for="star1" class="star-icon"><i class="fas fa-star"></i></label>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" name="comments" value="1" class="btn w-100 btn-primary">
                            finish
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- account part -->



<script>
const close = document.querySelector(".close-btn ");
const addNewItem = document.querySelector(".addnew-btn");
const addItem = document.getElementById("addItem");
addNewItem.addEventListener("click", () => {
    addItem.style.display = "block";
});

close.addEventListener("click", () => {
    addItem.style.display = "none";
});
</script>

<?php include('../layout/footer.php') ?>;