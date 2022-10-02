<div class="content-main">
    <form method="POST" action="./AddProduct/AddSp" enctype="multipart/form-data" class="form_add_item">
        <h3>Thêm Sản Phẩm Mới</h3>
        <div class="onetr">
            <label for="tenSP">Tên Sản Phẩm</label>
            <input type="text" name="tenSp">
            <div class="err">
                <span class="has-err">
                    Hello
                </span>
            </div>
        </div>
        <div class="sele">
            <label for="">Danh Mục</label>
            <select name="danhMuc">
                <option value="DT">Điện Thoại</option>
                <option value="LT">Laptop</option>
            </select>
            <div class="err">
                <span class="has-err">
                    Hello
                </span>
            </div>
        </div>
        <div class="onetr">
            <label for="tenSP">Giá Sản Phẩm</label>
            <input type="text" name="giaSp">
            <div class="err">
                <span class="has-err">
                    Hello
                </span>
            </div>
        </div>
        <div class="onetr">
            <label for="mieuTa">Miêu Tả</label>
            <textarea type="text" name="mieuTa" class="mieuTa"></textarea>
            <div class="err">
                <span class="has-err">
                    Hello
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
                    Hello
                </span>
            </div>
        </div>
        <img class="img-pview" src="#" alt="">
        <input type="submit" name="submit" class="btn-add">
    </form>
</div>