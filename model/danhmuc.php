<?php
    // Hàm thêm mới loại hàng hóa
    function insert_danhmuc ($tenloai){
        $sql = "INSERT INTO danhmuc(name) VALUES ('$tenloai')";
        pdo_execute($sql);
    }
    // Hàm xóa loại hàng hóa
    function delete_danhmuc($id) {
        $sql = "DELETE FROM danhmuc WHERE id = " .$id;
        pdo_execute($sql);
    }
    // Hàm load danh sách loại hàng hóa
    function loadAll_danhmuc(){
        $sql = "SELECT * FROM danhmuc order by id asc";    
        $list_danhmuc = pdo_query($sql);

        return $list_danhmuc;
    }
    // Hàm lấy thông tin loại hàng hóa
    function loadOne_danhmuc($id){
        $sql = "SELECT * FROM danhmuc WHERE id = " .$id;
        $danhmuc = pdo_query_one($sql);
        
        return $danhmuc;
    }
    // Hàm cập nhật loại hàng hóa
    function update_danhmuc($id, $tenloai){
        $sql = "UPDATE danhmuc SET name ='".$tenloai."' WHERE id =" .$id;
        pdo_execute($sql);
    }   
?>