<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtieude">SẢN PHẨM <strong><?=$tendm?></strong></div>
             <div class="boxnoidung1 row">
                <?php
                    $i=0;
                    foreach ($dssanpham as $sanpham) {
                        extract($sanpham);
                        $hinhanh = $img_path.$img; // $img_path = upload/ && $img = tên hình ảnh

                        if (($i == 2) || ($i == 5) || ($i == 8) || ($i == 11)) {
                            $mr = "";
                        } else {
                            $mr = "mr";
                        }
                        $linksp = "index.php?act=sanphamchitiet&idsanpham=".$id;
                        echo '<div class="boxsanpham '.$mr.'">
                                <div class="row img"><a href="'.$linksp.'"><img src="'.$hinhanh.'" alt=""></a></div> 
                                <p>'.$price.'</p>
                                <a href="'.$linksp.'">'.$name.'</a>
                            </div>';
                            $i+= 1;
                    }
                ?>

            </div>
        </div>

    </div>
        <div class="boxphai">
            <?php 
                include "boxphai.php";
            ?>
        </div>
</div>