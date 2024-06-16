<?php
function them_hoa_don($token,$customer_id,$total_amount,$name,$phone,$address,$email){
    $sql = "insert into orders(token_order,customer_id,order_date,total_amount,name,phone,address,email) values('$token',$customer_id,current_timestamp(),$total_amount,'$name','$phone','$address','$email')";
    pdo_execute($sql);
}

function them_hoa_don_chi_tiet($token,$product_id,$quantity,$unit_price){
    $sql = "insert into orderdetails(token_order,product_id,quantity,unit_price) values('$token',$product_id,$quantity,$unit_price)";
    pdo_execute($sql);
}

function add_error($content) {
    $_SESSION['error'][] = $content;
}

function show_error() {
    $show = '';
    if($_SESSION['error']) {
        foreach ($_SESSION['error'] as $error) {
            $show .= '<div class="text-danger"><i class="fas fa-exclamation-triangle me-2"></i>'.$error.'</div><br>';
        }
        unset($_SESSION['error']);
        return $show;
    }
}

function add_token() {
    start:
    $chuoi_ki_tu = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = substr(str_shuffle($chuoi_ki_tu), 0, 10); //str_shuffle: hoán đổi vị trí các kí tự trong chuỗi theo ngẫu nhiên; substr: cắt chuỗi bắt đầu từ vị trí thứ 0 và cắt 10 kí tự (tức cắt còn 10 kí tự đầu tiên ở chuỗi)
    $check_token_exits = pdo_query_one('SELECT token_order FROM orders WHERE token_order = "'.$token.'"');
    if(!$check_token_exits) return $token;
    else goto start;
}

function show_404() {
    require_once 'App/views/404.php';
    require_once 'App/views/footer.php';
    exit;
}