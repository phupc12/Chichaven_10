<?php
    function loadall_sanpham_home(){
        $sql ="select * from sanpham where 1 order by id desc limit 0,3";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham_home_footer(){
        $sql ="SELECT * FROM sanpham ORDER BY RAND() LIMIT 3";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham_shop($kyw = "", $iddm=0){
        $sql ="select * from sanpham where 1";
        if ($kyw != "") {
            $sql .= " and name like '%" . $kyw . "%'";
        }
        if ($iddm > 0) {
            $sql .= " and iddm='" . $iddm . "'";
        }
        $sql .= " order by id desc limit 0,8";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function loadall_danhmuc() {
        $sql = "SELECT * FROM danhmuc";
        $listdanhmuc = pdo_query($sql);
        return $listdanhmuc;
    }
    // function loadall_sanpham($kyw="", $iddm=0){
    //     $sql ="select * from sanpham where 1";
    //     if($kyw!=""){
    //         $sql.="and name like '%".$kyw."%'";
    //     }
    //     if($iddm>0){
    //         $sql.="and iddm ='".$iddm."'";
    //     }
    //     $sql.="order by id desc";
    //     $listsanpham=pdo_query($sql);
    //     return $listsanpham;
    // }
    // Sản phẩm chi tiết
    function load_sanpham($id){
        $sql="select * from sanpham where id=".$id;
        $sp=pdo_query_one($sql);
        return $sp;
    }
    //Sản phẩm cùng danh mục
    function load_sanphamdm($id, $iddm){
        $sql="select * from sanpham where iddm =".$iddm." AND id <> ".$id;
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
  
?>