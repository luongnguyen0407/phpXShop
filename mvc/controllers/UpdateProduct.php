<?php
class UpdateProduct extends Controller
{
    public $productModal;

    function __construct()
    {
        //modal
        if (!$this->checkUser(true)) {
            header('location: ./Home');
        }
        $this->productModal = $this->callModal('ProductModal');
    }

    function Show($id)
    {
        if (empty($id)) return;
        $res = $this->productModal->queryProduct($id);
        $this->callView('Master3', [
            'Page' => 'UpdateProductPage',
            'product' => mysqli_fetch_array($res)
        ]);
    }
    function Update($id)
    {
        $res = $this->productModal->queryProduct($id);
        $res = mysqli_fetch_array($res);
        $error = array();
        $extension = array("jpeg", "jpg", "png", "gif", "webp");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenSP = $_POST['tenSp'];
            $danhMuc = $_POST['danhMuc'];
            $mieuTa = $_POST['mieuTa'];
            $giaSP = $_POST['giaSp'];
            //handle check format img
            $kq = array();
            foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                $file_name = $_FILES["files"]["name"][$key];
                $file_size = $_FILES["files"]["size"][$key];
                $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                if (!in_array($ext, $extension)) {
                    $error['img'] = 'Ảnh không đúng định dạng';
                } else {
                    $size = 10;
                    $sizeFile = $file_size / 1024 / 1024;
                    if ($sizeFile > $size) {
                        $error['img'] = "Ảnh có dung lương quá lớn";
                    }
                }
            }
            if (empty($tenSP)) {
                $error['tensp'] = 'Bạn Phải Nhập Tên Sản Phẩm';
            }
            if (empty($danhMuc)) {
                $error['danhmuc'] = 'Bạn Phải Chọn Danh Mục';
            }
            if (empty($mieuTa)) {
                $error['mieuta'] = 'Bạn Phải Nhập Miêu Tả';
            }
            if (empty($giaSP) || !is_numeric($giaSP)) {
                $error['giasp'] = 'Bạn Phải Nhập Giá Và Phải Là Số';
            }
            if (empty($error)) {
                $listImgOld = json_decode($res['srcImg']);
                //add new img 
                foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                    $file_name = $_FILES["files"]["name"][$key];
                    $file_size = $_FILES["files"]["size"][$key];
                    $file_tmp = $_FILES["files"]["tmp_name"][$key];
                    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                    $filename = basename($file_name, $ext);
                    $newFileName = $filename . time() . "." . $ext;
                    move_uploaded_file($file_tmp, "./public/imgUp/" . $newFileName);
                    array_push($kq, $newFileName);
                }
                //remove img old
                foreach ($listImgOld as &$value) {
                    if (is_file("./public/imgUp/" . $value)) {
                        unlink("./public/imgUp/" . $value);
                    }
                }

                $listImg = json_encode($kq);
                $kq = $this->productModal->UpdateProduct($tenSP, $danhMuc, $mieuTa, $giaSP, $listImg, $id);
                if ($kq) {
                    $this->callView('Master3', [
                        'Page' => 'ManagePage',
                        'Status' => 'ok',
                        'Product' => $this->productModal->getAllProduct(null, "manage")
                    ]);
                } else {
                    $this->callView('Master3', [
                        'Page' => 'UpdateProductPage',
                        'product' => $res,
                        'Status' => false,
                        'tenSP'  =>   $tenSP,
                        'mieuTa'  =>   $mieuTa,
                        'giaSP'  =>   $giaSP,
                    ]);
                }
            } else {
                $this->callView('Master3', [
                    'Page' => 'AddSpPage',
                    'product' => $res,
                    'Error' => $error,
                    'tenSP'  =>   $tenSP,
                    'mieuTa'  =>   $mieuTa,
                    'giaSP'  =>   $giaSP,
                ]);
            }
        }
    }
}
