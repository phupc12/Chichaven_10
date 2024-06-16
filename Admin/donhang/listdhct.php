<div class="container mt-5">
    <h2 class="mb-4">Danh Sách Đơn Hàng Chi tiết</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Order Detail ID</th>
                <th scope="col">Token ORDER</th>
                <th scope="col">Product ID</th>
                <th scope="col">Quantity</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody id="orderTableBody">
            <?php foreach($listdonhangct as $donhang): ?>
                <tr>
                    <td><?= $donhang['order_detail_id'] ?></td>
                    <td><?= $donhang['token_order'] ?></td>
                    <td><?= $donhang['product_id'] ?></td>
                    <td><?= $donhang['quantity'] ?></td>
                    <td><?= $donhang['unit_price'] ?></td>
                    <td>
                        <button onclick="confirmDh('<?= $donhang['token_order'] ?>')" class="btn btn-sm btn-danger">Xóa</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function confirmDh(token_order) {
        if (confirm("Bạn có chắc chắn muốn xóa danh mục này không?")) {
            window.location.href = "index.php?act=xoadhct&token_order=" + token_order;
        }
    }
</script>
