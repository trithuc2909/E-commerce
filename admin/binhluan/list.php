<div class="row">
            <div class="row form_tieude">
                <h1>DANH SÁCH TÀI KHOẢN</h1>
            </div>    
            <div class="row form_noidung">
                <div class="row mb10 form_dsloai">
            <form action="index.php?act=xoabl_multi" method="post">
                    <table>
                        <tr>
                            <th></th> <!--Tiêu đề <th> -->
                            <th>ID</th> <!-- Nội dung bên trong sẽ in đậm-->
                            <th>NỘI DUNG BÌNH LUẬN</th>
                            <th>IDUSER</th>
                            <th>IDPRO</th>
                            <th>NGÀY BÌNH LUẬN</th>
                            <th></th>
                        </tr>
                        <?php
                            foreach($list_binhluan as $binhluan) { // Duyệt mảng list_danhmuc
                                extract($binhluan); // Tạo ra các biến tên $id, $name
                                $xoabl = "index.php?act=xoabl&id=" .$id;

                                echo '<tr>
                                        <td><input type="checkbox" name="id[]" value="'.$id.'"> </td>
                                        <td>'.$id.'</td>
                                        <td>'.$noidung.'</td>
                                        <td>'.$iduser.'</td>
                                        <td>'.$idpro.'</td>
                                        <td>'.$ngaybinhluan.'</td>
                                        <td><a href="'.$xoabl.'"><input type="button" value="xóa"></a></td>
                                    </tr>';
                            }
                        ?>
                    </table>
                </div>
                <div class="row mb10">
                    <input type="button" value="Chọn tất cả" onclick="selectAll(true)">
                    <input type="button" value="Bỏ chọn tất cả" onclick="selectAll(false)">
                    <input type="submit" value="Xóa các mục đã chọn" onclick="return confirm('Bạn có chắc muốn xóa các bình luận đã chọn không ?')">
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