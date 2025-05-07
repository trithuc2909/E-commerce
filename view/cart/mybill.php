<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtieude">ĐƠN HÀNG CỦA BẠN</div>
            <div class="row boxnoidung cart" style="text-align: center";>
                <table>
                   <tr>
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>NGÀY ĐẶT</th>
                    <th>SỐ LƯỢNG MẶT HÀNG</th>
                    <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                    <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                  </tr>
                  <?php 
                    if(isset($list_bill)) {
                        foreach ($list_bill as $bill) {
                            extract($bill);
                            $ttdh = get_ttdh($bill['bill_status']);
                            $countsp = loadAll_cart_count($bill['id']);
                            echo '<tr>
                                    <td>DH-'.$bill['id'].'</td>
                                    <td>'.$bill['ngaydathang'].'</td>
                                    <td>'.$countsp.'</td>
                                    <td>'.$bill['total'].'</td>
                                    <td>'.$ttdh.'</td>
                                </tr>';
                        }
                    }
                  ?>
                  
                </table>
            </div>
        </div>
    </div>   
    <div class="boxphai">
        <?php include "view/boxphai.php"; ?>
    </div>     
</div>            