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

    <div class="row mb">
        <div class="boxtieude">BÌNH LUẬN</div>
            <div class="boxnoidung1 row">
                

            </div>
    </div>

    <div class="row mb">
        <div class="boxtieude">SẢN PHẨM CÙNG LOẠI</div>
            <div class="boxnoidung1 row">
                

            </div>
    </div>

        </div>
    </div>
    <div class="boxphai">
        <?php 
        include "boxphai.php";
        ?>
    </div>
</div>