<?php
echo "<br><br>";
session_start();
if (isset($_POST['remove'])) {
    $food_id = intval($_POST['food_id']);
    unset($_SESSION['cart'][$food_id]);
    totalprice();
} elseif (isset($_POST['edit-btn'])) {
    $food_id = intval($_POST['food_id']);
    $quantity = $_POST['quantity'];
    $_SESSION['cart'][$food_id]['quantity'] = $quantity;
    totalprice();
} elseif (isset($_POST['single_btn'])) {
    $food_price = $_POST['food_price'];
    $food_name = $_POST['food_name'];
    $food_id = $_POST['food_id'];
    $image_url = $_POST['image_url'];
    $quantity = $_POST['quantity'];
    if (isset($_SESSION['cart'])) {
        if (isset($_SESSION['cart'][$food_id])) {
        } else {
            $_SESSION['cart'][$food_id] = array(
                'food_price' => $food_price,
                'food_name' => $food_name,
                'image_url' => $image_url,
                'quantity' => $quantity,
                'food_id' => $food_id,
                'status' => 'not paid yet',
            );
        }
    } else {
        $_SESSION['cart'][$food_id] = array(
            'food_price' => $food_price,
            'food_name' => $food_name,
            'image_url' => $image_url,
            'quantity' => $quantity,
            'status' => 'not paid yet',
            'food_id' => $food_id,
        );
    }
    totalprice();
} else {
}
function totalprice()
{
    $total_price = 0;
    $total_item = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $total_price += ($value['quantity'] * $value['food_price']);
        $total_item += intval($value['quantity']);
    }
    $_SESSION['total'] = $total_price;
    $_SESSION['quantity'] = $total_item;
}
?>

<?php include('../layout/header.php') ?>

<!-- cart  -->
<section id="cart" class="container-fluid mt-5 py-5">
    <div class="container mb-5">
        <h2 class="line mb-4">Your Cart </h2>
        <?php if (!empty($_SESSION['cart'])) { ?>
            <table class="w-100">
                <tr class="head">
                    <th>product</th>

                    <th>status</th>

                    <th>number</th>

                    <th>total</th>
                </tr>

                <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                    <tr>
                        <td class="mt-2">
                            <div class="first">
                                <img src="../images_food/<?php echo $value['image_url']; ?>" alt="" class="img-fluid" />
                                <div>
                                    <p><?php echo $value["food_name"]; ?></p>
                                    <h5>$<?php echo $value['food_price'] ?></h5>
                                    <form action="cart.php" method='post'>
                                        <input type="hidden" name="food_id" value="<?php echo $key ?>">
                                        <input type="submit" name="remove" class="remove btn-primary btn" value="remove" />
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p><?php echo $value['status'] ?></p>
                        </td>
                        <td>
                            <form action="cart.php" method="post">
                                <input type="quantity" name="quantity" value="<?php echo $value['quantity'] ?>" />
                                <input type="hidden" name="food_id" value="<?php echo $key ?>">
                                <button type="submit" name="edit-btn" value="edit" class="btn btn-dark">edit</button>
                            </form>
                        </td>
                        <td>$<?php echo $value['quantity'] * $value['food_price'] ?></td>
                    </tr>
                <?php } ?>
            </table>

            <div class="total">
                <div class="total-info">
                    <h5>Total:</h5>
                    <h5>$<?php echo $_SESSION['total'] ?></h5>
                </div>
                <form class="my-3" action="checkout.php" method="post">
                    <input type="hidden" name="total" value="<?php echo $_SESSION['total'] ?>">
                    <button type="submit" name='cart-checkout' value="checkout" class="checkout btn btn-dark">
                        Check out
                    </button>
                </form>
            <?php } else { ?>
                <h5>you have no item in the cart</h5>
            <?php } ?>
            </div>

    </div>
</section>
<!-- cart  end-->

<?php include('../layout/footer.php'); ?>