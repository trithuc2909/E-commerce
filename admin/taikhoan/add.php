<div class="row">
    <div class="row form_tieude">
        <h1>THÊM MỚI TÀI KHOẢN </h1>
    </div>    
    <div class="row form_noidung">
        <form action="index.php?act=addtk" method="post">
            <div class="row mb10">
                Mã tài khoản (Không cần nhập)<br>
                <input type="text" name="matk">
            </div>
            <div class="row mb10">
                Tên tài khoản<br>
                <input type="text" name="user" autocomplete="off">
            </div>
            <div class="row mb10">
                Mật khẩu<br>
                <input type="text" name="password" autocomplete="off">
            </div>
            <div class="row mb10">
                Email<br>
                <input type="text" name="email" autocomplete="off">
            </div>
            <div class="row mb10">
                Địa chỉ<br>
                <input type="text" name="address" autocomplete="off">
            </div>
            <div class="row mb10">
                Số điện thoại<br>
                <input type="text" name="telephone" autocomplete="off">
            </div>
            <div class="row mb10">
                Vai trò<br>
                <input type="text" name="role" autocomplete="off">
            </div>
            <div class="row mb10">
                <input type="submit" name="themmoi" value="Thêm mới">
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