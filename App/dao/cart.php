<?php
function add_to_cart($product_id, $quantity) {
    try {
        $conn = pdo_get_connection();
        
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $sql_check = "SELECT * FROM gio_hang WHERE product_id = ?";
        $existing_cart_item = pdo_query_one($sql_check, $product_id);
        
        if ($existing_cart_item) {
            // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
            $new_quantity = $existing_cart_item['quantity'] + $quantity;
            $sql_update = "UPDATE gio_hang SET quantity = ? WHERE product_id = ?";
            pdo_execute($sql_update, $new_quantity, $product_id);
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
            $sql_insert = "INSERT INTO gio_hang (product_id, quantity) VALUES (?, ?)";
            pdo_execute($sql_insert, $product_id, $quantity);
        }
        
        return true; // Thêm sản phẩm vào giỏ hàng thành công
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
?>