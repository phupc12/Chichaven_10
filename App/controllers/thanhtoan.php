<?php
$total = 0;
$viewCart = $viewOrder = '';
$checkout = false;
# LOAD THONG TIN USER
if ($_SESSION['user'])
    ($_SESSION['user']);
else {
    $name = $phone = $email = $address = '';
}

#Tính tổng
for ($i = 0; $i < count($_SESSION['mycart']); $i++) {
    $total += $_SESSION['mycart'][$i][5];
}
# Thanh toán
if (isset($_POST['thanhToan']) && $total) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    if ($name) {
        if ($email) {
            if ($phone) {
                if ($address) {
                    # tạo hóa đơn
                    $token = add_token(); # ở App/dao/thanhtoan.php;

                    if ($_SESSION['user'])
                        $customer_id = $_SESSION['user']['id'];
                    else
                        $customer_id = '';

                    them_hoa_don($token, $customer_id, $total, $name, $phone, $address, $email);

                    # tạo hóa đơn chi tiết
                    for ($i = 0; $i < count($_SESSION['mycart']); $i++) {
                        them_hoa_don_chi_tiet($token, $_SESSION['mycart'][$i][0], $_SESSION['mycart'][$i][4], $_SESSION['mycart'][$i][3]);
                        $checkout = true;
                    }
                    #xóa giỏ hàng
                    unset($_SESSION['mycart']);
                } else
                    add_error('Vui lòng nhập địa chỉ giao hàng.');
            } else
                add_error('Vui lòng nhập SĐT.');
        } else
            add_error('Vui lòng nhập địa chỉ E-mail.');
    } else
        add_error('Vui lòng nhập họ và tên.');
}

# view giỏ hàng
if ($_SESSION['mycart']) {
    for ($i = 0; $i < count($_SESSION['mycart']); $i++) {
        $viewCart .= '
        <tr>
            <td class="text-start">' . $_SESSION['mycart'][$i][1] . '</td>
            <td class="text-center">' . number_format($_SESSION['mycart'][$i][4]) . ' </td>
            <td class="text-end">' . number_format($_SESSION['mycart'][$i][3]) . ' vnđ</td>
            <td class="text-end">' . number_format($_SESSION['mycart'][$i][5]) . ' vnđ</td>
        </tr>';
    }
    $viewCart .= '
<tr>
    <td class="text-black fw-bold fw-normal" colspan="3"><strong>Tổng tiền</strong></td>
    <td class="text-black fw-bold fw-normal text-end">' . number_format($total) . 'vnđ</td>
</tr>';
} else
    $viewCart = '
<tr>
    <td class="text-center" colspan="4" >Chưa có sản phẩm nào</td>
</tr>';

# view hóa đơn
if ($checkout) {
    #view
    $list_order_detail = pdo_query('SELECT * FROM orderdetails WHERE token_order = "' . $token . '"');
    extract(pdo_query_one('SELECT order_date date, total_amount total FROM orders WHERE token_order = "' . $token . '"'));
    foreach ($list_order_detail as $order_detail) {
        extract($order_detail);
        extract(pdo_query_one('SELECT name tensanpham FROM sanpham WHERE id =' . $product_id));
        $viewOrder .= '
    <tr>
        <td style="margin-left:5px; padding: 15px 5px;border: 1px solid;text-align:start">' . $tensanpham . '</td>
        <td style="padding: 15px 5px;border: 1px solid;text-align:center">' . $quantity . ' </td>
        <td style="padding: 15px 5px;border: 1px solid;text-align:end">' . number_format($unit_price) . ' vnđ</td>
        <td style="padding: 15px 5px;border: 1px solid;text-align:end">' . number_format($quantity * $unit_price) . ' vnđ</td>
    </tr>';
    }
    #gửi mail
    $invoice = '
    <table style="border: 1px solid;text-align: center;padding: 5px; width: 100%">
        <thead style="border: 1px solid;">
            <th style="margin-left:5px; padding: 10px 2px;border: 1px solid; background-color: #3b5d50 ;color: #ffffff;text-align:start">Tên sản phẩm</th>
            <th style="padding: 10px 2px;border: 1px solid; background-color: #3b5d50 ;color: #ffffff;text-align:center">Số lượng</th>
            <th style="padding: 10px 2px;border: 1px solid; background-color: #3b5d50 ;color: #ffffff;text-align:end">Giá</th>
            <th style="padding: 10px 2px;border: 1px solid; background-color: #3b5d50 ;color: #ffffff;text-align:end">Thành tiền</th>
        </thead>
        <tbody>
        ';
    $invoice .= $viewOrder;
    $invoice .= '</tbody></table>';

    require_once 'App/dao/mail.php';
    mailInvoice($email, $invoice);
}

# RENDER VIEW

if ($checkout)
    require_once "App/views/checkout_success.php";
else
    require_once "App/views/checkout.php";