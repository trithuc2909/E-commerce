<!-- FontAwsome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<div class="row mb">
            <div class="boxtrai mr">
                <div class="row">
                    <div class="banner">
                    <!-- Slideshow container -->
                        <div class="slideshow-container">

                        <!-- Full-width images with number and caption text -->
                        <div class="mySlides fade">
                        <!-- <div class="numbertext">1 / 3</div> -->
                        <img src="view/Images/banner.png" style="width:100%">
                        <!-- <div class="text">Caption Text</div> -->
                        </div>

                        <div class="mySlides fade">
                        <!-- <div class="numbertext">2 / 3</div> -->
                        <img src="view/Images/banner2.png" style="width:100%">
                        <!-- <div class="text">Caption Two</div> -->
                        </div>

                        <div class="mySlides fade">
                        <!-- <div class="numbertext">3 / 3</div> -->
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
                            $linksp = "index.php?act=sanphamchitiet&idsanpham=".$id;
                            echo '<div class="boxsanpham '.$mr.'">
                                    <div class="row img"><a href="'.$linksp.'"><img src="'.$hinhanh.'" alt=""></a></div> 
                                    <p>'.$price.'</p>
                                    <a href="'.$linksp.'">'.$name.'</a> 
                                    <form action="index.php?act=addtocart" method="post">
                                        <input type="hidden" name="id" value="'.$id.'">
                                        <input type="hidden" name="name" value="'.$name.'">
                                        <input type="hidden" name="img" value="'.$img.'">
                                        <input type="hidden" name="price" value="'.$price.'">
                                        <button type="submit" name="addtocart" value="1" class="btn-cart">
                                            <i class="fa-solid fa-cart-shopping"></i>  Thêm vào giỏ hàng
                                        </button>
                                    </form>
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
                <?php 
                    include "boxphai.php";
                ?>

            </div>
        </div>