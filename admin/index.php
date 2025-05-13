<?php
    include "header.php";
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/cart.php";

    // Controller Danh mục
    if (isset($_GET["act"])) {
        $act = $_GET["act"]; // Lấy giá trị từ URL
        switch ($act) {
            case 'adddm':
                if (isset($_POST["themmoi"])) {
                    $tenloai = trim($_POST["tenloai"]); // Xóa khoảng trắng

                    if (!empty($tenloai)) { 
                        $sql_check = "SELECT COUNT(*) FROM danhmuc WHERE name = :name";
                        $count = pdo_query_value($sql_check, [':name' => $tenloai]);

                        if ($count > 0) {
                            $thong_bao = "<p style='color: red;'>Tên loại đã tồn tại!</p>";
                        } else {
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
                $list_danhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;

            case 'xoadm':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    delete_danhmuc($_GET["id"]);
                }
                $list_danhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'xoadm_multi':
                if(isset($_POST['id']) && is_array($_POST['id'])){
                    foreach ($_POST['id'] as $id) {
                        delete_danhmuc($id);
                    }
                }
                $list_danhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'suadm':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $danhmuc = loadOne_danhmuc($_GET["id"]);
                }
                include "danhmuc/update.php";
                break;

            case 'updatedm':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $tenloai = trim($_POST["tenloai"]);
                    $id = $_POST["id"];
                    if (!empty($tenloai)) {
                        update_danhmuc($id, $tenloai);
                        $thong_bao = "<p style='color: green;'>Cập nhật thành công</p>";
                    } else {
                        $thong_bao = "<p style='color: red;'>Vui lòng nhập tên loại</p>";
                    }
                }
                $list_danhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;

            // Controller Sản phẩm
            case 'addsp':
                if (isset($_POST["themmoi"])) {
                    $iddanhmuc = trim($_POST["iddanhmuc"]);
                    $tensp = trim($_POST["tensp"]);
                    $giasp = trim($_POST["giasp"]);
                    $mota = trim($_POST["mota"]);
                    $hinhanh = "";

                    if (isset($_FILES["hinhanh"]) && $_FILES["hinhanh"]["error"] == 0) {
                        $hinhanh = $_FILES["hinhanh"]["name"];
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($hinhanh);
                        move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);
                    }

                    if (!empty($tensp)) { 
                        $sql_check = "SELECT COUNT(*) FROM sanpham WHERE name = :name";
                        $count = pdo_query_value($sql_check, [':name' => $tensp]);

                        if ($count > 0) {
                            $thong_bao = "<p style='color: red;'>Tên sản phẩm đã tồn tại!</p>";
                        } else {
                            $giasp = str_replace(',', '', $giasp);
                            $giasp = (float) $giasp;

                            if ($giasp <= 0) {
                                $thong_bao = "<p style='color: red;'>Giá sản phẩm không hợp lệ!</p>";
                            } else {
                                insert_sanpham($tensp, $giasp, $hinhanh, $mota, $iddanhmuc);
                                $thong_bao = "<p style='color: green;'>Thêm mới thành công</p>";
                            }
                        }
                    } else {
                        $thong_bao = "<p style='color: red;'>Vui lòng nhập tên sản phẩm</p>";
                    }
                }

                $list_danhmuc = loadAll_danhmuc();
                include "sanpham/add.php";
                break;

            case 'listsp':
                $keyword = $_POST["keyword"] ?? '';
                $iddanhmuc = $_POST["iddanhmuc"] ?? 0;
                $list_danhmuc = loadAll_danhmuc();
                $list_sanpham = loadAll_sanpham($keyword, $iddanhmuc);
                include "sanpham/list.php";
                break;

            case 'xoasp':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    delete_sanpham($_GET["id"]);
                }
                $list_sanpham = loadAll_sanpham("", 0);
                include "sanpham/list.php";
                break;
            case 'xoasp_multi':
                if (isset($_POST['id']) && is_array($_POST['id'])){
                    foreach ($_POST['id'] as $id) {
                        delete_sanpham($_GET['id']);
                    }
                }
                $list_sanpham = loadAll_sanpham("", 0);
                include "sanpham/list.php";
                break;
            case 'suasp':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $sanpham = loadOne_sanpham($_GET["id"]);
                    $list_danhmuc = loadAll_danhmuc(); // Load danh mục
                }
                include "sanpham/update.php";
                break;
            case 'updatesp':
                if (!empty($_POST['capnhat'])) {
                    $id = $_POST['id'] ?? 0;
                    $tensp = $_POST['tensp'] ?? '';
                    $giasp = $_POST['giasp'] ?? 0;
                    $mota = $_POST['mota'] ?? '';
                    $iddanhmuc = $_POST['iddanhmuc'] ?? 0;
                    $hinhanh = "";
            
                    // Lấy thông tin sản phẩm trước khi cập nhật
                    $sanpham_cu = loadOne_sanpham($id);
                    if (!$sanpham_cu) {
                        die("<script>alert('Sản phẩm không tồn tại!');</script>");
                    }
            
                    // Kiểm tra file ảnh (nếu có)
                    if (isset($_FILES["hinhanh"]) && $_FILES["hinhanh"]["error"] == 0) {
                        $hinhanh = $_FILES["hinhanh"]["name"];
                        $target_dir = "../upload/";
                        move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_dir . $hinhanh);
                    } else {
                        $hinhanh = $sanpham_cu['img']; // Giữ nguyên ảnh cũ nếu không upload mới
                    }
            
                    // Log dữ liệu trước khi cập nhật
                    echo "<script>console.log('Trước khi cập nhật:', " . json_encode($sanpham_cu) . ");</script>";
                    echo "<script>console.log('Dữ liệu nhập:', " . json_encode($_POST) . ");</script>";
            
                    try {
                        // Cập nhật sản phẩm
                        $result = update_sanpham($id, $tensp, $giasp, $hinhanh, $mota, $iddanhmuc);
                        
                        // Lấy dữ liệu sau khi cập nhật
                        $sanpham_moi = loadOne_sanpham($id);
                        echo "<script>console.log('Sau khi cập nhật:', " . json_encode($sanpham_moi) . ");</script>";
            
                        if ($result) {
                            echo "<script>alert('Cập nhật thành công!');</script>";
                        } else {
                            echo "<script>console.log('Không có thay đổi hoặc lỗi cập nhật!');</script>";
                        }
                    } catch (Exception $e) {
                        $error_message = "Lỗi cập nhật: " . $e->getMessage();
                        echo "<script>alert('" . addslashes($error_message) . "');</script>";
                        echo "<script>console.log('Lỗi SQL:', " . json_encode($error_message) . ");</script>";
                    }
                }
            
                $list_sanpham = loadAll_sanpham("", 0);
                include "sanpham/list.php";
                break;
            // Controller Tài khoản
            case 'dskh':
                $list_taikhoan = loadAll_taikhoan();
                include "taikhoan/list.php";
                break;
            case 'addtk':
                if (isset($_POST["themmoi"])) {
                    $user = trim($_POST["user"]); // Lấy dữ liệu và làm sạch khoản trắng
                    $password = trim($_POST["password"]);
                    $email = trim($_POST["email"]);
                    $address = trim($_POST["address"]);
                    $telephone = trim($_POST["telephone"]);
                    $role = trim($_POST["role"]);

                    // Kiểm tra nếu các trường không bị bỏ trống
                    if (!empty($user) && !empty($password) && !empty($email)) {
                        // Kiểm tra email có hợp lệ hay không ? 
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $thong_bao = "<p style='color: red;'>Email không hợp lệ!</p>";
                        } else {
                            // Mã hóa mật khẩu
                            $password_hashed = password_hash($password, PASSWORD_DEFAULT);

                            // Kiểm tra tên tài khoản đã tồn tại hay chưa 
                            $sql_check = "SELECT COUNT(*) FROM taikhoan WHERE user = :user";
                            $count = pdo_query_value($sql_check, [':user' => $user]);
                            if ($count > 0) {
                                $thong_bao = "<p style='color: red;'>Tên tài khoản đã tồn tại!</p>";
                            } else {
                                // Thêm mới tài khoản
                                insert_taikhoan_admin($user, $password, $email, $address, $telephone, $role);
                                $thong_bao = "<p style='color: green;'>Thêm mới thành công</p>";
                            }
                        }
                    } else {
                        $thong_bao = "<p style='color: red;'>Vui lòng nhập đầy đủ thông tin (tên tài khoản, mật khẩu, email)</p>";
                    }
                }
                include "taikhoan/add.php";
                break;
            case 'suatk':
                if(isset($_GET['id']) && ($_GET['id'])) {
                    $taikhoan = loadOne_taikhoan($_GET['id']);
                    if (!$taikhoan) {
                        $thong_bao = "Không tìm thấy tài khoản!";
                    }
                }
                
                include "taikhoan/update.php";
                break;
            case 'updatetk':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $id = $_POST['id'];
                    $user = trim($_POST['user']);
                    $password = trim($_POST['password']);
                    $email = trim($_POST['email']);
                    $address = trim($_POST['address']);
                    $telephone = trim($_POST['telephone']);
                    $role = $_POST['role'];
                    
                    // Lấy tài khoản cũ trong DB
                    $tk_cu = loadOne_taikhoan($id);

                    $loi = [];
                    $cothaydoi = false;
                    if ($password != $tk_cu['password']) $cothaydoi = true;
                    if ($address != $tk_cu['address']) $cothaydoi = true;
                    if ($role != $tk_cu['role']) $cothaydoi = true;
                    if ($email != $tk_cu['email']) {
                        $cothaydoi = true;
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $loi['email'] = "<span style='color: red;'>Email không đúng định dạng!</span>";
                        } elseif(checkemail($email)) {
                            $loi['email'] = "<span style='color: red;'>Email đã tồn tại!</span>";
                        } 
                    }    
                    if ($telephone != $tk_cu['telephone']){
                        $cothaydoi = true;
                        if (checkTelephone($telephone)) {
                            $loi['telephone'] = "<span style='color: red;'>Số điện thoại đã tồn tại!</span>";
                        }
                    }
                    if (!$cothaydoi) {
                        $thong_bao = "<span style='color: red;'>Bạn chưa thay đổi gì!</span>";
                    } elseif (empty($loi)) {
                        update_taikhoan($id, $user, $password, $email, $address, $telephone, $role);
                        $thong_bao = "<span style='color: green;'>Cập nhật tài khoản thành công!</span>";
                    }
                }
                $taikhoan = loadOne_taikhoan($id);
                include "taikhoan/update.php";
                break;
            case 'xoatk':
                if(isset($_GET['id']) && ($_GET['id']) > 0) {
                    delete_taikhoan($_GET['id']);
                }
                $list_taikhoan = loadAll_taikhoan();
                include "taikhoan/list.php";
                break;
            case 'xoatk_multi':
                if (isset($_POST['id'])&& is_array($_POST['id'])){
                    foreach ($_POST['id'] as $id) {
                        delete_taikhoan($id);
                    }
                }
                $list_binhluan = loadAll_binhluan(0);
                include "binhluan/list.php";
                break;    
            // Controller Bình luận    
            case 'dsbl':
                $list_binhluan = loadAll_binhluan(0);

                include "binhluan/list.php";
                break;
            case 'xoabl':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    delete_binhluan($_GET["id"]);
                }
                $list_binhluan = loadAll_binhluan(0);
                include "binhluan/list.php";
                break;
            case 'xoabl_multi':
                if (isset($_POST['id'])&& is_array($_POST['id'])){
                    foreach ($_POST['id'] as $id) {
                        delete_binhluan($id);
                    }
                }
                $list_binhluan = loadAll_binhluan(0);
                include "binhluan/list.php";
                break;
            // Controller của bill
            case 'listbill':
                if(isset($_POST['keyword']) && $_POST['keyword']) {
                    $keyword = $_POST['keyword'];
                } else {
                    $keyword = "";
                }
                $list_bill = loadAll_bill($keyword,0);
                include "bill/listbill.php";
                break;
            case 'suadh':
                if(isset($_GET['id']) && ($_GET['id'])) {
                    $bill = loadOne_bill($_GET['id']);
                    if (!$bill) {
                        $thong_bao = "Không tìm thấy đơn hàng!";
                    }
                }
                
                include "bill/update.php";
                break;
            case 'updatedh':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $id = $_POST['id'];
                    $bill_name = trim($_POST['bill_name']);
                    $bill_email = trim($_POST['bill_email']);
                    $bill_address = trim($_POST['bill_address']);
                    $bill_tel = trim($_POST['bill_tel']);
                    $total = trim($_POST['total']);
                    $bill_status = trim($_POST['ttdh']);
                   
                    
                    // Lấy tài khoản cũ trong DB
                    $dh_cu = loadOne_bill($id);

                    $loi = [];
                    $cothaydoi = false;
                    if ($bill_name != $dh_cu['bill_name']) $cothaydoi = true;
                    if ($bill_email != $dh_cu['bill_email']) $cothaydoi = true;
                    if ($bill_address != $dh_cu['bill_address']) $cothaydoi = true;
                    if ($bill_tel != $dh_cu['bill_tel']) $cothaydoi = true;
                    if ($total != $dh_cu['total']) $cothaydoi = true;
                    if ($bill_status  != $dh_cu['ttdh']) $cothaydoi = true;

                    if (!$cothaydoi) {
                        $thong_bao = "<span style='color: red;'>Bạn chưa thay đổi gì!</span>";
                    } elseif (empty($loi)) {
                        //Cập nhật đơn hàng
                        update_bill($id, $bill_name,$bill_email, $bill_address,$bill_tel, $total, $bill_status);
                        $thong_bao = "<span style='color: green;'>Cập nhật tài khoản thành công!</span>";
                    }
                }
                $bill = loadOne_bill($id);
                include "bill/update.php";
                break;
            default:
                include "home.php";
                break;
        }
    } else {
        include "home.php";
    }

    include "footer.php";
?>
