<?php
    session_start();
    include "../../model/pdo.php";
    include "../../model/binhluan.php";

    $idpro = $_REQUEST['idpro'];
    $dsbl = loadAll_binhluan($idpro);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    


<div class="row mb">
        <div class="boxtieude">BÌNH LUẬN</div>
        <div class="boxnoidung binhluan">
        <table>
            <ul>
                <?php 
                    foreach ($dsbl as $bl) {
                        extract($bl);
                    echo '<tr><td><li>'.$noidung.'</li></td>';
                    echo '<td>'.$iduser.'</td>';
                    echo '<td>'.$ngaybinhluan.'</td></tr>';

                    }
                    
                ?>
                
            </ul>
            </table>  
        </div>
        <div class="boxfooter binhluanform">

        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                <input type="hidden" name="idpro" value="<?=$idpro?>">
                <input type="text" name="noidung" placeholder="Nhập bình luận">
                <input type="submit" name="guibinhluan" value="Gửi bình luận">
            </form>
        </div>
        <?php
            if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])) {
                $noidung = $_POST['noidung'];
                $idpro = $_POST['idpro'];
                $iduser = $_SESSION['user']['id'];  
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngaybinhluan = date('H:i:s d/m/Y');
                insert_binhluan ($noidung, $iduser, $idpro, $ngaybinhluan);
                header("Location: ".$_SERVER['HTTP_REFERER']);
            }
        ?>
    </div>
</body>
</html>