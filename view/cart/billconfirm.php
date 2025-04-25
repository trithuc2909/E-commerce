<div class="row mb">
            <div class="boxtrai mr">
                <div class="row mb">
                    <div class="boxtieude">CẢM ƠN</div>
                    <div class=" row boxnoidung3 camondathang" style="text-align: center";>
                        <h2>Cảm ơn quý khách đã đặt hàng</h2>
                    </div>
                </div>
                <?php
                    if(isset($bill) && (is_array($bill))) {
                        extract($bill);
                    }
                ?>
                <div class="row mb">
                    <div class="boxtieude">THÔNG TIN ĐƠN HÀNG</div>
                    <div class=" row boxnoidung-ttdh thongtin_dh" style="text-align: center";>
                       <ul>
                        <li><span>Mã đơn hàng:</span> DH-<?=$bill['id'];?></li>
                        <li><span>Ngày đặt hàng:</span> <?=$bill['ngaydathang'];?></li> 
                        <li><span>Tổng đơn hàng:</span> <?=$bill['total'];?></li>
                        <li><span>Phương thức thanh toán:</span> <?=$bill['bill_pttt'];?></li>
                       </ul>
                    </div>
                </div>
                <div class="row mb">
                    <div class="boxtieude">THÔNG TIN NGƯỜI ĐẶT HÀNG</div>
                    <div class=" row boxnoidung billconfirm">
                        <table class="table-bill">
                            <tr>
                                <td style ="font-weight: bold;">Người đặt hàng: </td>
                                <td><?=$bill['bill_name']?></td>
                            </tr>
                            <tr>
                                <td style ="font-weight: bold;">Địa chỉ: </td>
                                <td><?=$bill['bill_address']?></td>
                            </tr>
                            <tr>
                                <td style ="font-weight: bold;">Email: </td>
                                <td><?=$bill['bill_email']?></td>
                            </tr>
                            <tr>
                                <td style ="font-weight: bold;">Điện thoại: </td>
                                <td><?=$bill['bill_tel']?></td>
                            </tr>
                            <tr>
                                <td style ="font-weight: bold;">Ngày đặt hàng: </td>
                                <td><?=$bill['ngaydathang']?></td>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="row mb">
                    <div class="boxtieude">CHI TIẾT GIỎ HÀNG</div>
                    <div class=" row boxnoidung billconfirm">
                        <table>
                            <?php 
                                bill_chitiet($billct);
                            ?>
                        </table>
                    </div>
                </div>
                <a class="bill" href="index.php"> <input type="button" value="Về trang chủ"></a>
            </div>
            <div class="boxphai">
                <?php 
                    include "view/boxphai.php";
                ?>
            </div>
</div>