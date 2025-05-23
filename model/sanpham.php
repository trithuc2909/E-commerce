<?php
// Hàm thêm mới loại hàng hóa
function insert_sanpham($tensp, $giasp, $hinhanh, $mota, $iddanhmuc) {
    $sql = "INSERT INTO sanpham (name, price, img, description, iddanhmuc) 
            VALUES (:name, :price, :img, :description, :iddanhmuc)";
    pdo_execute($sql, [
        ':name' => $tensp,
        ':price' => $giasp,
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
function loadAll_sanpham_home(){
    $sql = "SELECT * FROM sanpham WHERE 1 order by id asc limit 0,9"; // Lấy 9 sản phẩm mới nhất
    $list_sanpham = pdo_query($sql);

    return $list_sanpham;
}

// Hàm load danh sách sản phẩm top yêu thích
function loadAll_sanpham_home_top10(){
    $sql = "SELECT * FROM sanpham WHERE 1 order by view desc limit 0,10"; // Lấy 9 sản phẩm mới nhất
    $list_sanpham = pdo_query($sql);

    return $list_sanpham;
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
    $sql .= " ORDER BY id ASC";
    $list_sanpham = pdo_query($sql, $params);

    return $list_sanpham;
}

// Hàm lấy thông tin loại hàng hóa
function loadOne_sanpham($id){
    $sql = "SELECT * FROM sanpham WHERE id = :id";
    $sanpham = pdo_query_one($sql, [':id' => $id]);
    
    return $sanpham;
}

// Hàm load tên danh mục sản phẩm
function load_ten_danhmuc($id){
    if($id > 0) {
        $sql = "SELECT * FROM danhmuc WHERE id = :id";
        $danhmuc = pdo_query_one($sql, [':id' => $id]);
        extract($danhmuc);
    } else {
        return "";
    }


    return $name;
}
//Hàm lấy sản phẩm cùng loại
function load_sanpham_cungloai($id, $iddanhmuc) {
    $sql = "SELECT * FROM sanpham WHERE iddanhmuc =".$iddanhmuc." AND id <> :id";
    $list_sanpham = pdo_query($sql, [':id' => $id]);

    return $list_sanpham;
}


//Hàm cập nhật loại hàng hóa
function update_sanpham($id, $tensp, $giasp, $hinhanh, $mota, $iddanhmuc) {
    try {
        $id = (int)$id;
        $iddanhmuc = (int)$iddanhmuc;

        if ($id <= 0) {
            throw new Exception("ID sản phẩm không hợp lệ!");
        }

        // Kiểm tra danh mục có tồn tại không
        $check_sql = "SELECT id FROM danhmuc WHERE id = :iddanhmuc";
        $check = pdo_query_one($check_sql, [':iddanhmuc' => $iddanhmuc]);

        if (!$check) {
            throw new Exception("Danh mục không tồn tại!");
        }

        // Tạo danh sách tham số
        $params = [
            ':id' => $id,
            ':name' => $tensp,
            ':price' => $giasp,
            ':description' => $mota,
            ':iddanhmuc' => $iddanhmuc
        ];

        // Nếu có hình ảnh mới thì cập nhật
        if (!empty($hinhanh)) {
            $sql = "UPDATE sanpham 
                    SET name = :name, price = :price, img = :img, description = :description, iddanhmuc = :iddanhmuc 
                    WHERE id = :id";
            $params[':img'] = $hinhanh;
        } else {
            $sql = "UPDATE sanpham 
                    SET name = :name, price = :price, description = :description, iddanhmuc = :iddanhmuc 
                    WHERE id = :id";
        }

        // Debug log
        error_log("Cập nhật sản phẩm: " . json_encode($params));

        pdo_execute($sql, $params);
    } catch (Exception $e) {
        error_log("Lỗi cập nhật sản phẩm: " . $e->getMessage());
        throw $e;
    }
}

//Hàm load sản phẩm tìm kiếm
function load_sanpham($keyword = "") {
    $sql = "SELECT * FROM sanpham WHERE 1";
    if ($keyword != "") {
        $sql .=" AND name LIKE '%".$keyword."%'";
    }
    $sql .=" ORDER BY id desc";
    $dssanpham = pdo_query($sql);
    return $dssanpham;
}
// Hàm lấy danh sách sản phẩm mới
function load_sanpham_moi() {
    $sql = "SELECT id, name, price, img FROM sanpham ORDER BY id DESC LIMIT 1";
    return pdo_query($sql);
}
// Lấy sản phẩm xem nhiều nhất
function loadAll_sanpham_top_view() {
    $sql = "SELECT id, name, price,img, view FROM sanpham ORDER BY view DESC LIMIT 1";
    return pdo_query($sql);
}
?>