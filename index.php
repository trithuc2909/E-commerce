<?php
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "view/header.php";
    include "global.php";

    $san_pham_moi = loadAll_sanpham_home();
    $dsdm = loadAll_danhmuc();
    $sptop10 = loadAll_sanpham_home_top10();

    if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
        $act = $_GET['act'];
        switch ($act) {
            case 'sanpham':
                
                if (isset($_GET['iddanhmuc']) && ($_GET['iddanhmuc'] > 0)){
                    $iddanhmuc = $_GET['iddanhmuc'];
                    $dssanpham = loadAll_sanpham("", $iddanhmuc);
                    $tendm = load_ten_danhmuc($iddanhmuc);
                    include "view/sanpham.php";
                } else {
                    include "view/home.php";
                }
                
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