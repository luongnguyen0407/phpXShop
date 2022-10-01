<section class="hero">
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <div class="hero-wrap container">
                    <div class="hero-cloumn1" data-aos="fade-right">
                        <h3>MacBook Pro M1 2020</h3>
                        <p>Macbook Pro M1 2020 sở hữu thiết kế sang trọng kế thừa từ các thế hệ trước và bên trong là một cấu hình ấn tượng từ con chip M1 lần đầu tiên xuất hiện trên MacBook Pro, hiệu năng CPU của máy tăng đến 2.8 lần, hiệu năng GPU tăng 5 lần.</p>
                        <div class="hero-btn">
                            <a href="./sp.php">Mua Ngay</a>
                            <a href="./sp.php">Chi Tiết</a>
                        </div>
                    </div>
                    <div class="hero-cloumn2">
                        <img src="./public/images/mac.png" data-aos="flip-left" alt="">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="hero-wrap container">
                    <div class="hero-cloumn1" data-aos="fade-right">
                        <h3>Iphone 13 Pro Max</h3>
                        <p>iPhone 13 Pro Max xứng đáng là một chiếc iPhone lớn nhất, mạnh mẽ nhất và có thời
                            lượng pin dài nhất từ trước đến nay sẽ cho bạn trải nghiệm tuyệt vời, từ những tác
                            vụ bình thường cho đến các ứng dụng chuyên nghiệp.</p>
                        <div class="hero-btn">
                            <a href="./sp.php">Mua Ngay</a>
                            <a href="./sp.php">Chi Tiết</a>
                        </div>
                    </div>
                    <div class="hero-cloumn2">
                        <img src="./public/images/hero.png" data-aos="flip-left" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>
<div class="content-product">
    <div class="container">
        <h3 class="headding-product">Điện Thoại Bán Chạy Tháng 7</h3>
        <div class="wrap-item-dt">
            <?php
            $arr = json_decode($data['DT'], true);
            foreach ($arr as $item) { //foreach element in $arr
                // $uses = $item['var1']; //etc
            ?>
                <div class="sp-one">
                    <a href="./detail.php?id=<?php echo $item['maSanPham'] ?>">
                        <div class="tragop">
                            <span class="lb-tragop">Trả góp 0%</span>
                        </div>
                        <div class="item-img">
                            <img class="item-img-product" alt="Samsung Galaxy M53" src="/xshop/public/imgUp/<?php echo $item['srcImg'] ?>">
                            <img class="doqu" src="/xshop/public/images/Label_01-05.png">
                        </div>
                        <div>
                            <p class="temp3">
                                <img src="https://cdn.tgdd.vn/2022/07/content/50x50-50x50-12.png">
                                <span>ƯU ĐÃI SINH NHẬT</span>
                            </p>
                            <h3><?php echo $item['tenSanPham'] ?></h3>
                            <strong class="price"><?php echo number_format($item['giaSanPham'], 0, ".", ".") . "đ" ?></strong>
                            <p class="vote-txt">
                            <div class="wrap-icon">
                                <span>4.1</span>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            </p>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
        <a href="./sp.php"> <button class="btn-more">Xem Thêm</button></a>
        <hr>
        <h3 class="headding-product">Macbook Bán Chạy Tháng 7</h3>
        <div class="wrap-item-dt">
            <?php
            $arr = json_decode($data['LT'], true);
            foreach ($arr as $item) { //foreach element in $arr
                // $uses = $item['var1']; //etc
            ?>
                <div class="sp-one">
                    <a href="./detail.php?id=<?php echo $item['maSanPham'] ?>">
                        <div class="tragop">
                            <span class="lb-tragop">Trả góp 0%</span>
                        </div>
                        <div class="item-img">
                            <img class="item-img-product" alt="Samsung Galaxy M53" src="/xshop/public/imgUp/<?php echo $item['srcImg'] ?>">
                            <img class="doqu" src="/xshop/public/images/Label_01-05.png">
                        </div>
                        <div>
                            <p class="temp3">
                                <img src="https://cdn.tgdd.vn/2022/07/content/50x50-50x50-12.png">
                                <span>ƯU ĐÃI SINH NHẬT</span>
                            </p>
                            <h3><?php echo $item['tenSanPham'] ?></h3>
                            <strong class="price"><?php echo number_format($item['giaSanPham'], 0, ".", ".") . "đ" ?></strong>
                            <p class="vote-txt">
                            <div class="wrap-icon">
                                <span>4.1</span>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            </p>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
        <a href="./sp.php"> <button class="btn-more">Xem Thêm</button></a>
    </div>

</div>
</div>