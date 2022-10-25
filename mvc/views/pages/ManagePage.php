<?php
$arr = json_decode($data['Product'], true);
?>
<div class="content-main">
    <div class="table">
        <table class="table-main">
            <thead>
                <tr class="table100-head">
                    <th class="column1">Ảnh</th>
                    <th class="column3">Tên Sản Phẩm</th>
                    <th class="column4">Giá</th>
                    <th class="column7">
                        Chage
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($arr)) {
                    die();
                }
                foreach ($arr as $item) { //foreach element in $arr
                    // $uses = $item['var1']; //etc
                    $img = json_decode($item['srcImg']);
                ?>
                    <tr>
                        <td class="column1">
                            <img src="public/imgUp/<?php echo $img[0] ?>" alt="">
                        </td>
                        <td class="column3"><?php echo $item['tenSanPham'] ?></td>
                        <td class="column4"><?php echo number_format($item['giaSanPham'], 0, ".", ".") . "đ" ?></td>
                        <td class="column7" data-product=<?= $item['maSanPham'] ?>>
                            <i class="fa-regular fa-comment btn_comment"></i>
                            <a href="./UpdateProduct/Show/<?php echo $item['maSanPham'] ?>">
                                <i class="ti-pencil-alt chage"></i>
                            </a>
                            <i class="ti-trash remove"></i>
                        </td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="modal micromodal-slide" id="modal-4" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Danh sách bình luận đơn hàng 31
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <p class="total_payment"></p>
                    <div>
                        <ul class="list_address list_product_comment scroll_style">

                        </ul>
                    </div>
                </main>

            </div>
        </div>
    </div>
</div>
<script defer src="./public/js/productmanage.js"></script>
<?php
if (!empty($data['Status'])) {
?>
    <script>
        Toastify({
            text: "update success",
            duration: 2000,
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #D2BB5A, #CCADDA)",
            },
            onClick: function() {}, // Callback after click
        }).showToast();
    </script>
<?php
}
?>