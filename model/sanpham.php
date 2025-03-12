<?php
    // Hàm thêm mới loại hàng hóa
    function insert_sanpham($tensp, $giasp, $hinhanh, $mota, $iddanhmuc) {
        $sql = "INSERT INTO sanpham (name, price, img, description, iddanhmuc) 
                VALUES (:name, :price, :img, :description, :iddanhmuc)";
        pdo_execute($sql, [
            ':name' => $tensp,
            ':price' => (float)$giasp,
            ':img' => $hinhanh,
            ':description' => $mota,
            ':iddanhmuc' => $iddanhmuc
        ]);
    }
    // Hàm xóa loại hàng hóa
    function delete_sanpham($id) {
        $sql = "DELETE FROM sanpham WHERE id = " .$id;
        pdo_execute($sql);
    }
    // Hàm load danh sách loại hàng hóa
    function loadAll_sanpham($keyword,$iddanhmuc){
        $sql = "SELECT * FROM sanpham WHERE 1";
        if ($keyword !="") {
            $sql .= " AND name = '" .$keyword."'";
        }
        if ($iddanhmuc > 0) {
            $sql .= " AND iddanhmuc LIKE '%".$iddanhmuc."%'";
        }
        $sql .=" ORDER BY id desc";    // Nối chuỗi trong sql { sql.= " chuỗi"}
        $list_sanpham = pdo_query($sql);

        return $list_sanpham;
    }
    // Hàm lấy thông tin loại hàng hóa
    function loadOne_sanpham($id){
        $sql = "SELECT * FROM sanpham WHERE id = " .$id;
        $sanpham = pdo_query_one($sql);
        
        return $sanpham;
    }
    // Hàm cập nhật loại hàng hóa
    function update_sanpham($id, $tensp, $giasp, $mota, $hinhanh){
        $sql = "UPDATE sanpham SET name = :name, price = :price, description = :description WHERE id = :id";
        pdo_execute($sql, [
            ':name' => $tensp,
            ':price' => (float)$giasp,
            ':description' => $mota,
            ':id' => $id
        ]);
    }
?>