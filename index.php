<?php
    include "model/pdo.php";
    include "model/sanpham.php";
    include "view/header.php";
    include "global.php";

    $san_pham_moi = loadAll_sanpham_home();

    if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
        $act = $_GET['act'];
        switch ($act) {
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