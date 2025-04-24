<div class="row mb">
            <div class="boxtrai mr">
                <div class="row mb">
                    <div class="boxtieude">GIỎ HÀNG</div>
                    <div class=" row boxnoidung cart">
                    <table>
                        <?php 
                            viewcart(1); // gọi hàm viết trong model
                        ?>
                    </table>
                    </div>
                </div>
              <div class="row mb bill">
                    <a href="index.php?act=bill"><input type="button" value="Tiếp tục đặt hàng"></a> <a href="index.php?act=delcart"> <input type="button" value="Xóa giỏ hàng"></a>
              </div>
            </div>
            <div class="boxphai">
                <?php 
                    include "view/boxphai.php";
                ?>
            </div>
</div>