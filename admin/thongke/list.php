<div class="row">
            <div class="row form_tieude">
                <h1>DANH SÁCH THỐNG KÊ</h1>
            </div>    
            <div class="row form_noidung">
                <div class="row mb10 form_dsloai">
                    <table>
                        <tr>
                            <th>MÃ DANH MỤC</th>
                            <th>TÊN DANH MỤC</th>
                            <th>SỐ LƯỢNG</th>
                            <th>GIÁ CAO NHẤT</th>
                            <th>GIÁ THẤP NHẤT</th>
                            <th>GIÁ TRUNG BÌNH</th>
                        </tr>
                        <?php 
                            foreach ($list_thongke as $thongke) {
                                extract($thongke);
                                echo '<tr>
                                        <td>'.$madm.'</td>
                                        <td>'.$tendm.'</td>
                                        <td>'.$countsp.'</td>
                                        <td>'.$maxprice.'</td>
                                        <td>'.$minprice.'</td>
                                        <td>'.$avgprice.'</td>
                                    </tr>';
                            }
                        ?>

                    </table>
                </div>
               <div class="row mb10">
                    <a href ="index.php?act=chart"> <input type="button" value="Xem biểu đồ"></a>
               </div> 
            </div>
</div>                