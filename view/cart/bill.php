<div class="row mb">
    <div class="boxtrai mr">
     <form action="index.php?act=billconfirm" method="post">
        <div class="row mb">
            <div class="boxtieude">THÔNG TIN ĐẶT HÀNG</div>
            <div class="boxnoidung row billform">
                <?php
                    if(isset($_SESSION['user'])) {
                        $name = $_SESSION['user']['user'];
                        $address = $_SESSION['user']['address'];
                        $email = $_SESSION['user']['email'];
                        $telephone = $_SESSION['user']['telephone'];
                    } else {
                        $name = "";
                        $address = "";
                        $email = "";
                        $telephone = "";
                    }
                ?>
                <table>
                    <tr>
                        <td>Người đặt hàng</td>
                        <td style="padding-left: 100px;"><input type="text" name="name" value="<?=$name?>" class="input-bill"></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td style="padding-left: 100px;"><input type="text" name="address" value="<?=$address?>" class="input-bill"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td style="padding-left: 100px;"><input type="text" name="email" value="<?=$email?>" class="input-bill"></td>
                    </tr>
                    <tr>
                        <td>Điện thoại</td>
                        <td style="padding-left: 100px;"><input type="text" name="telephone" value="<?=$telephone?>" class="input-bill"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mb">
         <div class="boxtieude">PHƯƠNG THỨC THANH TOÁN</div>
            <div class="boxnoidung-pttt row">
                <table>
                    <tr>
                        <td><input type="radio" name="pttt" checked value="1">Thanh toán khi nhận hàng</td>
                        <td><input type="radio" name="pttt" value="2">Chuyển khoản ngân hàng</td>
                        <td><input type="radio" name="pttt" value="3">Thanh toán online</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mb">
        <div class="boxtieude">THÔNG TIN GIỎ HÀNG</div>
            <div class="boxnoidung row cart">
                <table>
                    <tr>
                    <?php 
                        viewcart(0);
                    ?>
                </table>
            </div>
        </div>
        <div class="row mb bill">
            <input type="submit" value="Đồng ý đặt hàng" name="dongydathang"></input>
        </div>
    </div>

    <div class="boxphai">
        <?php include "view/boxphai.php"; ?>
    </div>
</div>
