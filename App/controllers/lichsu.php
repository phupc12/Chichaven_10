<?php
$viewListOrder = '';
$order_verify = false;
#TOKEN
if (isset($_GET['token']) && $_GET['token']) {
    if ($_SESSION['user']) { // xác minh đăng nhập
        $token = $_GET['token'];
        $order = pdo_query_one('SELECT * FROM orders WHERE token_order = "' . $token . '" AND status = 1 AND customer_id =' . $_SESSION['user']['id']);
        if ($order) { // xác minh đơn hàng có phải của USER hay không
            $order_verify = true;
            extract($order);
            #XÓA ĐƠN HÀNG
            if (isset($_GET['huy'])) {
                pdo_execute('UPDATE orders SET status = 2 WHERE token_order = "'.$token.'"');
                header('Location: index.php?act=lichsu');
                exit;
            }
            # danh sách hóa đơn chi tiết của TOKEN
            $list_order_detail = pdo_query('SELECT * FROM orderdetails WHERE token_order = "' . $token . '"');
            # dữ liệu hóa đơn (date, total) của TOKEN
            extract(pdo_query_one('SELECT order_date date, total_amount total FROM orders WHERE token_order = "' . $token . '"'));
            $viewOrder .= '
                <div class="col-12 col-lg-4">
                    <div><strong>Họ tên :</strong>' . $name . '</div>
                </div>
                <div class="col-12 col-lg-3">
                    <div><strong>SĐT :</strong>' . $phone . '</div>
                </div>
                <div class="col-12 col-lg-5">
                    <div><strong>Email :</strong>' . $email . '</div>
                </div>
                <div class="col-12">
                    <div><strong>Mã hóa đơn :</strong>' . $token . '</div>
                </div>
                <div class="col-12">
                    <div><strong>Tổng tiền :</strong>' . number_format($total) . ' <sup>vnđ</sup></div>
                </div>
                <div class="col-12">
                    <div><strong>Ngày tạo đơn :</strong>' . str_replace(' ', ' lúc ', $date) . '</div>
                </div>
                <div class="col-12">
                    <div><strong>Địa chỉ giao hàng:</strong>' . $address . '</div>
                </div>
                <hr class="my-3 py-1">
                <table class="table site-block-order-table">
                    <thead>
                        <th class="text-start">Sản phẩm</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-end">Giá</th>
                        <th class="text-end">Thành tiền</th>
                    </thead>
                    <tbody>';
            foreach ($list_order_detail as $order_detail) {
                extract($order_detail);
                extract(pdo_query_one('SELECT name tensanpham FROM sanpham WHERE id =' . $product_id));
                $viewOrder .=
                    '<tr>
                        <td class="text-start">' . $tensanpham . '</td>
                        <td class="text-center">' . $quantity . ' </td>
                        <td class="text-end">' . number_format($unit_price) . ' vnđ</td>
                        <td class="text-end">' . number_format($quantity * $unit_price) . ' vnđ</td>
                    </tr>';
            }
            $viewOrder .=
                '</tbody>
            </table>';
        } else
            $viewOrder .= '<div class="text-center text-danger">Đơn hàng không tồn tại hoặc không phải của bạn !</div>';
    } else
        $viewOrder .= '<div class="text-center text-danger">Vui lòng đăng nhập để xác thực hóa đơn của bạn !</div>';

    #RENDER VIEW
    require_once 'App/views/lichsu_chitiet.php';
} else {
    #LIST
    if ($_SESSION['user']) {
        $list_orders = pdo_query('SELECT * FROM orders WHERE customer_id =' . $_SESSION['user']['id'] . ' AND status = 1 ORDER BY order_date DESC');

        if ($list_orders) {
            foreach ($list_orders as $order) {
                extract($order);
                $viewListOrder .= '
                <tr class="align-middle">
                    <td>' . $token_order . '</td>
                    <td>' . number_format($total_amount) . ' <sup>vnđ</sup></td>
                    <td>' . $order_date . '</td>
                    <td>' . $status . '</td>
                    <td class="text-end">
                        <a href="index.php?act=lichsu&token=' . $token_order . '" class="btn btn-primary btn-sm"><span class="small"><i class="far fa-eye me-1"></i>Xem chi tiết</span></a>
                    </td>
                </tr>
                ';
            }
        } else
            $viewListOrder .= '
            <tr class="align-middle">
                <td class="text-center" colspan="5">Bạn chưa có đơn hàng nào.</td>
            </tr>';

    } else
        $viewListOrder .= '
        <tr class="align-middle">
            <td class="text-center" colspan="5">Vui lòng đăng nhập để xem lịch sử mua hàng <a class="nav-link text-primary ms-1" href="index.php?act=login">Đăng nhập</a></td>
        </tr>';

    #RENDER VIEW
    require_once 'App/views/lichsu.php';
}