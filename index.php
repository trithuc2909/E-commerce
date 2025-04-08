<?php
    session_start();

    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/taikhoan.php";
    include "view/header.php";
    include "global.php";


    $san_pham_moi = loadAll_sanpham_home();
    $dsdm = loadAll_danhmuc();
    $sptop10 = loadAll_sanpham_home_top10();
   
    if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
        $act = $_GET['act'];  
        switch ($act) {
            case 'sanpham':
                if (isset($_POST['keyword']) && ($_POST['keyword']!="")){
                    $keyword = $_POST['keyword'];
                } else {
                    $keyword =""; 
                }
                if (isset($_GET['iddanhmuc']) && ($_GET['iddanhmuc'] > 0)){
                    $iddanhmuc = $_GET['iddanhmuc'];
                    
                } else {
                    $iddanhmuc = 0;
                }
                    $dssanpham = loadAll_sanpham($keyword, $iddanhmuc);
                    $tendm = load_ten_danhmuc($iddanhmuc);
                    include "view/sanpham.php";
                break;

            case 'sanphamchitiet':
                
                if (isset($_GET['idsanpham']) && ($_GET['idsanpham'] > 0)){
                    $id = $_GET['idsanpham'];

                    $onesanpham = loadOne_sanpham($id);
                    extract($onesanpham);
                    $sp_cungloai = load_sanpham_cungloai($id,$iddanhmuc);
                    include "view/sanphamchitiet.php";
                } else {
                    include "view/home.php";        
                    break;
                }

            case 'dangky':
                $thongbao = ""; 
                if(isset($_POST['dangky'])&&($_POST['dangky'])) {
                    $email= $_POST['email'];
                    $user = $_POST['user'];
                    $password = $_POST['pass'];

                    insert_taikhoan($email, $user, $password);

                    $thongbao ="Đã đăng ký thành công!";
                }
                include "view/taikhoan/dangky.php";
                break;
        
            case 'dangnhap':
                $thongbao = ""; 
                if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])) {
                    $user = $_POST['user'];
                    $password = $_POST['pass'];
                    
                    $checkuser = checkuser($user, $password);
                    if (is_array($checkuser)){
                        $_SESSION['user'] = $checkuser;
                        $thongbao ="Bạn đã đăng nhập thành công!";
                        header('Location: index.php'); // Chuyển trang khi đăng nhập thành công!
                    } else {
                        $thongbao ="Tài khoản không tồn tại vui lòng kiểm tra hoặc đăng ký!";
                    }
                }
                include "view/taikhoan/dangky.php";
                break;
            case 'edit_taikhoan':
                $thongbao_taikhoan = ""; 
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])) {
                    // Lấy giá trị từ ô input
                    $user = $_POST['user'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $telephone = $_POST['telephone'];
                    $id = $_POST['id'];
                    
                    update_taikhoan($id, $user, $password, $email, $address, $telephone);

                    $_SESSION['user'] = checkuser($user, $password); // Cập nhật lại thông tin user mới

                    //Gán thông báo cập nhật thành công vào session
                    $_SESSION['thongbao_taikhoan'] = "Cập nhật thành công!";

                    header('Location: index.php?act=edit_taikhoan'); // Load lại trang cập nhật tài khoản!
                    exit(); // Thêm exit() sau header để dừng việc thực thi mã còn lại
                }

                // Lấy thông báo ra để hiển thị, sau đó xóa
                if (isset($_SESSION['thongbao_taikhoan'])) {
                    $thongbao_taikhoan = $_SESSION['thongbao_taikhoan'];
                    unset($_SESSION['thongbao_taikhoan']); 
                }
                include "view/taikhoan/edit_taikhoan.php";
                break;    
            case 'quenmk':
                if(isset($_POST['guiemail'])&&($_POST['guiemail'])) {
                    // Lấy giá trị từ ô input
                    $email = $_POST['email'];

                    // Gọi hàm check email để kiểm tra
                    $checkemail = checkemail($email);
                    if (is_array($checkemail)) {
                        $thongbaoemail = "Mật khẩu của bạn là: ".$checkemail['password'];
                    } else {
                        $thongbaoemail = "Tài khoản không tồn tại!";
                    }

                }

                include "view/taikhoan/quenmk.php";
                break; 
            case 'gioithieu':
                
                include "view/gioithieu.php";
                break;
            case 'lienhe':
            
                include "view/lienhe.php";
                break;
            case 'gopy':
        
                include "view/gopy.php";
                break;
            case 'hoidap':
    
                include "view/hoidap.php";
                break;

            default:
                include "view/home.php";
                break;
        }
    } else {
        include "view/home.php";
    }

    include "view/footer.php";
?>