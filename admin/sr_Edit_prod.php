<?php include('./adHeader.php') ?>

<?php
include('../server/config.php');
if (isset($_GET['food_id'])) {
    $stmt = $conn->prepare("SELECT * FROM foods WHERE food_id=? limit 1");
    $stmt->bind_param('i', $_GET['food_id']);
    $stmt->execute();
    $foods = $stmt->get_result();
} elseif (isset($_POST['edit-prod-btn']) && isset($_SESSION['admin_id'])) {
    $food_name = $_POST['food_name'];
    $food_id = $_POST['food_id'];
    $image_url = $_POST['image_url'];
    $food_price = $_POST['food_price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image_url1 = $_POST['image_url1'];
    $image_url2 = $_POST['image_url2'];
    $image_url3 = $_POST['image_url3'];


    $stmt1 = $conn->prepare("UPDATE foods set food_name=?,food_price=?,category=?,image_url=?,image_url1=?,image_url2=?,image_url3=?, description=? where food_id=? ");
    $stmt1->bind_param('sdssssssi', $food_name, $food_price, $category, $image_url, $image_url1, $image_url2, $image_url3, $description, $food_id);
    if ($stmt1->execute()) {
        header('location:product_managment.php?message=food edited successfully');
    } else {
        header('location:product_managment.php?error=something went wrond please try again later');
    }
} else {
    header('location:product_managment.php?error=you need to choose one food to be able to edit');
}
?>


<div id="" class="my-5 py-5">
    <div class="row mx-auto">

        <div class="ecole col-sm-12 col-lg-6 col-md-6 mx-auto pb-3">
            <h3 class="text-center my-2">Edit food</h3>
            <form action="sr_Edit_prod.php" method="post">
                <input type="hidden" name="food_id" value="<?php echo $_GET['food_id'] ?>">
                <?php foreach ($foods as $food) { ?>
                <div class="form-group">
                    <label for="food-name">Food Name</label>
                    <input type="text" class="form-control" id="food-name" name="food_name"
                        value="<?php echo $food['food_name']; ?>" required />
                </div>
                <div class="form-group">
                    <label for="food-image">Food Image
                    </label>
                    <input type="text" class="form-control" id="food-name" name="image_url"
                        value="<?php echo $food['image_url']; ?>" required />
                </div>

                <div class="form-group">
                    <label for="food-price">Price ($)</label>
                    <input type="number" class="form-control" id="food-price" name="food_price"
                        value="<?php echo $food['food_price']; ?>" required />
                </div>

                <div class="form-group">
                    <label for="colorSelect">Select a category:</label>
                    <select class="form-control" id="colorSelect" name="category">
                        <option value="breakfeast" <?php if ($food['category'] == 'breakfeast') echo 'selected'; ?>>
                            breakfeast
                        </option>
                        <option value="dinner" <?php if ($food['category'] == 'dinner') echo 'selected'; ?>>dinner
                        </option>
                        <option value="homemade" <?php if ($food['category'] == 'homemade') echo 'selected'; ?>>
                            homemade
                        </option>
                        <option value="salad" <?php if ($food['category'] == 'salad') echo 'selected'; ?>>
                            salad
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="food-price">related img1</label>
                    <input type="text" class="form-control" id="food-price" name="image_url1"
                        value="<?php echo $food['image_url1']; ?>" required />
                </div>
                <div class="form-group">
                    <label for="food-price">related img2</label>
                    <input type="text" class="form-control" id="food-price" name="image_url2"
                        value="<?php echo $food['image_url2']; ?>" required />
                </div>
                <div class="form-group">
                    <label for="food-price">related img3</label>
                    <input type="text" class="form-control" id="food-price" name="image_url3"
                        value="<?php echo $food['image_url3']; ?>" required />
                </div>

                <label for="food-description">Description</label>
                <textarea class="form-control" id="food-description" name="description"
                    rows="3"><?php echo $food['description']; ?></textarea>

                <div class="form-group mt-4">
                    <button type="submit" name="edit-prod-btn" value="edit" class="btn w-100 btn-primary">
                        Edit food
                    </button>
                </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>


<?php
include('./adFooter.php'); ?>