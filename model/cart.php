<?php 
    function viewcart($del) {
        global $img_path;
        $tong = 0;
        $i = 0;
        if ($del == 1) {
            $xoasp_th = '<th style="padding: 15px; ">THAO TÁC</th>';
        
        } else {
            $xoasp_th = "";
            $xoasp_td = "";
        }
        echo '<tr>
                <th style="padding: 5px;">HÌNH ẢNH</th>
                <th style="padding: 15px;">SẢN PHẨM</th>
                <th style="padding: 15px;">ĐƠN GIÁ</th>
                <th style="padding: 15px;">SỐ LƯỢNG</th>
                <th style="padding: 15px;">THÀNH TIỀN</th>
                '.$xoasp_th.'
            </tr>';
        foreach ($_SESSION['mycart'] as $cart) {
            $hinhanh = $img_path.$cart[2];
            $ttien = $cart[3] * $cart[4];
            $tong+= $ttien;
            if ($del == 1) {
                $xoasp_td = '<td style="padding: 15px"; cart><a href="index.php?act=delcart&idcart='.$i.'"><button type="button">Xóa</button></a></td>';
            } else {
                $xoasp_th = "";
                $xoasp_td = "";
            }
        echo '<tr>
                    <td style="padding: 5px;" ><img src="'.$hinhanh.'" alt="" height = 50px></td>
                    <td style="padding: 15px;">'.$cart[1].'</td>
                    <td style="padding: 15px;">'.$cart[3].'</td>
                    <td style="padding: 20px;">'.$cart[4].'</td>
                    <td style="padding: 20px;">'.$ttien.'</td>
                    '.$xoasp_td.'
                    </tr>';
                $i+= 1;
        }
        echo '<tr id="">
                <td colspan="4" style="font-weight: bold";>Tổng đơn hàng</td>
                <td style="padding: 20px;">'.$tong.'</td>
                <td></td>
                </tr>';
    }
?>