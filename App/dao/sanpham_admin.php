<?php

function insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm){
    $sql = "insert into sanpham(name,price,img,mota,iddm) values('$tensp','$giasp','$hinh','$mota','$iddm')";
    pdo_execute($sql);
}
function delete_sanpham($id){
    $sql="delete from sanpham where id=".$id;
            pdo_execute($sql);
}
function loadall_sanpham($kyw="", $iddm=0) {
    $sql = "select * from sanpham where 1"; // where 1 is a dummy condition to make appending conditions easier
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm='" . $iddm . "'";
    }
    $sql .= " order by id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function  loadone_sanpham($id){
    $sql = "select * from sanpham where id=".$id;
    $dm=pdo_query_one($sql);
    return $dm;
}

function update_sanpham($id, $tensp, $giasp, $hinh, $mota, $iddm){
    if ($hinh != "") {
        $sql = "update sanpham set iddm='".$iddm."', name='".$tensp."', price='".$giasp."', mota='".$mota."', img='".$hinh."' where id=".$id;
    } else {
        $sql = "update sanpham set iddm='".$iddm."', name='".$tensp."', price='".$giasp."', mota='".$mota."' where id=".$id;
    }
    pdo_execute($sql);
}


// function update_sanpham($data){
//     $id = $data['id'];
//     $tensp = $data['tensp'];
//     $giasp = $data['giasp'];
//     $hinh = ""; // Bổ sung code để lấy đường dẫn hình ảnh nếu có
//     $mota = $data['mota'];
//     $iddm = $data['iddm'];

//     if ($hinh != "") {
//        $sql = "UPDATE sanpham SET iddm='".$iddm."', name='".$tensp."', price='".$giasp."', mota='".$mota."', img='".$hinh."' WHERE id=".$id;
//     } else {
//         $sql = "UPDATE sanpham SET iddm='".$iddm."', name='".$tensp."', price='".$giasp."', mota='".$mota."' WHERE id=".$id;
//     }
//     pdo_execute($sql);
// }

//     // Thực hiện cập nhật khi form được submit
//     if(isset($_POST['capnhat'])){
//         update_sanpham($_POST);
//         $thongbao = "Cập nhật sản phẩm thành công!";
//     }


?>