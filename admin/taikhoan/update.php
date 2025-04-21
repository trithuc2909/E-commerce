<?php
    if (is_array($taikhoan)){
        extract($taikhoan); // Chuyển mảng thành các biến
    }
?>
<div class="row">
    <div class="row form_tieude">
        <h1>CẬP NHẬT TÀI KHOẢN </h1>
    </div>    
    <div class="row form_noidung">
        <form action="index.php?act=updatetk" method="post">
            <div class="row mb10">
                Tên đăng nhập<br>
                <input type="text" name="user" value="<?=$user?>">
            </div>
            <div class="row mb10">
                Mật khẩu<br>
                <input type="text" name="password" value="<?=$password?>">
            </div>
            <div class="row mb10">
                Email<br>
                <input type="text" name="email" value="<?=$email?>">
                <?php if (isset($loi['email'])) echo $loi['email']; ?>
            </div>
            <div class="row mb10">
                Địa chỉ<br>
                <input type="text" name="address" value="<?=$address?>">
            </div>
            <div class="row mb10">
                Số điện thoại<br>
                <input type="text" name="telephone" value="<?=$telephone?>">
                <?php if (isset($loi['telephone'])) echo $loi['telephone']; ?>
            </div>
            <div class="row mb10">
                Vai trò<br>
                <input type="text" name="role" value="<?=$role?>">
            </div>
            <div class="row mb10">
                <input type="hidden" name="id" value="<?=$id?>"> <!-- Thêm input hidden để lưu id -->
                <input type="submit" name="capnhat" value="Cập nhật">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=dskh"> <input type="button" value="Danh sách"></a>
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