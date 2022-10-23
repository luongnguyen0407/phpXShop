<?php
// print_r($data['listOrder'])
?>
<section class="wrap_order_manage">
    <ul class="order_item_wrap">

        <?php

        if (!empty($data['listOrder'])) {
            foreach ($data['listOrder'] as &$item) {
        ?>
                <li class="order_item_item" data-mhd="<?= $item['maHoaDon'] ?>">
                    <div class="order_item_info">
                        <h3><?= $item['tenKH'] ?> | <?= $item['sdt'] ?></h3>
                        <p><?= $item['province'] ?> | <?= $item['district'] ?> | <?= $item['ward'] ?> </p>
                        <p><?= $item['detail_address'] ?></p>
                        <p><?php echo number_format($item['tongTien'], 0, ".", ".") . "đ" ?></p>
                    </div>
                    <div class="order_item_action">
                        <button class="btn_detail_order">Chi Tiết</button>
                        <button class="btn_delete_order">Xóa</button>
                    </div>
                </li>

        <?php
            }
        }

        ?>



    </ul>
</section>