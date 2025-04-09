<?php 
// Hàm thêm mới tài khoản
function insert_taikhoan($email, $user, $password) {
    $sql = "INSERT INTO taikhoan (email, user, password) 
            VALUES (:email, :user, :password)";
    pdo_execute($sql, [
        ':email' => $email,
        ':user' => $user,
        ':password' => $password
    ]);
}
// hàm kiểm tra thông tin user
function checkuser($user, $password) {
    $sql = "SELECT * FROM taikhoan WHERE user = :user AND password = :pass";
    return pdo_query_one($sql, [
        ':user' => $user,
        ':pass' => $password    
    ]);
}

//Hàm cập nhật tài khoản
function update_taikhoan($id, $user, $password, $email, $address, $telephone) {
    $sql = "UPDATE taikhoan set  user='".$user."', password='".$password."',
            email='".$email."', address='".$address."', telephone='".$telephone."' WHERE id=".$id;
            pdo_execute($sql);
}

// hàm kiểm tra email
function checkemail($email) {
    $sql = "SELECT * FROM taikhoan WHERE email = :email";
    return pdo_query_one($sql, [
        ':email' => $email    
    ]);
}

// Hàm load tất cả danh sách tài khoản
function loadAll_taikhoan(){
    $sql = "SELECT * FROM taikhoan order by id asc";    
    $list_taikhoan = pdo_query($sql);

    return $list_taikhoan;
}

function insert_taikhoan_admin($user, $password, $email, $address, $telephone, $role) {
    $sql = "INSERT INTO taikhoan (user, password, email, address, telephone, role) 
            VALUES (:user, :password, :email, :address, :telephone, :role)";
    pdo_execute($sql, [
        ':user' => $user,
        ':password' => $password,
        ':email' => $email,
        ':address' => $address,
        ':telephone' => $telephone,
        ':role' => $role
    ]);
}
?>