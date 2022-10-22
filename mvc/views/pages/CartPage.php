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
                            <tr>
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
    <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Micromodal
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <p>
                        Try hitting the <code>tab</code> key and notice how the focus stays within the modal itself. Also, <code>esc</code> to close modal.
                    </p>
                </main>
                <footer class="modal__footer">
                    <button class="modal__btn modal__btn-primary">Continue</button>
                    <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
                </footer>
            </div>
        </div>
    </div>
</div>
<script defer src="public/js/cart.js"></script>