<?php
session_start();
include('../server/feature.php');
?>

<?php include('../layout/header.php') ?>

<!-- HOME PAGE -->

<section id="home" class="mt-5 container-fluid">
    <div class="container">
        <p class="text-capitalize my-2">Welcom to our food delevery</p>
        <h1 class=""><span>Best Price</span> This season</h1>
        <button class="btn btn-dark">order now</button>
    </div>
</section>
<!-- end of HOME PAGE -->

<!--  our news  -->
<section id="news" class="mb-2">
    <div class="row w-100 h-100">
        <div class="new1 col-lg-4 col-md-12 col-sm-12">
            <img src="../images_food/news-img1.jpg" alt="" class="fluid" />

            <div class="news1-text">
                <h3>Our new favorite</h3>
                <button class="btn btn-success">order now</button>
            </div>
        </div>
        <div class="new1 col-lg-4 col-md-12 col-sm-12">
            <img src="../images_food/news-img2.jpg" alt="" class="fluid" />

            <div class="news1-text">
                <h3>Our new favorite</h3>
                <button class="btn btn-success">order now</button>
            </div>
        </div>
        <div class="new1 col-lg-4 col-md-12 col-sm-12">
            <img src="../images_food/news-img3.jpg" alt="" class="fluid" />

            <div class="news1-text">
                <h3>Our new favorite</h3>
                <button class="btn btn-success">order now</button>
            </div>
        </div>
    </div>
</section>
<!--  end of new  -->

<!-- FEATURES PART   -->

<section class="conatiner-fluid my-2 py-2" id="feature">
    <h2 class="line text-center mb-5">Our Features</h2>

    <div class="row mx-auto container text-center">
        <?php while ($row = $feature_result->fetch_assoc()) { ?>
        <!-- item1 one -->
        <div class="items col-lg-3 col-md-4 col-6 mb-2">
            <div class="image-heart">
                <img src="../images_food/<?php echo $row['image_url'] ?>" alt="" class="img-fluid" />
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
                <h5><?php echo $row['food_name'] ?></h5>
                <h4>$<?php echo $row['food_price'] ?></h4>

                <a href="./single.php?food_id=<?php echo $row['food_id'] ?>"> <button type="submit" name="order_now"
                        value="order_now" class="btn btn-dark">order
                        now</button></a>

            </div>
        </div>
        <!-- item1 end -->
        <?php } ?>
        <!-- item1 one -->
        <!-- <div class="items col-lg-3 col-md-4 col-6 mb-2">
                    <img
                        src="../images_food/food-2.jpg"
                        alt=""
                        class="img-fluid"
                    />
                    <div class="food-information my-1">
                        <div class="icons">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h5>whiteshoes</h5>
                        <h3>$199</h3>
                        <button class="btn btn-dark">order now</button>
                    </div>
                </div> -->
        <!-- item1 end -->
        <!-- item1 one -->
        <!-- <div class="items col-lg-3 col-md-4 col-6 mb-2">
                    <img
                        src="../images_food/food-3.jpg"
                        alt=""
                        class="img-fluid"
                    />
                    <div class="food-information my-1">
                        <div class="icons">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h5>whiteshoes</h5>
                        <h3>$199</h3>
                        <button class="btn btn-dark">order now</button>
                    </div>
                </div> -->
        <!-- item1 end -->
        <!-- item1 one -->
        <!-- <div class="items col-lg-3 col-md-4 col-6 mb-2">
                    <img
                        src="../images_food/food-4.jpg"
                        alt=""
                        class="img-fluid"
                    />
                    <div class="food-information my-1">
                        <div class="icons">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h5>whiteshoes</h5>
                        <h3>$199</h3>
                        <button class="btn btn-dark">order now</button>
                    </div>
                </div>
                item1 end -->
    </div>
</section>
<!-- end of features part  -->

