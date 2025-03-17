<div class="row mb">
            <div class="boxtrai mr">
                <div class="row">
                    <div class="banner">
                    <!-- Slideshow container -->
                        <div class="slideshow-container">

                        <!-- Full-width images with number and caption text -->
                        <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="view/Images/banner.png" style="width:100%">
                        <!-- <div class="text">Caption Text</div> -->
                        </div>

                        <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="view/Images/banner2.png" style="width:100%">
                        <!-- <div class="text">Caption Two</div> -->
                        </div>

                        <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="view/Images/banner3.png" style="width:100%">
                        <!-- <div class="text">Caption Three</div> -->
                        </div>

                        <!-- Next and previous buttons -->
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <br>

                        <!-- The dots/circles -->
                        <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        </div>     
                    </div>
                </div>
                <div class="row">

                    <?php
                        $i=0;
                        foreach ($san_pham_moi as $sanpham) {
                            extract($sanpham);
                            $hinhanh = $img_path.$img; // $img_path = upload/ && $img = tên hình ảnh

                            if (($i == 2) || ($i == 5) || ($i == 8)) {
                                $mr = "";
                            } else {
                                $mr = "mr";
                            }

                            echo '<div class="boxsanpham '.$mr.'">
                                    <div class="row img"><img src="'.$hinhanh.'" alt=""></div> 
                                    <p>'.$price.'</p>
                                    <a href="#">'.$name.'</a>
                                </div>';
                                $i+= 1;
                        }
                    ?>
                    <!-- <div class="boxsanpham mr">
                        <div class="row img"><img src="view/Images/pr1.png" alt=""></div> 
                        <p>35.000 VNĐ</p>
                        <a href="#">GÀ RÁN</a>
                    </div>
                    <div class="boxsanpham mr">
                        <div class="row img"><img src="view/Images/pr2.png" alt=""></div> 
                        <p>90.000 VNĐ</p>
                        <a href="#"> PIZZA </a>
                    </div>
                    <div class="boxsanpham">
                        <div class="row img"><img src="view/Images/pr3.png" alt=""></div> 
                        <p>56.000 VNĐ</p>
                        <a href="#">HAMBURGER</a>
                    </div>
                    <div class="boxsanpham mr">
                        <div class="row img"><img src="view/Images/pr4.png" alt=""></div> 
                        <p>15.000 VNĐ</p>
                        <a href="#">KHOAI TÂY CHIÊN</a>
                    </div>
                    <div class="boxsanpham mr">
                        <div class="row img"><img src="view/Images/pr5.jpg" alt=""></div> 
                        <p>10.000 VNĐ</p>
                        <a href="#">COCACOLA</a>
                    </div>
                    <div class="boxsanpham">
                        <div class="row img"><img src="view/Images/pr6.jpg" alt=""></div> 
                        <p>45.000 VNĐ</p>
                        <a href="#">MÌ Ý</a>
                    </div>
                    <div class="boxsanpham mr">
                        <div class="row img"><img src="view/Images/pr7.png" alt=""></div> 
                        <p>40.000 VNĐ</p>
                        <a href="#">HÁ CẢO</a>
                    </div>
                    <div class="boxsanpham mr">
                        <div class="row img"><img src="view/Images/pr8.jpg" alt=""></div> 
                        <p>35.000 VNĐ</p>
                        <a href="#">GÀ SỐT CAY</a>
                    </div>
                    <div class="boxsanpham">
                        <div class="row img"><img src="view/Images/pr9.png" alt=""></div> 
                        <p>15.000 VNĐ</p>
                        <a href="#">KEM</a>
                    </div> -->
                </div>
            </div>
            <div class="boxphai">
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
                            <li>
                                <a href="#">Gà rán</a>
                            </li>
                            <li>
                                <a href="#">Pizza</a>
                            </li>
                            <li>
                                <a href="#">Hamburger</a>
                            </li>
                            <li>
                                <a href="#">Nước ngọt</a>
                            </li>
                            <li>
                                <a href="#">Kem</a>
                            </li>
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
                        <div class="row mb10 top10">
                            <img src="view/Images/fav1.png" alt=""> 
                            <a href="">Gà rán giòn cay</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="view/Images/fav2.png" alt=""> 
                            <a href="">Gà sốt phô mai</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="view/Images/fav3.png" alt=""> 
                            <a href="">Burger bò phô mai</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="view/Images/fav4.png" alt=""> 
                            <a href="">Burger gà giòn</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="view/Images/fav5.png" alt=""> 
                            <a href="">Pizza phô mai</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="view/Images/fav6.png" alt=""> 
                            <a href="">Pizza hải sản</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="..view/Images/fav7.png" alt=""> 
                            <a href="">Mì Ý sốt bò bằm</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="view/Images/fav8.png" alt=""> 
                            <a href="">Mì Ý sốt kem (Carbonara)</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="view/Images/fav9.png" alt=""> 
                            <a href="">Khoai tây chiên</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="view/Images/fav10.png" alt=""> 
                            <a href="">Gà nướng mật ong</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>