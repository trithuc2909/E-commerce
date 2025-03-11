<div class="row">
    <div class="row form_tieude">
        <h1>THÊM MỚI SẢN PHẨM </h1>
    </div>    
    <div class="row form_noidung">
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" để upload file -->
            <div class="row mb10">
                Danh mục<br>
                <select name="iddanhmuc" >
                    <?php
                        foreach ($list_danhmuc as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value="'.$id.'">'.$name.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="row mb10">
                Tên sản phẩm<br>
                <input type="text" name="tensp" autocomplete="off">
            </div>
            <div class="row mb10">
                Giá<br>
                <input type="text" name="giasp" autocomplete="off">
            </div>
            <div class="row mb10">
                Hình ảnh<br>
                <input type="file" name="hinhanh" id="">
            </div>
            <div class="row mb10">
                Mô tả<br>
                <textarea name="mota" cols="30" rows="10"></textarea>
            </div>
            <div class="row mb10">
                <input type="submit" name="themmoi" value="Thêm mới">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listsp"> <input type="button" value="Danh sách"></a>
            </div>

            <!-- === Thông báo === -->
            <?php
                if(isset($thong_bao) ){
                    echo $thong_bao;
                }
            ?>
        </form>
    </div>
</div>