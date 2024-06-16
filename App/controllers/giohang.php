<?php
# Thêm giỏ hàng
if(isset($_POST['addtocart']) && $_POST['addtocart']){
    $id = $_POST['id'];
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    $found = false;
    
    foreach($_SESSION['mycart'] as &$item) {
        if($item[0] == $id) {
            $item[4] += $quantity; // Tăng số lượng sản phẩm
            $item[5] = $item[3] * $item[4]; // Cập nhật thành tiền
            $found = true;
            break;
        }
    }

    if(!$found) {
        $name = $_POST['name'];
        $img = $_POST['img'];
        $price = $_POST['price'];
        $ttien = $price * $quantity;
        $spadd = [$id, $name, $img, $price, $quantity, $ttien];
        array_push($_SESSION['mycart'], $spadd);
    }
}

# Thay đổi số lượng

//Tăng số lượng
if(isset($_POST['themSL']) && isset($_POST['indexCart'])) {
    $_SESSION['mycart'][$_POST['indexCart']][4]++;
}

if(isset($_POST['giamSL']) && isset($_POST['indexCart'])) {
    $_SESSION['mycart'][$_POST['indexCart']][4]--;
}

# Hiển thị VIEW
require_once "App/views/cart/viewcart.php";