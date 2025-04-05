<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtieude">ĐĂNG KÝ THÀNH VIÊN</div>
            <div class="boxnoidung row formdangky">
                <?php
                    if(isset($_SESSION['user'])&& (is_array($_SESSION['user']))) {
                        extract($_SESSION['user']);
                    }
                ?>
                <!-- Nội dung đăng ký thành viên -->
                 <form action="index.php?act=edit_taikhoan" method="post">
                 <div class="row mb10 ">
                    <div> <label>Email</label></div>
                    <input type="email" name="email" value="<?=$email?>">
                </div>    
                <div class="row mb10"> 
                    <div> <label>Tên đăng nhập</label></div>
                    <input type="text" name="user" value="<?=$user?>">
                </div>
                <div class="row mb10"> 
                    <div> <label>Mật khẩu</label></div>
                    <input type="password" name="password" value="<?=$password?>">
                </div>
                <div class="row mb10"> 
                    <div> <label>Địa chỉ</label></div>
                    <input type="text" name="address" value="<?=$address?>">
                </div>
                <div class="row mb10"> 
                    <div> <label>Điện thoại</label></div>
                    <input type="text" name="telephone" value="<?=$telephone?>">
                </div>
                    <input type="submit" value="Cập nhật" name="capnhat">
                    <input type="hidden" name="id" value="<?=$id?>">  <!-- Tạo id hidden để cập nhật tài khoản -->
                 </form>
                 <h1 class="thongbao_taikhoan"> 
                    <?php

                    if (isset($thongbao_taikhoan)&&($thongbao_taikhoan!="")) {
                        echo $thongbao_taikhoan;
                    }
                    ?>
                </h1>

            </div>
        </div>
    </div>

    <div class="boxphai">
        <?php include "view/boxphai.php"; ?>
    </div>
</div>
