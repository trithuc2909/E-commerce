<div class="row">
            <div class="row form_tieude">
                <h1>DANH SÁCH LOẠI HÀNG</h1>
            </div>    
            <div class="row form_noidung">
                <div class="row mb10 form_dsloai">
                    <table>
                        <tr>
                            <th></th> <!--Tiêu đề <th> -->
                            <th>MÃ LOẠI</th> <!-- Nội dung bên trong sẽ in đậm-->
                            <th>TÊN LOẠI</th>
                            <th></th>
                        </tr>
                        <?php
                            foreach($list_danhmuc as $danhmuc) { // Duyệt mảng list_danhmuc
                                extract($danhmuc); // Tạo ra các biến tên $id, $name
                                $suadm = "index.php?act=suadm&id=" .$id;
                                $xoadm = "index.php?act=xoadm&id=" .$id;

                                echo '<tr>
                                        <td><input type="checkbox" name="" id=""> </td>
                                        <td>'.$id.'</td>
                                        <td>'.$name.'</td>
                                        <td><a href="'.$suadm.'"> <input type="button" value="sửa"></a> <a href="'.$xoadm.'"><input type="button" value="xóa"></a></td>
                                    </tr>';

                            }
                        ?>
                    </table>
                </div>
                <div class="row mb10">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn">
                    <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>
        </div>