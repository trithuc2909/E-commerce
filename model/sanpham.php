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
    $sql = "DELETE FROM sanpham WHERE id = :id";
    pdo_execute($sql, [':id' => $id]);
}

// Hàm load danh sách loại hàng hóa
function loadAll_sanpham($keyword, $iddanhmuc){
    $sql = "SELECT * FROM sanpham WHERE 1";
    $params = []; // Initialize $params as an empty array
    if ($keyword != "") {
        $sql .= " AND name LIKE :keyword";
        $params[':keyword'] = "%$keyword%";
    }
    if ($iddanhmuc > 0) {
        $sql .= " AND iddanhmuc = :iddanhmuc";
        $params[':iddanhmuc'] = $iddanhmuc;
    }
    $sql .= " ORDER BY id DESC";
    $list_sanpham = pdo_query($sql, $params);

    return $list_sanpham;
}

// Hàm lấy thông tin loại hàng hóa
function loadOne_sanpham($id){
    $sql = "SELECT * FROM sanpham WHERE id = :id";
    $sanpham = pdo_query_one($sql, [':id' => $id]);
    
    return $sanpham;
}

// Hàm cập nhật loại hàng hóa
function update_sanpham($id, $tensp, $giasp, $hinhanh, $mota, $iddanhmuc) {
    try {
        $params = [
            ':id' => $id,
            ':name' => $tensp,
            ':price' => $giasp,
            ':description' => $mota,
            ':iddanhmuc' => $iddanhmuc
        ];

        if (!empty($hinhanh)) {
            $sql = "UPDATE sanpham SET name = :name, price = :price, img = :img, description = :description, iddanhmuc = :iddanhmuc WHERE id = :id";
            $params[':img'] = $hinhanh;
        } else {
            $sql = "UPDATE sanpham SET name = :name, price = :price, description = :description, iddanhmuc = :iddanhmuc WHERE id = :id";
        }

        // Debug: Kiểm tra câu SQL và tham số
        echo "<pre>";
        echo "SQL: " . $sql . "\n";
        print_r($params);
        echo "</pre>";

        pdo_execute($sql, $params);

    } catch (PDOException $e) {
        echo "Lỗi cập nhật: " . $e->getMessage();
    }
}



?>