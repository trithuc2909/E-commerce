<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtieude">QUÊN MẬT KHẨU</div>
            <div class="boxnoidung row formdangky">
                <!-- Nội dung đăng ký thành viên -->
                 <form action="index.php?act=quenmk" method="post">
                 <div class="row mb10 ">
                    <div> <label>Email</label></div>
                    <input type="email" name="email">
                </div>    
                    <input type="submit" value="Gửi" name="guiemail">
                 </form>
                <?php
                    if(isset($thongbaoemail)) {
                        echo "<h3 style='color: red;'>$thongbaoemail</h3>";
                    }
                ?>

            </div>
        </div>
    </div>

    <div class="boxphai">
        <?php include "view/boxphai.php"; ?>
    </div>
</div>
