<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="d-flex">
            <div class="w-100 mx-2">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Thông tin đơn hàng</h2>
                        <div class="px-3 py-5 border">
                            <div class="row">
                                <?= $viewOrder # ở App/controllers/thanhtoan.php ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($order_verify) { ?>
            <div class="w-100 mx-2">
                <h2 class="h3 mb-3 text-black">Hành động</h2>
                <button type="button" class="btn btn-secondary fs-6 btn-sm d-block my-1" data-bs-toggle="modal"
                    data-bs-target="#modalXoaDH"><i class="fas fa-trash-alt me-1"></i>Hủy đơn hàng</button>
                <a href="index.php?act=lichsu" class="btn btn-primary fs-6 btn-sm btn-block d-block my-1">Danh sách Lịch
                    sử</a>
            </div>
            <?php }?>
        </div>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalXoaDH" tabindex="-1" aria-labelledby="xoadonhang" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="xoadonhang">Thông báo:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body fw-bold fs-5">
                Bạn có chắc chắn xóa đơn hàng này !
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                <a href="index.php?act=lichsu&token=<?= $token ?>&huy" class="btn btn-primary">Chắn chắn</a>
            </div>
        </div>
    </div>
</div>