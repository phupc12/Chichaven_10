<div class="untree_co-section before-footer-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 mb-5 mb-md-0">
        <h2 class="h3 mb-3 text-black text-center">Quên mật khẩu</h2>
        <div class="p-3 p-lg-5 border">
          <?= show_error() # ở App/dao/thanhtoan.php ?>
          <?php if ($formSuccess) { ?>
            <div class="text-center">
            <p class="h2 text-primary">Đã gửi thành công mật khẩu về Email của bạn.<br> Vui lòng kiểm tra hộp thư.</p>
            <a href="index.php?act=doi-mat-khau" class="nav-link">Đổi mật khẩu mới</a>
            </div>
          <?php } else if ($formFailed) { ?>
             <div class="text-center">
             <p>Có lỗi xảy ra. Vui lòng liên hệ <span class="text-danger">ADMIN</span> để hỗ trợ.</p>
             </div>
          <?php } else { ?>
              <form method="post">
                <div class="form-group row mb-4">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Nhập email đăng kí <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_fname" name="email" value="<?= $email ?>"
                      placeholder="Nhập email của bạn">
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                  <button name="forgotPass" type="submit" class="btn btn-sm btn-primary">Lấy lại mật khẩu</button>
                </div>
              </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>