<?php
    // Hàm thêm mới bình luận
    function insert_binhluan ($noidung, $iduser, $idpro, $ngaybinhluan){
        $sql = "INSERT INTO binhluan(noidung,iduser,idpro,ngaybinhluan) VALUES ('$noidung','$iduser','$idpro','$ngaybinhluan')";
        pdo_execute($sql);
    } 
    // Hàm load danh sách bình luận
    function loadAll_binhluan($idpro){
        $sql = "SELECT * FROM binhluan WHERE idpro='".$idpro."' order by id asc";    
        $list_binhluan = pdo_query($sql);

        return $list_binhluan;
    }
    
?>