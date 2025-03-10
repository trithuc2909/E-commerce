<?php
    // Hàm thêm mới loại hàng hóa
    function insert_sanpham ($tenloai){
        $sql = "INSERT INTO sanpham(name) VALUES ('$tenloai')";
        pdo_execute($sql);
    }
    // Hàm xóa loại hàng hóa
    function delete_sanpham($id) {
        $sql = "DELETE FROM sanpham WHERE id = " .$id;
        pdo_execute($sql);
    }
    // Hàm load danh sách loại hàng hóa
    function loadAll_sanpham(){
        $sql = "SELECT * FROM sanpham ORDER BY id desc";    
        $list_sanpham = pdo_query($sql);

        return $list_sanpham;
    }
    // Hàm lấy thông tin loại hàng hóa
    function loadOne_sanpham($id){
        $sql = "SELECT * FROM sanpham WHERE id = " .$id;
        $danhmuc = pdo_query_one($sql);
        
        return $danhmuc;
    }
    // Hàm cập nhật loại hàng hóa
    function update_sanpham($id, $tenloai){
        $sql = "UPDATE sanpham SET name ='".$tenloai."' WHERE id =" .$id;
        pdo_execute($sql);
    }   
?>