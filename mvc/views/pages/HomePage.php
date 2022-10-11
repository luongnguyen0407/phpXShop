<section class="hero_collections">
    <div class="hero_img_flower">
        <img src="./public/images/flower1.png" alt="">
    </div>
    <div class="container wrap_content_hero">
        <div class="hero_text">
            <h3>Collections</h3>
            <p>you can explore ans shop many differnt collection
                from various barands here.</p>
            <button>
                <i class="fa-solid fa-bag-shopping"></i>

                <span>shop now</span></button>
        </div>
        <div class="hero_img">
            <img class="hero_img_show" src="./public/images/engin-akyurt-jaZoffxg1yc-unsplash 1.png" alt="">
            <img class="hero_img_border" src="./public/images/Rectangle 124.png" alt="">
        </div>
    </div>
</section>
<section class="brand_section">
    <div class="container">
        <div class="brand_img">
            <img src="./public/images/brand-1.png" alt="">
            <img src="./public/images/brand-5.png" alt="">
            <img src="./public/images/brand-3.png" alt="">
            <img src="./public/images/brand-2.png" alt="">
            <img src="./public/images/brand-4.png" alt="">
        </div>
        <div class="brand_show_img">
            <div class="brand_show_img_right">
                <p class="text_brand_deg">Explore new and popular styles</p>
                <div class="brand_show_img_left_div">
                    <img src="./public/images/image-category-1.png" alt="">
                </div>
            </div>
            <div class="brand_show_img_left">
                <div class="brand_show_img_left_div">
                    <img src="./public/images/image-category-2.png" alt="">
                </div>
                <div class="brand_show_img_left_div">
                    <img src="./public/images/image-category-3.png" alt="">
                </div>
                <div class="brand_show_img_left_div">
                    <img src="./public/images/image-category-4.png" alt="">
                </div>
                <div class="brand_show_img_left_div">
                    <img src="./public/images/image-category-5.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="new_product">
    <div class="container">
        <h3>New Products</h3>
        <ul class="new_product_control">
            <li class="get_product_by_category_new active" data-category='all'>
                all products
            </li>
            <li class="get_product_by_category_new" data-category='Dress'>
                Dress
            </li>
            <li class="get_product_by_category_new" data-category='Shorts'>
                Shorts
            </li>
            <li class="get_product_by_category_new" data-category='Shorts'>
                jacket
            </li>
        </ul>
        <div class="new_product_content">
            <!-- ajax -->
        </div>
    </div>
</section>
<section class="banner_brand">
    <img class="za" src="./public/images/1024px-Zara_Logo 1.png" alt="">
    <div class="banner_brand_img">
        <img src="./public/images/brand_banner.png" alt="">
    </div>
    <div class="banner_brand_text">
        <img src="./public/images/1024px-Zara_Logo 2.png" alt="">
        <p>Lustrous yet understated. The new evening
            wear collection exclusively offered at the
            reopened Giorgio Armani boutique in Los
            Angeles.</p>
        <button>See Collection</button>
    </div>
</section>
<section class="best_sale">
    <div class="container">
        <h3>Best sellers</h3>
        <div class="wrap_slider_best_sale">
            <div class="swiper">
                <!-- Additional required wrapper -->
                <?php
                if (isset($data['Product'])) {
                ?>

                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php
                        $arr = json_decode($data['Product'], true);
                        foreach ($arr as $item) { //foreach element in $arr
                            // $uses = $item['var1']; //etc
                            $img = json_decode($item['srcImg'])
                        ?>
                            <div class="swiper-slide">
                                <div class="new_product_item">
                                    <a href="./Product/detailProduct/<?= $item["maSanPham"] ?>">
                                        <div class="new_product_item_img">
                                            <img src="public/imgUp/<?= $img[0] ?>" alt="">
                                        </div>
                                        <div class="new_product_item_name"><?= $item["tenSanPham"] ?></div>
                                        <div class="new_product_item_category_cost">
                                            <p class="new_product_item_category"><?= $item["maDanhMuc"] ?></p>
                                            <p class="new_product_item_cost"><?php echo number_format($item['giaSanPham'], 0, ".", ".") . "đ" ?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                <?php
                }

                ?>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</section>
<section class="flow_section">
    <div class="container">
        <div class="flow_top">
            <div class="title_flow">
                <h2>Follow products and discounts on flow</h2>
            </div>
            <div class="flow_img">
                <div class="flow_img_item">
                    <div class="intagram">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <img src="./public/images/i011 1.png" alt="">
                </div>
                <div class="flow_img_item">
                    <div class="intagram">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <img src="./public/images/i012 1.png" alt="">
                </div>
                <div class="flow_img_item">
                    <div class="intagram">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <img src="./public/images/i014 1.png" alt="">

                </div>
                <div class="flow_img_item">
                    <div class="intagram">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <img src="./public/images/i02 1.png" alt="">

                </div>
                <div class="flow_img_item">
                    <div class="intagram">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <img src="./public/images/i03 1.png" alt="">

                </div>
                <div class="flow_img_item">
                    <div class="intagram">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <img src="./public/images/i07 1.png" alt="">
                </div>
            </div>
        </div>
        <div class="flow_bottom">
            <div class="title_bottom_flow">
                <h2>Or subscribe to the newsletter</h2>
                <div class="input_flow">
                    <input type="email" name="" id="" placeholder="Email address...">
                    <button>Submit</button>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="./public/js/home.js"></script>