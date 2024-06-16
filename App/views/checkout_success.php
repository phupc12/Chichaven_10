<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row">
            <div class="col-12 my-3">
                <div class="text-success text-center h2"><i class="fas fa-clipboard-check me-2"></i>Tạo đơn hàng thành
                    công</div>
                <div class="text-center">Đơn hàng sẽ được giao đến ngay cho bạn ! <strong>Hotline hỗ trợ:
                        0333666999</strong></div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Thông tin đơn hàng</h2>
                        <div class="p-lg-5 border">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div><strong>Họ tên :</strong> <?= $name ?></div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div><strong>SĐT :</strong> <?= $phone ?></div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div><strong>Email :</strong> <?= $email ?></div>
                                </div>
                                <div class="col-12">
                                    <div><strong>Mã hóa đơn :</strong> <?= $token ?></div>
                                </div>
                                <div class="col-12">
                                    <div><strong>Tổng tiền :</strong> <?= number_format($total) ?> <sup>vnđ</sup></div>
                                </div>
                                <div class="col-12">
                                    <div><strong>Ngày tạo đơn :</strong> <?= str_replace(' ',' lúc ',$date) ?></div>
                                </div>
                                <div class="col-12">
                                    <div><strong>Địa chỉ giao hàng:</strong> <?= $address ?></div>
                                </div>
                            </div>
                            <hr>
                            <table class="table site-block-order-table">
                                <thead>
                                    <th class="text-start">Sản phẩm</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-end">Giá</th>
                                    <th class="text-end">Thành tiền</th>
                                </thead>
                                <tbody>
                                    <?= $viewOrder # ở App/controllers/thanhtoan.php ?>
                                </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-lg-0 mt-3 col-12 col-md-4">
                <h2 class="h3 mb-3 text-black">Di chuyển</h2>
                <div class="d-flex justify-content-between">
                    <a href="index.php?act=lichsu&token=<?=$token?>" class="btn btn-primary fs-6 btn-sm btn-block">Lịch sử mua hàng</a>
                    <a href="index.php?act=shop" class="btn btn-black btn-sm btn-block">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    </div>
</div>