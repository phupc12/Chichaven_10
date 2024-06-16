<div class="untree_co-section before-footer-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-5 mb-md-0">
        <h2 class="h3 mb-3 text-black">Thông tin giao hàng</h2>
        <div class="p-3 p-lg-5 border">
        <?= show_error() # ở App/dao/thanhtoan.php ?>
          <form method="post">
            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_fname" class="text-black">Họ Tên <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_fname" name="name" value="<?= $name ?>"
                  placeholder="Họ tên của bạn">
              </div>

            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_address" class="text-black">Địa chỉ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="address" name="address" value="<?= $address ?>"
                  placeholder="Địa chỉ của bạn">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <label for="c_email_address" class="text-black">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="c_email_address" name="email"
                  value="<?= $email ?>" placeholder="Email của bạn">

              </div>
              <div class="col-md-6">
                <label for="c_phone" class="text-black">Số điện thoại <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_phone" name="phone" value="<?= $phone ?>"
                  placeholder="Số điện thoại của bạn">
              </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 small">
        <div class="row mb-5">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Đơn hàng của bạn</h2>
            <div class="p-3 p-lg-5 border">
              <table class="table site-block-order-table mb-5">
                <thead>
                  <th class="text-start">Sản phẩm</th>
                  <th class="text-center">Số lượng</th>
                  <th class="text-end">Giá</th>
                  <th class="text-end">Thành tiền</th>
                </thead>
                <tbody>
                  <?= $viewCart # ở App/controllers/thanhtoan.php ?>
                </tbody>
              </table>
              <div class="d-flex justify-content-between">
                <a href="index.php?act=addtocart" class="btn btn-primary fs-6 btn-sm btn-block">Quay lại Giỏ hàng</a>
                <button <?= $total ? '' : 'disabled' ?> name="thanhToan" type="submit" class="btn btn-black btn-sm btn-block">Thanh toán</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>