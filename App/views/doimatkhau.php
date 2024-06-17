<div class="untree_co-section before-footer-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 mb-5 mb-md-0">
        <h2 class="h3 mb-3 text-black text-center">Đổi mật khẩu</h2>
        <div class="p-3 p-lg-5 border">
        <?= show_error() # ở App/dao/thanhtoan.php ?>
        <?php if($formFailed){ ?>
          <div class="text-center">
            <p class="text-danger p-0 h5">Vui lòng đăng nhập để đổi mật khẩu</p>
            <a href="index.php?act=login" class="nav-link text-primary fs-5">&rarr; Đăng nhập</a>
          </div>
        <?php } else { ?>
          <form method="post">
            <div class="form-group row mb-4">
              <div class="col-md-12">
                <label for="c_fname" class="text-black">Mật khẩu cũ <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="c_fname" name="oldPass" value="<?= $oldPass ?>"
                  placeholder="Mật khẩu cũ của bạn">
              </div>

            </div>
            <div class="form-group row mb-4">
              <div class="col-md-12">
                <label for="c_address" class="text-black">Mật khẩu mới<span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="address" name="newPass" value="<?= $newPass ?>"
                  placeholder="Mật khẩu mới của bạn">
              </div>
            </div>
            <div class="form-group row mb-4">
              <div class="col-md-12">
                <label for="c_email_address" class="text-black">Xác thực mật khẩu mới <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="c_email_address" name="verifyPass"
                  value="<?= '' ?>" placeholder="Xác thực mật khẩu mới">
              </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <button name="changePass" type="submit" class="btn btn-sm btn-primary">Đổi mật khẩu</button>
            </div>
          </form>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>