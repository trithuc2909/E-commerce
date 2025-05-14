<div class="row">
    <div class="row form_tieude">
        <h1>DANH SÁCH ĐƠN HÀNG</h1>
    </div>    
    <div class="searchbox">
        <!-- Font awsome -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
        <form action="index.php?act=listbill" method="post">
        <input type="text" name="keyword" id="searchbox" placeholder="Nhập mã đơn hàng">
                <button type="submit" name="listok" id="timkiem" style="margin-top: 15px;">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>   
        </form>
    </div>
    <div class="form_noidung row">
        <div class="row form_dsloai ">
        <form action="index.php?act=xoadh_multi" method="post">
        <table>
            <tr>
                <th></th>
                <th>MÃ ĐƠN HÀNG</th>
                <th>KHÁCH HÀNG</th>
                <th>SỐ LƯỢNG HÀNG</th>
                <th>NGÀY ĐẶT HÀNG</th>
                <th>GIÁ TRỊ ĐƠN HÀNG</th>
                <th>TÌNH TRẠNG</th>
                <th>THAO TÁC</th>
            </tr>
            <?php
                foreach ($list_bill as $bill) {
                    extract($bill);
                    $countsp = loadAll_cart_count($bill['id']);
                    $ttdh = get_ttdh($bill['bill_status']);
                    $suadh = "index.php?act=suadh&id=" .$id;
                    $xoadh = "index.php?act=xoadh&id=" .$id;
                    echo '<tr>
                            <td><input type="checkbox" name="id[]" value="'.$bill['id'].'"></td>
                            <td>DH-'.$bill['id'].'</td>
                            <td>'.$bill['bill_name'].'
                            <br>'.$bill['bill_email'].'
                            <br>'.$bill['bill_address'].'
                            <br>'.$bill['bill_tel'].'</td>
                            <td>'.$countsp.'</td>
                            <td>'.$bill['ngaydathang'].'</td>
                            <td><strong>'.$bill['total'].'</strong> VNĐ</td>
                            <td>'.$ttdh.'</td>
                            <td><a href="'.$suadh.'"> <input type="button" value="sửa"></a> <a href="'.$xoadh.'"><input type="button" value="xóa"></a></td>
                        </tr>';
                }
            ?>
        </table>
        </div>
        <div class="row mb10" style="margin-top: 10px">
                    <input type="button" value="Chọn tất cả" onclick="selectAll(true)">
                    <input type="button" value="Bỏ chọn tất cả" onclick="selectAll(false)">
                    <input type="submit" value="Xóa các mục đã chọn" onclick="return confirm('Bạn có chắc muốn xóa các đơn hàng đã chọn không ?')">
                </div>
        </form>
        <script>
                function selectAll(status) {
                    const checkboxes = document.querySelectorAll('input[name="id[]"]');
                    checkboxes.forEach(cb => cb.checked = status);
                }
            </script>
    </div>
    
</div>