<!-- indirim partt-->
<section id="indirim" class="container-fluid mb-5">
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
<!-- our beakfeat -->
<section class="conatiner-fluid my-2 py-2" id="feature">
    <h2 class="line text-center mb-5">Our breakfeast</h2>

    <div class="row mx-auto container text-center">
        <!-- item1 one -->
        <div class="items col-lg-3 col-md-4 col-6 mb-2">
            <img src="../images_food/breakf1.jpg" alt="" class="img-fluid" />
            <div class="food-information my-1">
                <div class="icons">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5>whiteshoes</h5>
                <h3>$199</h3>
                <button class="btn btn-dark">order now</button>
            </div>
        </div>
        <!-- item1 end -->
        <!-- item1 one -->
        <div class="items col-lg-3 col-md-4 col-6 mb-2">
            <img src="../images_food/breakf2.jpg" alt="" class="img-fluid" />
            <div class="food-information my-1">
                <div class="icons">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5>whiteshoes</h5>
                <h3>$199</h3>
                <button class="btn btn-dark">order now</button>
            </div>
        </div>
        <!-- item1 end -->
        <!-- item1 one -->
        <div class="items col-lg-3 col-md-4 col-6 mb-2">
            <img src="../images_food/breakf3.jpg" alt="" class="img-fluid" />
            <div class="food-information my-1">
                <div class="icons">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5>whiteshoes</h5>
                <h3>$199</h3>
                <button class="btn btn-dark">order now</button>
            </div>
        </div>
        <!-- item1 end -->
        <!-- item1 one -->
        <div class="items col-lg-3 col-md-4 col-6 mb-2">
            <img src="../images_food/breakf4.jpg" alt="" class="img-fluid" />
            <div class="food-information my-1">
                <div class="icons">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5>whiteshoes</h5>
                <h3>$199</h3>
                <button class="btn btn-dark">order now</button>
            </div>
        </div>
        <!-- item1 end -->
    </div>
</section>
<!-- our beakfeat end -->

<!-- our best food -->
<section class="conatiner-fluid my-2 py-2" id="feature">
    <h2 class="line text-center mb-5">Our Most Liked</h2>

    <div class="row mx-auto container text-center">
        <!-- item1 one -->
        <div class="items col-lg-3 col-md-4 col-6 mb-2">
            <img src="../images_food/gallery7.jpg" alt="" class="img-fluid" />
            <div class="food-information my-1">
                <div class="icons">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5>whiteshoes</h5>
                <h3>$199</h3>
                <button class="btn btn-dark">order now</button>
            </div>
        </div>
        <!-- item1 end -->
        <!-- item1 one -->
        <div class="items col-lg-3 col-md-4 col-6 mb-2">
            <img src="../images_food/gallery6.jpg" alt="" class="img-fluid" />
            <div class="food-information my-1">
                <div class="icons">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5>whiteshoes</h5>
                <h3>$199</h3>
                <button class="btn btn-dark">order now</button>
            </div>
        </div>
        <!-- item1 end -->
        <!-- item1 one -->
        <div class="items col-lg-3 col-md-4 col-6 mb-2">
            <img src="../images_food/gallery9.jpg" alt="" class="img-fluid" />
            <div class="food-information my-1">
                <div class="icons">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5>whiteshoes</h5>
                <h3>$199</h3>
                <button class="btn btn-dark">order now</button>
            </div>
        </div>
        <!-- item1 end -->
        <!-- item1 one -->
        <div class="items col-lg-3 col-md-4 col-6 mb-2">
            <img src="../images_food/gallery4.jpg" alt="" class="img-fluid" />
            <div class="food-information my-1">
                <div class="icons">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5>whiteshoes</h5>
                <h3>$199</h3>
                <button class="btn btn-dark">order now</button>
            </div>
        </div>
        <!-- item1 end -->
    </div>
</section>
<!-- our best food end -->

