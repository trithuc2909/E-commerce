<div class="row mb">
    <div class="boxtieude">TÀI KHOẢN</div>
    <div class="boxnoidung formtaikhoan">
        <?php 
            if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                extract($_SESSION['user']);
        ?>
            <div class="row mb15">
                Xin chào <?=$user?>
            </div>
            <div class="row mb15">
                <li>
                    <a href="index.php?act=mybill">Đơn hàng của tôi<br></a> 
                </li>
                <li>
                    <a href="index.php?act=quenmk">Quên mật khẩu<br></a> 
                </li>
                <li>
                    <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
                </li>
                <?php if($role == 1) {?>
                <li>
                    <a href="admin/index.php">Đăng nhập Admin</a>
                </li>
                <?php }?>
                <li>
                    <a href="index.php?act=dangxuat">Đăng xuất</a>
                </li>
            </div>
        <?php 
            } else {
        ?> 
        <form action="index.php?act=dangnhap" method="post">
            <div class="row mb10">
                Tên đăng nhập<br>
                <input type="text" name="user" id="" autocomplete="off">
            </div>
            <div class="row mb10">
                    Mật khẩu<br>
                <input type="password" name="pass">
            </div>
            <div class="row mb10">
                <input type="checkbox" name="">Ghi nhớ tài khoản?
            </div>
            <div class="row mb10">
                <input type="submit" value="Đăng nhập" name ="dangnhap">
            </div>
        </form>
        <li>
            <a href="#">Quên mật khẩu</a>
        </li>
        <li>
            <a href="index.php?act=dangky">Đăng ký thành viên</a>
        </li>
        <?php } ?>    
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
            <form action="index.php?act=searchpro" method="post">
                <input type="text" name="keyword" id="searchbox" placeholder="Từ khóa tìm kiếm">
                <button type="submit" name="timkiem">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>   
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