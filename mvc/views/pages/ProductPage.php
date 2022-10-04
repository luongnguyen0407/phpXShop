<div class="wrapper-sp">
    <section class="sp-banner">
        <img src="public/images/banner.png" alt="">
    </section>
    <div class="content-product">
        <div class="container">
            <form class="search-sp" method="GET">
                <input placeholder="Nhập sản phẩm cần tìm ..." class="search-sp" type="text" name="query" value="<?= $search ?>">
                <input class="btn-more" type="submit" value="Tìm Kiếm">
            </form>
            <h3 class="headding-product">Sản Phẩm Nổi Bật</h3>
            <div class="wrap-item-dt">
                <?php

                $arr = json_decode($data['Product'], true);
                foreach ($arr as $item) { //foreach element in $arr
                    // $uses = $item['var1']; //etc
                ?>
                    <div class="sp-one">
                        <a href="./detail.php?id=<?php echo $item['maSanPham'] ?>">
                            <div class="tragop">
                                <span class="lb-tragop">Trả góp 0%</span>
                            </div>
                            <div class="item-img">
                                <img class="item-img-product" alt="Samsung Galaxy M53" src="public/imgUp/<?php echo $item['srcImg'] ?>">
                                <img class="doqu" src="public/images/Label_01-05.png">
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

        </div>
        <div class="wrap-navigate">
            <?php
            $current_page =  $data['CurrenPage'];
            $get_sl_item = 8;
            $offset = ($current_page - 1) * $get_sl_item;
            $total_page =  $data['TotalPage'];
            if ($current_page > 3) {
                $first_page = 1;
            ?>
                <a href="<?= "Product/Page/1" ?>">First</a>
                <?php
            }
            for ($num = 1; $num <= $total_page; $num++) {
                if ($num != $current_page) {
                    if ($num > $current_page - 3 && $num < $current_page + 3) {
                ?>
                        <a href="<?= "Product/Page" . $num . "" ?>"><?= $num ?></a>
                    <?php
                    }
                } else {
                    ?>
                    <a class="ok"><?= $num ?></a>
                <?php
                }
            }
            if ($current_page < $total_page - 3) {
                $end_page = $total_page;
                ?>
                <a href="<?= "Product/Page" . $total_page . "" ?>">End</a>
            <?php
            }
            ?>

        </div>
    </div>

</div>
<script src="public/js/product.js"></script>