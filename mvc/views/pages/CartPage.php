<div class="wrapper-cart">
    <div class="table container">
        <div>
            <table class="table-main">
                <thead>
                    <tr class="table100-head">
                        <th class="column1">Ảnh</th>
                        <th class="column3">Tên Sản Phẩm</th>
                        <th class="column4">Số Lượng</th>
                        <th class="column4">Đơn Giá</th>
                        <th class="column4">Thành Tiền</th>
                        <th class="column7">
                            Chage
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($data['listProduct'])) {
                        $total = 0;
                        $coImg = 'egcvopsmdu2p8lifho9t.1664783359.webp';
                        foreach ($data['listProduct'] as &$row) {
                            $img = json_decode($row['srcImg']);
                    ?>
                            <tr class="one_product_ca" data-sle="<?= $row["maSanPham"] ?>">
                                <td class="column1">
                                    <img src="public/imgUp/<?= isset($img[0]) ? $img[0] : $coImg  ?>" alt="">
                                </td>
                                <td class="column3"><?= $row['tenSanPham'] ?></td>
                                <td class="column4 column_input" data-id="<?= $row["idCart"] ?>">
                                    <div class="rai">-</div>
                                    <input class="sl" type="text" name="name" value="<?= $row['soLuong'] ?>">
                                    <div class="su">+</div>
                                </td>
                                <td class="column4"><?= number_format($row['giaSanPham'], 0, ".", ".") . "đ" ?></td>
                                <td class="column4 tt_cart"><?= number_format(($row['giaSanPham'] * $row['soLuong']), 0, ".", ".") . "đ" ?></td>
                                <td class="column7">
                                    <i class="ti-trash remove"></i>
                                </td>
                            </tr>
                        <?php
                            $total += $row['giaSanPham'] * $row['soLuong'];
                        }
                        ?>
                        <tr>
                            <td class="column1">Tổng Tiền
                            </td>
                            <td class="column3">&nbsp</td>
                            <td class="column4">
                                &nbsp
                            </td>
                            <td class="column4">&nbsp</td>
                            <td class="column4">&nbsp</td>
                            <td class="column7 total_cart">
                                <?= number_format($total, 0, ".", ".") . "đ" ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>


                </tbody>
            </table>


            <input class="oder-btn" type="submit" name="order" value="Đặt Hàng">
        </div>
    </div>
    <div class="modal micromodal-slide " id="modal-1" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Đơn Hàng Của Bạn Đã Sẵn Sàng
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <p class="total_payment"></p>
                    <div>
                        <p>Chọn Địa Chỉ Giao Hàng</p>
                        <ul class="list_address scroll_style">
                            <?php
                            if (!empty($data['listAddress'])) {

                                foreach ($data['listAddress'] as &$row) {
                            ?>
                                    <li class="list_address_item" data-address="<?= $row['idAddress'] ?>">
                                        <div class="list_address_check"></div>
                                        <div class="wrap_list_address_text">
                                            <p class="user_name_order"><?= $row['tenKH'] ?> | <?= $row['sdt'] ?></p>
                                            <p class="user_add_order"><?= $row['province'] ?>, <?= $row['district'] ?>, <?= $row['district'] ?></p>
                                            <p class="user_details_order"><?= $row['detail_address'] ?></p>
                                        </div>
                                    </li>
                                <?php
                                }
                            } else {
                                ?>
                                <p>Bạn chưa có địa chỉ nào</p>
                            <?php
                            }

                            ?>


                        </ul>
                    </div>
                </main>
                <footer class="modal__footer">
                    <button class="modal__btn modal__btn-primary btn_dh">Đặt hàng</button>
                    <button class="modal__btn modal__btn_add" data-micromodal-close aria-label="Close this dialog window"><a href="Profile">Thêm địa chỉ</a></button>
                </footer>
            </div>
        </div>
    </div>
</div>
<script defer src="public/js/cart.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>