<!-- home made -->
<section class="conatiner-fluid my-2 py-2" id="feature">
    <h2 class="line text-center mb-5">Our Home Made</h2>

    <div class="row mx-auto container text-center">
        <!-- item1 one -->
        <div class="items col-lg-3 col-md-4 col-6 mb-2">
            <img src="../images_food/homemade1.jpg" alt="" class="img-fluid" />
            <div class="food-information my-1">
                <div class="icons">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5>whiteshoes</h5>
                <h4>$199</h4>
                <button class="btn btn-dark">order now</button>
            </div>
        </div>
        <!-- item1 end -->
        <!-- item1 one -->
        <div class="items col-lg-3 col-md-4 col-6 mb-2">
            <img src="../images_food/homemade2.jpg" alt="" class="img-fluid" />
            <div class="food-information my-1">
                <div class="icons">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5>whiteshoes</h5>
                <h4>$199</h4>
                <button class="btn btn-dark">order now</button>
            </div>
        </div>
        <!-- item1 end -->
        <!-- item1 one -->
        <div class="items col-lg-3 col-md-4 col-6 mb-2">
            <img src="../images_food/homemade3.jpg" alt="" class="img-fluid" />
            <div class="food-information my-1">
                <div class="icons">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5>whiteshoes</h5>
                <h4>$199</h4>
                <button class="btn btn-dark">order now</button>
            </div>
        </div>
        <!-- item1 end -->
        <!-- item1 one -->
        <div class="items col-lg-3 col-md-4 col-6 mb-2">
            <img src="../images_food/homemade4.jpg" alt="" class="img-fluid" />
            <div class="food-information my-1">
                <div class="icons">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5>whiteshoes</h5>
                <h4>$199</h4>
                <button class="btn btn-dark">order now</button>
            </div>
        </div>
        <!-- item1 end -->
    </div>
