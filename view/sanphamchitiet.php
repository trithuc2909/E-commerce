<div class="row mb">
    <div class="boxtrai mr">
        <div class="row">
    <div class="row mb">
    <?php 
        extract($onesanpham);
    ?>    
        <div class="boxtieude"><?=$name?></div>
            <div class="boxnoidung1 row">
            <?php
                $img = $img_path.$img;
                echo '<div class="row mb spct"> <img src="'.$img.'"></div>'; 
                echo $description;
            ?>

            </div>
    </div>

    <!-- sử dụng jQuery để load dữ liệu bình luận -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#binhluan").load("view/binhluan/binhluanform.php", {idpro: <?=$id?>});
        });
    </script>
    <div class="row" id="binhluan">

    </div>

    <div class="row mb">
        <div class="boxtieude">SẢN PHẨM CÙNG LOẠI</div>
            <div class="boxnoidung1 row">
                <?php 
                    foreach ($sp_cungloai as $sp_cungloai) {
                        extract($sp_cungloai);
                        $linksp = "index.php?act=sanphamchitiet&idsanpham=".$id;
                        echo '<li><a href="'.$linksp.'">'.$name.'</a></li>';
                    }
                ?>

            </div>
    </div>

    </div>
    </div>
    <div class="boxphai">
        <?php 
        include  "view/boxphai.php";
        ?>
    </div>
</div>