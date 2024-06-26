<div class="container mt-5">
    <h2 class="mb-4">Danh Sách Đơn Hàng</h2>
    <div class="col">
        <form action="#" method="post" class="d-flex align-items-center">
            <input type="text" name="kyw" class="form-control me-2" placeholder="Nhập từ khóa">
            <select name="iddh" class="form-select me-2">
                <option value="">Tất cả đơn hàng</option>
                <?php foreach ($listdonhangct as $dhct): ?>
                    <option value="<?php echo $dhct['token_order']; ?>"><?php echo $dhct['token_order']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" class="btn btn-primary" name="listok" value="Lọc">
        </form>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Token Order</th>
                <th scope="col">Customer ID</th>
                <th scope="col">Order Date</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody id="orderTableBody">
            <?php foreach($listdonhang as $donhang): ?>
                <tr>
                    <td><?php echo $donhang['token_order']; ?></td>
                    <td><?php echo $donhang['customer_id']; ?></td>
                    <td><?php echo $donhang['order_date']; ?></td>
                    <td><?php echo $donhang['total_amount']; ?></td>
                    <td>
                        <?php 
                        $status_class = '';
                        $status_text = '';
                        switch ($donhang['status']) {
                            case 1:
                                $status_class = 'badge bg-primary';
                                $status_text = 'Đơn hàng mới';
                                break;
                            case 2:
                                $status_class = 'badge bg-warning';
                                $status_text = 'Đang vận chuyển';
                                break;
                            case 3:
                                $status_class = 'badge bg-info';
                                $status_text = 'Đơn đã nhận';
                                break;
                            case 4:
                                $status_class = 'badge bg-success';
                                $status_text = 'Hoàn tất';
                                break;
                            default:
                                $status_class = 'badge bg-danger';
                                $status_text = 'Đơn hàng bị hủy';
                                break;
                        }
                        ?>
                        <span class="<?php echo $status_class; ?>"><?php echo $status_text; ?></span>
                    </td>
                    <td><?php echo $donhang['name']; ?></td>
                    <td><?php echo $donhang['address']; ?></td>
                    <td><?php echo $donhang['email']; ?></td>
                    <td><?php echo $donhang['phone']; ?></td>
                    <td>
                        <a href="index.php?act=suadonhang&token_order=<?php echo $donhang['token_order']; ?>" class="btn btn-sm btn-primary">Sửa</a>
                        <button onclick="confirmDh('<?php echo $donhang['token_order']; ?>')" class="btn btn-sm btn-danger">Xóa</button>
                    </td>
                </tr>
            <?php endforeach; ?>
      
            <tr>
                <td colspan="10" class="text-end">
                    <button class="btn btn-primary"><a href="index.php?act=dsdhct" class="text-white text-decoration-none">Đơn hàng chi tiết</a></button>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

<script>
function confirmDh(token_order) {
    if (confirm("Bạn có chắc chắn muốn xóa danh mục này không?")) {
        window.location.href = "index.php?act=xoadh&token_order=" + token_order;
    }
}
</script>
