<div class="row mb">
            <div class="boxtrai mr">
                <div class="row mb">
                    <div class="boxtieude">GIỎ HÀNG</div>
                    <div class=" row boxnoidung cart">
                    <table>
                        <tr>
                            <th style="padding: 5px;">HÌNH ẢNH</th>
                            <th style="padding: 20px;">SẢN PHẨM</th>
                            <th style="padding: 15px;">ĐƠN GIÁ</th>
                            <th style="padding: 15px;">SỐ LƯỢNG</th>
                            <th style="padding: 15px;">THÀNH TIỀN</th>
                            <th style="padding: 15px;">THAO TÁC</th>
                        </tr>
                        <?php 
                            $tong = 0;
                            $i = 0;
                            foreach ($_SESSION['mycart'] as $cart) {
                                $hinhanh = $img_path.$cart[2];
                                $ttien = $cart[3] * $cart[4];
                                $tong+= $ttien;
                                $xoacart = '<a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="xóa"></a>';
                                echo '<tr>
                                        <td style="padding: 5px;"><img src="'.$hinhanh.'" alt="" height = 50px></td>
                                        <td style="padding: 20px;">'.$cart[1].'</td>
                                        <td style="padding: 15px;">'.$cart[3].'</td>
                                        <td style="padding: 15px;">'.$cart[4].'</td>
                                        <td style="padding: 15px;">'.$ttien.'</td>
                                        <td style="padding: 30px;">'.$xoacart.'</td>
                                     </tr>';
                                    $i+= 1;
                            }
                            echo '<tr id="">
                                    <td colspan="4"> Tổng đơn hàng</td>
                                    <td style="padding: 15px;">'.$tong.'</td>
                                    <td></td>
                                 </tr>';
                        ?>
                    </table>
                    </div>
                </div>
              <div class="row mb bill">
                    <a href="index.php?act=bill"><input type="button" value="Đồng ý đặt hàng"></a> <a href="index.php?act=delcart"> <input type="button" value="Xóa giỏ hàng"></a>
              </div>
            </div>
            <div class="boxphai">
                <?php 
                    include "view/boxphai.php";
                ?>
            </div>
</div>