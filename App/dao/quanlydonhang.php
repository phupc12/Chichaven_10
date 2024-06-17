<?php
function loadall_donhangct(){
    $sql = "select * from orderdetails order by order_detail_id desc";
            $listdonhangct = pdo_query($sql);
            return $listdonhangct;
}
function delete_donhangct($token_order){
    $sql = "DELETE FROM orderdetails WHERE token_order = ?";
    pdo_execute($sql, $token_order);
}

function loadall_donhang($kyw="", $token_order=0) {
    $sql = "select * from orders where 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($token_order > 0) {
        $sql .= " and token_order='" . $token_order . "'";
    }
    $sql .= " order by token_order desc";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
}
function delete_donhang($token_order){
    $sql = "DELETE FROM orderdetails WHERE token_order = ?";
    pdo_execute($sql, $token_order);
    $sql = "DELETE FROM orders WHERE token_order = ?";
    pdo_execute($sql, $token_order);
    
}
function loadone_donghang($token_order) {
    return pdo_query_one("SELECT * FROM orders WHERE token_order = '".$token_order."'");
}


function  update_status($token_order, $status){
    $sql = "UPDATE orders set status= " . $status . " where token_order='" . $token_order."'";
    pdo_query_one($sql);

}