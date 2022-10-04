<?php
$img = json_decode($data['Product']["srcImg"]);
$coImg = 'egcvopsmdu2p8lifho9t.1664783359.webp'
?>

<section class="product_detail_container">
    <div class="container">
        <div class="controller_detail_product">

            <div class="controller_detail_product_link">
                <a href="">Home</a>
                <img src="public/img/chevron 3.png" alt="">
            </div>
            <div class="controller_detail_product_link">
                <a href="">Woman's Clothes</a>
                <img src="public/img/chevron 3.png" alt="">
            </div>
            <div class="controller_detail_product_link">
                <a href="">Tops</a>
                <img src="public/img/chevron 3.png" alt="">
            </div>
            <div class="controller_detail_product_link">
                <a href="">Turtle Neck</a>
            </div>

        </div>
        <div class="product_detail_main">
            <div class="product_detail_main_img">
                <div class="product_detail_img_show">
                    <img src="public/imgUp/<?= isset($img[0]) ? $img[0] : $coImg  ?>" alt="">
                </div>
                <div class="product_detail_img_pview">
                    <img class="active" src="public/imgUp/<?= isset($img[0]) ? $img[0] : $coImg  ?>" alt="">
                    <img src="public/imgUp/<?= isset($img[1]) ? $img[1] : $coImg  ?>" alt="">
                    <img src="public/imgUp/<?= isset($img[2]) ? $img[2] : $coImg  ?>" alt="">
                    <img src="public/imgUp/<?= isset($img[3]) ? $img[3] : $coImg  ?>" alt="">
                </div>
            </div>
            <div class="product_detail_main_infor">
                <h2 class="product_name_detail">
                    <?= $data['Product']['tenSanPham'] ?>
                </h2>
                <div class="product_detail_start_vote">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <div class="product_detail_cost">
                    <?= number_format($data['Product']['giaSanPham'], 0, ".", ".") . "đ" ?>
                </div>
                <div class="product_detail_shipping">
                    <div class="product_detail_shipping_item">
                        <i class="fa-regular fa-clock"></i>
                        <p>5 days</p>
                    </div>
                    <div class="product_detail_shipping_item">
                        <i class="fa-solid fa-house-user"></i>
                        <p>Jl. Fortune X no. <br> 15 Jakarta Barat</p>
                    </div>
                    <div class="product_detail_shipping_item">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <p>Free Shipping</p>
                    </div>
                </div>
                <div class="product_detail_description">
                    <h3>Description</h3>
                    <p>
                        <?= $data['Product']['moTa'] ?>
                    </p>
                </div>
                <div class="product_detail_description">
                    <h3>Condition</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="product_detail_common">
                    <p>Category</p>
                    <span>Casual</span>
                </div>
                <div class="product_detail_common">
                    <p>Size</p>
                    <span>M</span>
                </div>
                <div class="product_detail_end">
                    <div class="product_detail_common">
                        <p>Color</p>
                        <div class="product_detail_color_items">
                            <p class="active"></p>
                            <p></p>
                            <p></p>
                        </div>
                    </div>
                    <div class="product_detail_button">
                        <button>Add to Cart</button>
                        <button>Rent Now</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="product_detail_review">
            <form action="" id="comment_form" data-product="<?= $data['Product']['maSanPham'] ?>">
                <textarea class="content_comment_input" name="comment" placeholder="Enter your comment..."></textarea>
                <button class="btn-comment">Comment</button>
            </form>
            <h3>Product Reviews</h3>
            <ul class="product_detail_review_wrapper">
                <!-- <li>
                    <img src="https://images.unsplash.com/photo-1544481921-fb52f37ba73c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="">
                    <div class="comment_infor">
                        <p class="name_user_comment">Dian Puspitasari</p>
                        <p class="date_user_comment">May 12 2021 7.08 PM</p>
                        <div class="product_detail_start_vote">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="content_comment">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </p>
                    </div>
                </li>
                <li>
                    <img src="https://images.unsplash.com/photo-1544481921-fb52f37ba73c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="">
                    <div class="comment_infor">
                        <p class="name_user_comment">Dian Puspitasari</p>
                        <p class="date_user_comment">May 12 2021 7.08 PM</p>
                        <div class="product_detail_start_vote">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="content_comment">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </p>
                    </div>
                </li>
                <li>
                    <img src="https://images.unsplash.com/photo-1544481921-fb52f37ba73c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="">
                    <div class="comment_infor">
                        <p class="name_user_comment">Dian Puspitasari</p>
                        <p class="date_user_comment">May 12 2021 7.08 PM</p>
                        <div class="product_detail_start_vote">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="content_comment">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </p>
                    </div>
                </li> -->
            </ul>
        </div>
    </div>
</section>
<script src="public/js/detailPage.js"></script>