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
        } else {
            ?>
            <p>Không Có Đơn Hàng Nào</p>

        <?php
        }

        ?>



    </ul>
    <div class="modal micromodal-slide " id="modal-2" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Chi tiết đơn hàng 31
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content modal__content2" id="modal-1-content">
                    <h3 class="modal__content_heading">
                        Sản phẩm :
                    </h3>
                    <div class="list_product_order">
                        <p class="modal__content_one_product">Váy ngắn x 2</p>
                        <p class="modal__content_one_product">Váy ngắn x 2</p>
                        <p class="modal__content_one_product">Váy ngắn x 2</p>
                        <p class="modal__content_one_product">Váy ngắn x 2</p>
                    </div>
                    <div class="wrap_btn_status">
                        <div>
                            <input type="checkbox" id="switch" class="switch-input" />
                            <label for="switch" class="switch"></label>
                        </div>
                        <p class="status_bill">Pending</p>
                    </div>
                </main>
                <footer class="modal__footer">
                    <button class="modal__btn modal__btn-primary btn_save">Save</button>
                    <button class="modal__btn modal__btn_add" data-micromodal-close aria-label="Close this dialog window"><a href="Profile">Thoát</a></button>
                </footer>
            </div>
        </div>
    </div>
</section>
<script src="./public/js/ordermanage.js"></script>