</section>
<!-- home made end -->
<section>
    <div class="container-fluid my-5 py-5">
        <h2 class="text-center line mb-5">Our top chef</h2>
        <div class="row mx-auto  container">
            <!-- chef 1 -->
            <div class=" profile-chef col-lg-4 col-md-6 col-sm-12 mx-auto mb-4">
                <img src="../images_food/our-cheffs1.jpg" alt="" class="img-fluid mb-2">
                <div class="chef-info">
                    <h4 class="name"><span class="text-underline">Chef:</span>Elizabeth Keen</h4>
                    <p> Chef <strong>Elizabeth</strong> is a culinary maestro with a remarkable profile that shines in
                        the
                        restaurant industry. With <strong>10+</strong> years of experience, their expertise spans across
                        various
                        cuisines, showcasing a diverse range of flavors and techniques. Their exceptional attention to
                        detail and dedication to sourcing high-quality ingredients ensures that each dish is a
                        masterpiece
                        on its own.</p>
                    <button class="mt-3 btn btn-dark">See more...</button>
                </div>

            </div>
            <!-- chef 1 -->
            <div class=" profile-chef   mx-auto col-lg-4 col-md-6 col-sm-12  mb-4">
                <img src="../images_food/our-cheffs2.jpg" alt="" class="img-fluid mb-2">
                <div class="chef-info">
                    <h4 class="name"><span class="text-underline">Chef:</span>John Smilga</h4>
                    <p> With a flair for fusion flavors and a creative culinary vision, Chef <strong>John</strong> adds
                        a
                        unique touch to our restaurant's menu. Their background in international cuisine allows them to
                        craft dishes that combine traditional recipes with contemporary twists. Chef
                        <strong>John</strong>
                        's commitment to sourcing fresh, local ingredients ensures a farm-to-table experience that
                        tantalizes the taste buds. Their culinary artistry and ability to harmonize flavors make them an
                        invaluable asset to our team..
                    </p>
                    <button class="mt-3 btn btn-dark">See more...</button>
                </div>

            </div>
            <!-- chef 1 -->
            <div class=" profile-chef mx-auto col-lg-4 col-md-6 col-sm-12  mb-3">
                <img src="../images_food/our-cheffs3.jpg" alt="" class="img-fluid mb-2">
                <div class="chef-info">
                    <h4 class="name"><span class="text-underline">Chef:</span>Jenifer jonathan</h4>
                    <p>Chef <strong>Jenifer</strong> is a true culinary maestro. With a diverse culinary background and
                        a
                        passion for pushing boundaries, they consistently deliver extraordinary dining experiences.
                        Their
                        innovative techniques and bold flavor combinations set them apart. Chef
                        <strong>Jenifer</strong>'s
                        leadership skills inspire the kitchen staff, fostering a collaborative and dynamic environment.
                        With
                        an unwavering commitment to excellence, they elevate our restaurant's reputation and leave a
                        lasting
                        impression on all who dine with us.
                    </p>
                    <button class="mt-3 btn btn-dark">See more...</button>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="mt-2 py-2 mb-5 pb-5 mx-auto container-fluid">
    <div class="container row mx-auto">
        <h3 class="text-center line mb-5">What People Say About Us</h3>
        <div class="quote mx-auto col-lg-5 col-md-5 col-sm-10 d-flex gap-3 mb-3">
            <div class="our-user-profile">
                <img src="../images_food/doctor1.jpg" alt="" width="50px" height="50px"
                    style="object-fit: cover; border-radius:50%;" class="">
            </div>
            <div>

                <p>I had an amazing dining experience at. The food was exceptional, bursting with
                    flavors that left me wanting more.The attentive and friendly staff made me feel right at home. It's
                    no wonder people are raving about this place! <strong><i class="fa-solid fa-quote-left"></i>
                        John</strong></p>
                <div class="person ">
                    <div>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span class="comment-date">Mars 02,2023</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="quote mx-auto col-lg-5 col-md-5 col-sm-10 d-flex gap-3 mb-3">
            <div class="our-user-profile">
                <img src="../images_food/img-2.jpg" alt="" width="50px" height="50px"
                    style="object-fit: cover; border-radius:50%;" class="">
            </div>
            <div>

                <p>If you're looking for a culinary adventure, [Restaurant Name] is the place to be. The menu is a
                    delightful fusion of flavors, each dish crafted with creativity and precision. The ambiance is
                    elegant yet inviting, making it perfect for any occasion. Trust me, you won't be disappointed.
                    <strong><i class="fa-solid fa-quote-left"></i>
                        Sarah</strong>
                </p>
                <div class="person ">
                    <div>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span class="comment-date">April 10,2023</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="quote mx-auto  col-lg-5 col-md-5 col-sm-10 d-flex gap-3 mb-3">
            <div class="our-user-profile">
                <img src="../images_food/img-1.jpg" alt="" width="50px" height="50px"
                    style="object-fit: cover; border-radius:50%;" class="">
            </div>
            <div>

                <p>I've been a regular at [Restaurant Name] for years, and the quality never disappoints. The attention
                    to detail in presentation and taste is remarkable. The staff's knowledge and enthusiasm for the food
                    make the dining experience truly special. It's no wonder this place has such a loyal following
                    <strong><i class="fa-solid fa-quote-left"></i>
                        Lisa</strong>
                </p>
                <div class="person ">
                    <div>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span class="comment-date">June 12,2022</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="quote mx-auto  col-lg-5 col-md-5 col-sm-10 d-flex gap-3 mb-3">
            <div class="our-user-profile">
                <img src="../images_food/img-3.jpg" alt="" width="50px" height="50px"
                    style="object-fit: cover; border-radius:50%;" class="">
            </div>
            <div>

                <p>What sets [Restaurant Name] apart is their commitment to sourcing local, sustainable ingredients. The
                    freshness and quality shine through in every bite. The menu offers a diverse range of options,
                    catering to different dietary preferences. I appreciate their dedication to providing a memorable
                    culinary journey. <strong><i class="fa-solid fa-quote-left"></i>
                        David</strong></p>
                <div class="person ">
                    <div>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span class="comment-date">May 6,2023</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('../layout/footer.php') ?>