<div class="row">
            <div class="row form_tieude">
                <h1>DANH SÁCH LOẠI HÀNG</h1>
            </div>    
            <div class="row form_noidung">
                <div class="row mb10 form_dsloai">
                <form action="index.php?act=xoadm_multi" method="post">
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
                                        <td><input type="checkbox" name="id[]" id=""> </td>
                                        <td>'.$id.'</td>
                                        <td>'.$name.'</td>
                                        <td><a href="'.$suadm.'"> <input type="button" value="sửa"></a> <a href="'.$xoadm.'"><input type="button" value="xóa"></a></td>
                                    </tr>';

                            }
                        ?>
                    </table>
                </div>
                <div class="row mb10">
                    <input type="button" value="Chọn tất cả" onclick="selectAll(true)">
                    <input type="button" value="Bỏ chọn tất cả" onclick="selectAll(false)">
                    <input type="submit" value="Xóa các mục đã chọn" onclick="return confirm('Bạn có chắc muốn xóa các bình luận đã chọn không ?')">
                    <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
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