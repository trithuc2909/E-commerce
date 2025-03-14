<?php
if (is_array($sanpham)){
    extract($sanpham); // Chuyển mảng thành các biến
}


$hinhanhpath = "../upload/" . $img; // Đường dẫn hình ảnh
if (is_file($hinhanhpath)) {
    $hinhanh = "<img src='".$hinhanhpath."' height='80'>";
} else {
    $hinhanh = "Không có hình ảnh";
}
$mota = ""; // Khởi tạo biến mô tả

if ($id > 0) {
    $sanpham = loadOne_sanpham($id);
    if (is_array($sanpham) && !empty($sanpham)) {
        extract($sanpham); // Chuyển mảng thành các biến
        $mota = isset($sanpham["description"]) ? $sanpham["description"] : "";
    }
}
?>
<div class="row">
    <div class="row form_tieude">
        <h1>CẬP NHẬT LOẠI HÀNG HÓA </h1>
    </div>    
    <div class="row form_noidung">
        <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" để upload file -->
            <div class="row mb10">
               
                <select name="iddanhmuc">
                    <option value="0">Tất cả</option>
                    <?php
                    // Kiểm tra nếu danh sách danh mục tồn tại và không rỗng
                    if (!empty($list_danhmuc)) {
                        foreach ($list_danhmuc as $danhmuc) { 
                            extract($danhmuc); 
                            
                            // Kiểm tra nếu biến $sanpham tồn tại và có iddanhmuc
                            $selected = (!empty($sanpham) && isset($sanpham['iddanhmuc']) && $sanpham['iddanhmuc'] == $id) ? 'selected' : '';

                            echo '<option value="'.$id.'" '.$selected.'>'.$name.'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="row mb10">
                Tên sản phẩm<br>
                <input type="text" name="tensp" value="<?= isset($sanpham['name']) ? htmlspecialchars($sanpham['name']) : '' ?>">
            </div>
            <div class="row mb10">
                Giá<br>
                <input type="text" name="giasp" value="<?= isset($sanpham['price']) ? htmlspecialchars($sanpham['price']) : '' ?>">
            </div>
            <div class="row mb10">
                Hình ảnh<br>
                <input type="file" name="hinhanh">
                <?= $hinhanh ?>
            </div>
            <div class="row mb10">
                Mô tả<br>
                <textarea name="mota" cols="30" rows="10"><?= isset($mota) ? htmlspecialchars($mota) : "" ?></textarea>
            </div>
            <div class="row mb10">
            <input type="hidden" name="id" value="<?= $sanpham['id'] ?>">  <!-- Để lưu id sản phẩm -->
                <input type="submit" name="capnhat" value="Cập nhật">
                <input type="reset" value="Nhập lại">
                <a href="index.php?atc=listsp"> <input type="button" value="Danh sách"></a>
            </div>

            <!-- === Thông báo === -->
            <?php
                if (isset($thong_bao)) {
                    echo $thong_bao;
                }
            ?>
        </form>
    </div>
</div>