<?php
    if (is_array($bill)){
        extract($bill); // Chuyển mảng thành các biến
    }
    $countsp = loadAll_cart_count($bill['id']);
    $ttdh = get_ttdh($bill['bill_status']); 
?>
<div class="row">
    <div class="row form_tieude">
        <h1>CẬP NHẬT ĐƠN HÀNG </h1>
    </div>    
    <div class="row form_noidung">
        <form action="index.php?act=updatedh" method="post">
            <div class="row mb10">
                Tên khách hàng<br>
                <input type="text" name="bill_name" autocomplete="off" value="<?php if(isset($bill_name)&&($bill_name !="")) echo $bill_name ;?>">
            </div>
            <div class="row mb10">
                Email<br>
                <input type="text" name="bill_email" autocomplete="off" value="<?php if(isset($bill_email)&&($bill_email !="")) echo $bill_email ;?>">
            </div>
            <div class="row mb10">
                Địa chỉ<br>
                <input type="text" name="bill_address" autocomplete="off" value="<?php if(isset($bill_address)&&($bill_address !="")) echo $bill_address ;?>">
            </div>
            <div class="row mb10">
                Số điện thoại<br>
                <input type="text" name="bill_tel" autocomplete="off" value="<?php if(isset($bill_tel)&&($bill_tel !="")) echo $bill_tel ;?>">
            </div>
            <div class="row mb10">
                Giá trị đơn hàng<br>
                <input type="text" name="total" autocomplete="off" value="<?php if(isset($total)) echo $total;?> VNĐ">
            </div>
            <div class="row mb10">
                Tình trạng đơn hàng<br>
                <input type="text" name="ttdh" autocomplete="off" value="<?php if(isset($ttdh)&&($ttdh !="")) echo $ttdh ;?>">
            </div>
            <div class="row mb10">
                <input type="hidden" name="id" value="<?php if(isset($id)&&($id > 0)) echo $id ;?>"> <!-- Thêm input hidden để lưu id -->
                <input type="submit" name="capnhat" value="Cập nhật">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listbill"> <input type="button" value="Danh sách"></a>
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