<?php
    session_start();

    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/taikhoan.php";
    include "view/header.php";
    include "global.php";

    // Kiểm tra mảng mycart có tồn tại hay không
    if (!isset($_SESSION['mycart'])) {
        $_SESSION['mycart'] = [];
    }

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
            case 'searchpro':
                if (isset($_POST['keyword']) && ($_POST['keyword']!="")) {
                    $keyword = $_POST['keyword'];
                } else {
                    $keyword = "";
                }
            $dssanpham = load_sanpham($keyword);
             // $tendm có thể là tên danh mục hoặc chuỗi tùy ý
            $tendm = $keyword != "" ? "- KẾT QUẢ TÌM KIẾM CHO: '$keyword'" : "TẤT CẢ SẢN PHẨM";

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
                    
                }
                break;

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
            case 'dangxuat':
                session_unset(); // hủy session
                header('Location: index.php');
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
            //Controller thêm vào giỏ hàng
            case 'addtocart':
                if(isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                    //Lấy thông tin của sản phẩm được click về
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];
                    $soluong = 1;
                    $ttien = $price * $soluong;
                    //Đưa các dữ liệu vào mảng
                    $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                    // Đẩy mảng con vào mảng cha
                    array_push($_SESSION['mycart'], $spadd); 
                }    
                include "view/cart/viewcart.php";
                break;
            case 'delcart':
                if(isset($_GET['idcart'])) {
                    array_splice($_SESSION['mycart'],$_GET['idcart'],1);
                } else {
                    $_SESSION['mycart'] = [];
                } 
                // Sau khi xóa thì phải load lại trang mới
                header('Location: index.php?act=viewcart');
                break;
            case 'viewcart':
                include "view/cart/viewcart.php";
                break;
            case 'bill':
                include "view/cart/bill.php";
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