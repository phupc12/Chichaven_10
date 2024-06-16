<!-- Start Login Section -->
<div style="padding-top: 120px;" class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <h2 class="mb-4 text-center">Đăng nhập</h2>
      <form action="index.php?act=login" method="post">
        <div class="mb-3">
          <label for="loginEmail" class="form-label">Email đăng nhập</label>
          <input type="email" name="email" class="form-control" id="loginEmail" placeholder="Nhập email của bạn" required>
        </div>
        <div class="mb-3">
          <label for="loginPassword" class="form-label">Mật khẩu</label>
          <input type="password" name="pass" class="form-control" id="loginPassword" placeholder="Nhập mật khẩu của bạn" required>
        </div>
        <div class="d-grid">
          <button id="loginButton" type="submit" value="Đăng nhập" name="dangnhap" class="btn btn-primary">Đăng nhập</button>
        </div>
        <p class="mt-3 text-center">Bạn chưa có tài khoản? <a href="index.php?act=register">Đăng ký</a></p>
      </form>
    </div>
  </div>
</div>


<script>
        document.addEventListener("DOMContentLoaded", function() {
          const loginEmail = document.getElementById("loginEmail");
          const loginPassword = document.getElementById("loginPassword");
          const loginButton = document.querySelector("button[name='dangnhap']");
          loginButton.disabled = true;
          function checkLoginForm() {
            if (loginEmail.value.trim() !== "" && loginPassword.value.trim() !== "") {
              loginButton.disabled = false;
            } else {
              loginButton.disabled = true;
            }
          }
          loginEmail.addEventListener("input", checkLoginForm);
          loginPassword.addEventListener("input", checkLoginForm);
        });
      </script>

<!-- End Login Section -->
