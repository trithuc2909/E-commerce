<div class="row mb">
    <div class="boxtieude">TÀI KHOẢN</div>
    <div class="boxnoidung formtaikhoan">
        <form action="#" method="post">
            <div class="row mb10">
                Tên đăng nhập<br>
                <input type="text" name="user" id="" autocomplete="off">
            </div>
            <div class="row mb10">
                    Mật khẩu<br>
                <input type="password" name="password" id="">
            </div>
            <div class="row mb10">
                <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
            </div>
            <div class="row mb10">
                <input type="submit" value="Đăng nhập">
            </div>
        </form>
        <li>
            <a href="#">Quên mật khẩu</a>
        </li>
        <li>
            <a href="#">Đăng ký thành viên</a>
        </li>
    </div>
    </div>
    <div class="row mb">
        <div class="boxtieude">DANH MỤC</div>
        <div class="boxnoidung2 menu_doc">
            <ul>
                <?php 
                    foreach ($dsdm as $dm) {
                        extract($dm);
                    $linkdm = "index.php?act=sanpham&iddanhmuc=".$id;
                    echo '<li>
                        <a href="'.$linkdm.'">'.$name.'</a>
                            </li>';
                    }
                    
                ?>
                
            </ul>
        </div>
        <div class="boxfooter searchbox">
            <form action="#" method="post">
                <input type="text" name="#" id="searchbox" placeholder="Từ khóa tìm kiếm">
            </form>
        </div>
    </div>
    <div class="row mb">
        <div class="boxtieude">TOP 10 YÊU THÍCH</div>
        <div class="boxnoidung row">
            <?php
                foreach ($sptop10 as $sanpham) {
                    extract($sanpham);
                    $linksp = "index.php?act=sanphamchitiet&idsanpham=".$id;
                $img = $img_path.$img;
                echo '<div class="row mb10 top10">
                <a href="'.$linksp.'"><img src="'.$img.'" alt=""></a> 
                <a href="'.$linksp.'">'.$name.'</a>
                </div>';
                }
            ?>
        </div> 
</div> 