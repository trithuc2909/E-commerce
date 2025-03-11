<div class="row">
            <div class="row form_tieude mb">
                <h1>DANH SÁCH LOẠI HÀNG</h1>
            </div>    
            <form action="index.php?act=listsp" method="post">
                <input type="text" name="keyword" autocomplete="off"> 
                <select name="iddanhmuc">
                    <option value="0" selected>Tất cả</option>
                    <?php
                        foreach ($list_danhmuc as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value="'.$id.'">'.$name.'</option>';
                        }
                    ?>
                </select>
                <input type="submit" name="listok" value="Tìm kiếm">
            </form>
            <div class="row form_noidung">
                <div class="row mb10 form_dsloai">
                    
                    <table>
                        <tr>
                            <th></th> <!--Tiêu đề <th> -->
                            <th>MÃ LOẠI</th> <!-- Nội dung bên trong sẽ in đậm-->
                            <th>TÊN SẢN PHẨM</th>
                            <th>HÌNH ẢNH</th>
                            <th>GIÁ</th>
                            <th>LƯỢT XEM</th>
                            <th></th>
                        </tr>
                        <?php
                            foreach($list_sanpham as $sanpham) { // Duyệt mảng list_sanpham
                                extract($sanpham); // Tạo ra các biến tên $id, $name
                                $suasp = "index.php?act=suasp&id=" .$id;
                                $xoasp = "index.php?act=xoasp&id=" .$id;
                                $hinhanhpath = "../upload/" .$img; // Đường dẫn hình ảnh
                                if (is_file($hinhanhpath)) {
                                    $hinhanh = "<img src='".$hinhanhpath."' height='80'>";
                                } else {
                                    $hinhanh = "Không có hình ảnh";
                                }

                                echo '<tr>
                                        <td><input type="checkbox" name="" id=""> </td>
                                        <td>'.$id.'</td>
                                        <td>'.$name.'</td>
                                        <td>'.$hinhanh.'</td>
                                        <td>'.$price.'</td>
                                        <td>'.$view.'</td>
                                        <td><a href="'.$suasp.'"> <input type="button" value="sửa"></a> <a href="'.$xoasp.'"><input type="button" value="xóa"></a></td>
                                    </tr>';

                            }
                        ?>
                    </table>
                </div>
                <div class="row mb10">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn">
                    <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>
        </div>