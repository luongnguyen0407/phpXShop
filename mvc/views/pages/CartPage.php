<div class="wrapper-cart">
    <div class="table container">
        <form action="cart.php?action=submit" method="POST">
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
                    <tr>
                        <td class="column1">
                            <img src="./imgUp/<?= $row['srcImg'] ?>" alt="">
                        </td>
                        <td class="column3"><?= $row['tenSanPham'] ?></td>
                        <td class="column4 column_input">
                            <div class="rai">-</div>
                            <input class="sl" type="text" name="sp[<?= $row['maSanPham'] ?>]" value="<?= $_SESSION['cart'][$row['maSanPham']] ?>">
                            <div class="su">+</div>
                        </td>
                        <td class="column4"><?= number_format($row['giaSanPham'], 0, ".", ".") . 'đ' ?></td>
                        <td class="column4"><?= number_format($row['giaSanPham'] * $_SESSION['cart'][$row['maSanPham']], 0, ".", ".") . 'đ' ?></td>
                        <td class="column7">
                            <a href="./cart.php?action=delete&id=<?= $row['maSanPham'] ?>">
                                <i class="ti-trash remove"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="column1">Tổng Tiền
                        </td>
                        <td class="column3">&nbsp</td>
                        <td class="column4">
                            &nbsp
                        </td>
                        <td class="column4">&nbsp</td>
                        <td class="column4">&nbsp</td>
                        <td class="column7">
                            7.000.000
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="wrap-submit-input">
                <input type="submit" name="update" value="Update">
            </div>
            <div class="form-location">
                <div class="text-field">
                    <label for="username3">Người nhận</label>
                    <input name="nguoinhan" autocomplete="off" type="text" id="username3" placeholder="Nhập tên người nhận" />
                    <div class="err">
                        <span class="has-err">
                            err
                        </span>
                    </div>
                </div>
                <div class="text-field">
                    <label for="">Địa chỉ</label>
                    <textarea placeholder="Nhập địa chỉ nhận hàng ..." name="diachi" id=""></textarea>
                    <div class="err">
                        <span class="has-err">
                            dia chi
                        </span>
                    </div>
                </div>
                <div class="text-field">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="sdt" id="" placeholder="Nhập số điện thoại">
                    <div class="err">
                        <span class="has-err">
                            error
                        </span>
                    </div>
                </div>
            </div>

            <input class="oder-btn" type="submit" name="order" value="Đặt Hàng">
        </form>
    </div>
</div>