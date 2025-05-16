<h1>Control Panel</h1>
<div class="row form_noidung" style="margin-top: -20px;">
    <div class="row mb10 form_dsloai1">
<!-- SẢN PHẨM MỚI -->
 <div style="display: flex; gap: 20px;">
<table>
    <tr>
        <th colspan = "4">SẢN PHẨM MỚI</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>TÊN SẢN PHẨM</th>
        <th>HÌNH ẢNH</th>
        <th>GIÁ</th>
    </tr>
    <tr>
        <?php
            // Gọi hàm lấy sản phẩm mới
            $sanpham_moi = load_sanpham_moi();
            foreach ($sanpham_moi as $sp) {
                extract($sp);
                $hinhanhpath = "../upload/" .$img; // Đường dẫn hình ảnh
                if (is_file($hinhanhpath)) {
                    $hinhanh = "<img src='".$hinhanhpath."' height='80'>";
                } else {
                    $hinhanh = "Không có hình ảnh";
                }
                echo'<tr>
                    <td style="padding-left: 25px;">'.$id.'</td>
                    <td style="padding-left: 35px;">'.$name.'</td>
                    <td style="padding-left: 35px;">'.$hinhanh.'</td>
                    <td style="padding-left: 35px;">'.$price.'</td>
                    </tr>';
            }
        ?>
    </tr>
</table>

<!-- SẢN PHẨM XEM NHIỀU NHẤT  -->
<table>
    <tr>
        <th colspan = "5">SẢN PHẨM NHIỀU LƯỢT XEM</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>TÊN SẢN PHẨM</th>
        <th>HÌNH ẢNH</th>
        <th>GIÁ</th>
        <th>LƯỢT XEM</th>
    </tr>
    <tr>
        <?php
            // Gọi hàm lấy sản phẩm mới
            $sanpham_top1_view = loadAll_sanpham_top_view();
            foreach ($sanpham_top1_view as $sp) {
                extract($sp);
                $hinhanhpath = "../upload/" .$img; // Đường dẫn hình ảnh
                if (is_file($hinhanhpath)) {
                    $hinhanh = "<img src='".$hinhanhpath."' height='80'>";
                } else {
                    $hinhanh = "Không có hình ảnh";
                }
                echo'<tr>
                    <td style="padding-left: 15px;">'.$id.'</td>
                    <td style="padding-left: 30px;">'.$name.'</td>
                    <td style="padding-left: 25px;">'.$hinhanh.'</td>
                    <td style="padding-left: 30px;">'.$price.'</td>
                    <td style="padding-left: 35px;">'.$view.'</td>
                    </tr>';
            }
        ?>
    </tr>
</table>
</div>
<br>
<!-- BÌNH LUẬN MỚI NHẤT  -->
 <div style="display: flex; gap: 20px;"> 
<table   style="width: 50%;">
    <tr>
        <th colspan = "4">BÌNH LUẬN MỚI</th>
    </tr>
    <tr>
        <th>IDUSER</th>
        <th>NỘI DUNG</th>
        <th>IDPRO</th>
        <th>NGÀY BÌNH LUẬN</th>
    </tr>
    <tr>
        <?php
            // Gọi hàm lấy sản phẩm mới
            $binhluan_moi = loadAll_binhluan_moi();
            foreach ($binhluan_moi as $bl) {
                extract($bl);
                echo'<tr>
                    <td style="padding-left: 25px;">'.$iduser.'</td>
                    <td style="padding-left: 25px;">'.$noidung.'</td>
                    <td style="padding-left: 25px;">'.$idpro.'</td>
                    <td style="padding-left: 35px;">'.$ngaybinhluan.'</td>
                    </tr>';
            }
        ?>
    </tr>
</table>
<!-- ĐƠN HÀNG MỚI  -->
 <table   style="width: 50%;">
    <tr>
        <th colspan = "4">ĐƠN HÀNG MỚI</th>
    </tr>
    <tr>
        <th>MÃ ĐH</th>
        <th>CI</th>
        <th>NGÀY ĐẶT HÀNG</th>
        <th>TÌNH TRẠNG</th>
    </tr>
    <tr>
        <?php
            // Gọi hàm lấy sản phẩm mới
            $donhang_moi = loadAll_donhang_moi();
            foreach ($donhang_moi as $dh) {
                extract($dh);
                $ttdh = get_ttdh($dh['bill_status']);
                echo'<tr>
                    <td style="padding-left: 20px;">'.$id.'</td>
                    <td style="padding-left: 25px;">'.$bill_name.'<br>
                    '.$bill_address.'<br> '.$bill_tel.'
                    </td>
                    <td style="padding-left: 20px;">'.$ngaydathang.'</td>
                    <td style="padding-left: 25px;">'.$ttdh.'</td>
                    </tr>';
            }
        ?>
    </tr>
</table>
</div>
<br>
<table style="width: 100%">
    <tr>
        <th>BIỂU ĐỒ</th>
    </tr>
    <tr>
    <td colspan="1">
    <div id="piechart" style="width: 100%; height: 500px;"></div>
    </td>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    // Load google charts
    google.charts.load('current',{packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Draw the chart and set the chart values
        const data = google.visualization.arrayToDataTable([
            ['Danh mục', 'Số lượng sản phẩm'],
            <?php 
                $tongdm = count($list_thongke);
                $i = 1;
                foreach ($list_thongke as $thongke) {
                    extract($thongke);
                    $dauphay = ($i == $tongdm) ? "" : ",";
                    echo "['".$tendm."', ".$countsp."]".$dauphay;
                    $i++;
                }
            ?>
        ]);

        // Set Options
        const options = {
            title: 'Thống kê số lượng sản phẩm theo danh mục',
            is3D: true
        };

        // Draw
        const chart = new google.visualization.BarChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
    </script>
</div>
    </tr>
</table>
    </div>
</div>
