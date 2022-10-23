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
                        <td class="column7">
                            <a href="./UpdateProduct/Show/<?php echo $item['maSanPham'] ?>">
                                <i class="ti-pencil-alt chage"></i>
                            </a>
                            <i class="ti-trash remove" data-product=<?= $item['maSanPham'] ?>></i>
                        </td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
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