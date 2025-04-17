<div class="row">
            <div class="row form_tieude">
                <h1>DANH SÁCH TÀI KHOẢN</h1>
            </div>    
            <div class="row form_noidung">
                <div class="row mb10 form_dsloai">
                    <table>
                        <tr>
                            <th></th> <!--Tiêu đề <th> -->
                            <th>ID</th> <!-- Nội dung bên trong sẽ in đậm-->
                            <th>TÊN ĐĂNG NHẬP</th>
                            <th>MẬT KHẨU</th>
                            <th>EMAIL</th>
                            <th>ĐỊA CHỈ</th>
                            <th>ĐIỆN THOẠI</th>
                            <th>VAI TRÒ</th>
                            <th></th>
                        </tr>
                        <?php
                            foreach($list_taikhoan as $taikhoan) { // Duyệt mảng list_danhmuc
                                extract($taikhoan); // Tạo ra các biến tên $id, $name
                                $suatk = "index.php?act=suatk&id=" .$id;
                                $xoatk = "index.php?act=xoatk&id=" .$id;

                                echo '<tr>
                                        <td><input type="checkbox" name="" id=""> </td>
                                        <td>'.$id.'</td>
                                        <td>'.$user.'</td>
                                        <td>'.$password.'</td>
                                        <td>'.$email.'</td>
                                        <td>'.$address.'</td>
                                        <td>'.$telephone.'</td>
                                        <td>'.$role.'</td>
                                        <td><a href="'.$suatk.'"> <input type="button" value="sửa"></a> <a href="'.$xoatk.'"><input type="button" value="xóa"></a></td>
                                    </tr>';

                            }
                        ?>
                    </table>
                </div>
                <div class="row mb10">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn">
                    <a href="index.php?act=listtk"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>
        </div>