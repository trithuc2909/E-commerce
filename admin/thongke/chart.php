<div class="row">
    <div id="piechart" style="width: 100%; height: 500px;"></div>

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
        const chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
    </script>
</div>
