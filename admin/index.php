<?php
    include "header.php";
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";

    //Controller Danh mục
    if(isset($_GET["act"])){
        $act = $_GET["act"]; // Tạo 1 biến act để lấy giá trị từ URL
        switch ($act) {
            case 'adddm':
                //Kiểm tra xem người dùng có click vào nút thêm mới hay không
                if (isset($_POST["themmoi"])) {
                    $tenloai = trim($_POST["tenloai"]); // Lấy dữ liệu & xóa khoảng trắng
    
                    if (!empty($tenloai)) { 
                        // 1️⃣ Kiểm tra tên loại đã tồn tại hay chưa
                        $sql_check = "SELECT COUNT(*) FROM danhmuc WHERE name = '$tenloai'";
                        $count = pdo_query_value($sql_check); // Lấy số lượng kết quả
    
                        if ($count > 0) {
                            // Nếu tên loại đã tồn tại
                            $thong_bao = "<p style='color: red;'>Tên loại đã tồn tại!</p>";
                        } else {
                            // Nếu tên loại chưa tồn tại, thêm vào CSDL
                            insert_danhmuc($tenloai);
                            $thong_bao = "<p style='color: green;'>Thêm mới thành công</p>";
                        }
                    } else {
                        $thong_bao = "<p style='color: red;'>Vui lòng nhập tên loại</p>";
                    }
                }

                include "danhmuc/add.php";
                break;
            case 'listdm':
                $list_danhmuc = loadAll_danhmuc(); // Gọi hàm loadAll_danhmuc() để lấy danh sách loại hàng hóa

                include "danhmuc/list.php";
                break;
            case 'xoadm':
                if(isset($_GET["id"]) && ($_GET["id"] > 0)){
                    delete_danhmuc($_GET["id"]);
                }
                //Sau khi xóa xong thì gọi lại trang list.php để hiển thị danh sách mới
                $list_danhmuc = loadAll_danhmuc(); 

                include "danhmuc/list.php";
                break;
            case 'suadm':
                if(isset($_GET["id"]) && ($_GET["id"] > 0)){
                    $danhmuc = loadOne_danhmuc($_GET["id"]);
                }
                include "danhmuc/update.php";
                break;
            case 'updatedm':
                if (isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai = ($_POST["tenloai"]);
                    $id = $_POST["id"];
                    if (!empty($tenloai)) {
                        update_danhmuc($id, $tenloai);
                        $thong_bao = "<p style='color: green;'>Cập nhật thành công</p>";
                    } else {
                        $thong_bao = "<p style='color: red;'>Vui lòng nhập tên loại</p>";
                    }
                }     
                //Sau khi update xong thì gọi lại trang list.php để hiển thị danh sách mới
                $list_danhmuc = loadAll_danhmuc(); 
                include "danhmuc/list.php";
                break;
            




            // Controller Sản phẩm
            case 'addsp':
                //Kiểm tra xem người dùng có click vào nút thêm mới hay không
                if (isset($_POST["themmoi"])) {
                    $tensp = trim($_POST["tensp"]); // Lấy dữ liệu & xóa khoảng trắng
                    $giasp = trim($_POST["giasp"]);
                    $mota = trim($_POST["mota"]);
                    $filename=$_FILES["hinhanh"]["name"]; // Lấy tên file
                    $target_dir = "upload/";
                    $target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
                    if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                    }

                    if (!empty($tenloai)) { 
                        $sql_check = "SELECT COUNT(*) FROM sanpham WHERE name = '$tenloai'";
                        $count = pdo_query_value($sql_check); // Lấy số lượng kết quả
    
                        if ($count > 0) {
                            // Nếu tên loại đã tồn tại
                            $thong_bao = "<p style='color: red;'>Tên loại đã tồn tại!</p>";
                        } else {
                            // Nếu tên loại chưa tồn tại, thêm vào CSDL
                            insert_sanpham($tensp, $giasp,$filename, $mota);
                            $thong_bao = "<p style='color: green;'>Thêm mới thành công</p>";
                        }
                    } else {
                        $thong_bao = "<p style='color: red;'>Vui lòng nhập tên loại</p>";
                    }
                }
                $list_danhmuc = loadAll_danhmuc(); 
                include "sanpham/add.php";
                break;
            case 'listsp':
                $list_sanpham = loadAll_sanpham(); // Gọi hàm loadAll_sanpham() để lấy danh sách loại sản phẩm

                include "sanpham/list.php";
                break;
            case 'xoasp':
                if(isset($_GET["id"]) && ($_GET["id"] > 0)){
                    delete_sanpham($_GET["id"]);
                }
                //Sau khi xóa xong thì gọi lại trang list.php để hiển thị danh sách mới
                $list_sanpham = loadAll_sanpham(); 

                include "sanpham/list.php";
                break;
            case 'suasp':
                if(isset($_GET["id"]) && ($_GET["id"] > 0)){
                    $sanpham = loadOne_sanpham($_GET["id"]);
                }
                include "sanpham/update.php";
                break;
            case 'updatesp':
                if (isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai = ($_POST["tenloai"]);
                    $id = $_POST["id"];
                    if (!empty($tenloai)) {
                        update_sanpham($id, $tenloai);
                        $thong_bao = "<p style='color: green;'>Cập nhật thành công</p>";
                    } else {
                        $thong_bao = "<p style='color: red;'>Vui lòng nhập tên loại</p>";
                    }
                }     
                //Sau khi update xong thì gọi lại trang list.php để hiển thị danh sách mới
                $list_sanpham = loadAll_sanpham(); 
                include "sanpham/list.php";
                break;    

                default:
                include "home.php";
                break;
        }
    } else{
        include "home.php";
    }

    include "footer.php";
?>    
