<div class="row">
    <div class="row form_tieude">
        <h1>THÊM MỚI LOẠI HÀNG HÓA </h1>
    </div>    
    <div class="row form_noidung">
        <form action="index.php?act=adddm" method="post">
            <div class="row mb10">
                Mã loại<br>
                <input type="text" name="maloai">
            </div>
            <div class="row mb10">
                Tên loại<br>
                <input type="text" name="tenloai" autocomplete="off">
            </div>
            <div class="row mb10">
                <input type="submit" name="themmoi" value="Thêm mới">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listdm"> <input type="button" value="Danh sách"></a>
            </div>

            <!-- === Thông báo === -->
            <?php
                if(isset($thong_bao) ){
                    echo $thong_bao;
                }
            ?>
        </form>
    </div>
</div>