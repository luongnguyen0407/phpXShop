<div class="content-main">
    <form method="POST" action="./AddProduct/AddSp" enctype="multipart/form-data" class="form_add_item">
        <h3>Thêm Sản Phẩm Mới</h3>
        <div class="onetr">
            <label for="tenSP">Tên Sản Phẩm</label>
            <input type="text" name="tenSp" value="<?php echo (isset($data['tenSP']) ? $data['tenSP'] : '')   ?>">
            <div class="err">
                <span class="has-err">
                    <?php echo (isset($data['Error']['tensp']) ? $data['Error']['tensp'] : '')   ?>
                </span>
            </div>
        </div>
        <div class="sele">
            <label for="">Danh Mục</label>
            <select name="danhMuc">
                <option value="Dress">Dress</option>
                <option value="Jean">Jean</option>
                <option value="Shorts">Shorts</option>
                <option value="Top">Tops</option>
            </select>
            <div class="err">
                <span class="has-err">
                    <?php echo (isset($data['Error']['danhmuc']) ? $data['Error']['danhmuc'] : '')   ?>
                </span>
            </div>
        </div>
        <div class="onetr">
            <label for="tenSP">Giá Sản Phẩm</label>
            <input type="text" name="giaSp" value="<?php echo (isset($data['giaSP']) ? $data['giaSP'] : '') ?>">
            <div class="err">
                <span class="has-err">
                    <?php echo (isset($data['Error']['giasp']) ? $data['Error']['giasp'] : '')   ?>
                </span>
            </div>
        </div>
        <div class="onetr">
            <label for="mieuTa">Miêu Tả</label>
            <textarea type="text" name="mieuTa" class="mieuTa">
            </textarea>
            <div class="err">
                <span class="has-err">
                    <?php echo (isset($data['Error']['mieuta']) ? $data['Error']['mieuta'] : '')   ?>
                </span>
            </div>
        </div>
        <div class="input-file">
            <label for="">Ảnh Sản Phẩm</label>
            <input type="file" name="files[]" id="file" class="inputFile" multiple />
            <label for="file" class="input-label">
                <i class="fas fa-cloud-upload-alt icon-upload"></i>
            </label>
            <div class="err">
                <span class="has-err">
                    <?php echo (isset($data['Error']['img']) ? $data['Error']['img'] : '')   ?>
                </span>
            </div>
        </div>
        <img class="img-pview" src="#" alt="">
        <input type="submit" name="submit" class="btn-add">
    </form>
</div>
<script src="public/js/addSp.js">