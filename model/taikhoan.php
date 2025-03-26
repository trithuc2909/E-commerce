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


?>