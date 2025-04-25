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
                $xoasp_td = '<td style="padding: 15px"; cart><a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xóa"></input></a></td>';
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

    function tongdonhang() {
        $tong = 0;
        foreach ($_SESSION['mycart'] as $cart) {
            $ttien = $cart[3] * $cart[4];
            $tong+= $ttien;
        }
        return $tong;
    }
    // Hàm thêm mới bill
    function insert_bill($name, $email, $address, $telephone, $pttt, $ngaydathang, $tongdonhang){
        $sql = "INSERT INTO bill(bill_name, bill_email, bill_address, bill_tel, bill_pttt,ngaydathang, total) VALUES ('$name', '$email', '$address', '$telephone', '$pttt', '$ngaydathang', '$tongdonhang')";
        return pdo_execute_return_lastInsertId($sql);
    } 
    // Hàm thêm mới cart
    function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill){
        $sql = "INSERT INTO cart(iduser, idpro, img,name, price,soluong, thanhtien, idbill) VALUES ('$iduser', '$idpro', '$img', '$name', '$price', '$soluong', '$thanhtien', '$idbill')";
        pdo_execute($sql);
    } 
    function loadOne_bill($id) {
        $sql = "SELECT * FROM bill WHERE id = :id";
        $bill = pdo_query_one($sql, [':id' => $id]);
        
        return $bill;
    }
    //Hàm hiển thị 1 cart theo idbill
    function loadAll_cart($idbill) {
        $sql = "SELECT * FROM cart WHERE idbill = :idbill";
        $bill = pdo_query($sql, [':idbill' => $idbill]);
        
        return $bill;
    }
    // Show chi tiết bill
    function bill_chitiet($list_bill){
        global $img_path;
        $tong = 0;
        $i = 0;
        echo '<tr>
                <th style="padding: 5px;">HÌNH ẢNH</th>
                <th style="padding: 15px;">SẢN PHẨM</th>
                <th style="padding: 15px;">ĐƠN GIÁ</th>
                <th style="padding: 15px;">SỐ LƯỢNG</th>
                <th style="padding: 15px;">THÀNH TIỀN</th>
            </tr>';
        foreach ($list_bill as $cart) {
            $hinhanh = $img_path.$cart['img'];
            $tong+= $cart['thanhtien'];
        echo '<tr>
                    <td style="padding: 5px;" ><img src="'.$hinhanh.'" alt="" height = 50px></td>
                    <td style="padding: 15px;">'.$cart['name'].'</td>
                    <td style="padding: 15px;">'.$cart['price'].'</td>
                    <td style="padding: 20px;">'.$cart['soluong'].'</td>
                    <td style="padding: 20px;">'.$cart['thanhtien'].'</td>
                    </tr>';
                $i+= 1;
        }
        echo '<tr id="">
                <td colspan="4" style="font-weight: bold";>Tổng đơn hàng</td>
                <td style="padding: 20px;">'.$tong.'</td>
                </tr>';
    }

?>