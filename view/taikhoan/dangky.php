<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtieude">ĐĂNG KÝ THÀNH VIÊN</div>
            <div class="boxnoidung row formdangky">
                <!-- Nội dung đăng ký thành viên -->
                 <form action="index.php?act=dangky" method="post">
                 <div class="row mb10 ">
                    <div> <label>Email</label></div>
                    <input type="email" name="email">
                </div>    
                <div class="row mb10"> 
                    <div> <label>Tên đăng nhập</label></div>
                    <input type="text" name="user">
                </div>
                <div class="row mb10"> 
                    <div> <label>Mật khẩu</label></div>
                    <input type="password" name="pass">
                </div>
                    <input type="submit" value="Đăng ký" name="dangky">
                 </form>
                 <h1 class="thongbao">
                    <?php

                    if (isset($thongbao)&&($thongbao!="")) {
                        echo $thongbao;
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
