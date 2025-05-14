<?php
   // Hàm hiển thị tất cả thống kê 
    function loadAll_thongke(){    
        $sql = "SELECT danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
        
        $sql.=" FROM sanpham left join danhmuc on danhmuc.id = sanpham.iddanhmuc"; 
        $sql .= " GROUP BY danhmuc.id ORDER BY danhmuc.id DESC";
    
        $list_thongke = pdo_query($sql);
        return $list_thongke;
    }
?>