<?php
    if (is_array($danhmuc)){
        extract($danhmuc); // Chuyển mảng thành các biến
    }
?>
<div class="row">
    <div class="row form_tieude">
        <h1>CẬP NHẬT LOẠI HÀNG HÓA </h1>
    </div>    
    <div class="row form_noidung">
        <form action="index.php?act=updatedm" method="post">
            <div class="row mb10">
                Mã loại<br>
                <input type="text" name="maloai">
            </div>
            <div class="row mb10">
                Tên loại<br>
                <input type="text" name="tenloai" autocomplete="off" value="<?php if(isset($name)&&($name !="")) echo $name ;?>">  <!-- Thêm value để hiển thị giá trị cũ -->
                                                         <!-- Nếu tồn tại $name thì hiển thị giá trị cũ, ngược lại thì để trống -->
            </div> 
            <div class="row mb10">
                <input type="hidden" name="id" value="<?php if(isset($id)&&($id > 0)) echo $id ;?>"> <!-- Thêm input hidden để lưu id -->
                <input type="submit" name="capnhat" value="Cập nhật">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listdm"> <input type="button" value="Danh sách"></a>
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