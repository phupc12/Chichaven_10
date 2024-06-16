  <!-- Start Registration Section -->
  <div style="padding-top: 120px;" class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <h2 class="mb-4 text-center">Đăng ký</h2>
        <form action="index.php?act=register" method="post">
          <div class="mb-3">
            <label for="registerName" class="form-label">Tên đăng nhập</label>
            <input type="text" name="name" class="form-control" id="registerName" placeholder="Nhập tên của bạn" required>
          </div>
          <div class="mb-3">
            <label for="registerEmail" class="form-label">Địa chỉ email</label>
            <input type="email" name="email" class="form-control" id="registerEmail" placeholder="Nhập emal của bạn" required>
          </div>
          <div class="mb-3">
            <label for="registerPassword" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="registerPassword" placeholder="Nhập mật khẩu của bạn" required>
          </div>
          <div class="mb-3">
            <label for="registerPhone" class="form-label">Số điện thoại</label>
            <input type="tel" name="phone" class="form-control" id="registerPhone" placeholder="Nhập số điện thoại của bạn" required>
          </div>
            
          <div class="d-grid">
            <button type="submit" value="Đăng ký" name="dangky" class="btn btn-primary">Đăng ký</button>
          </div>
          <p class="mt-3 text-center">Bạn đã có tài khoản? <a href="index.php?act=login">Đăng nhập</a></p>
        </form>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
              const registerName = document.getElementById("registerName");
              const registerEmail = document.getElementById("registerEmail");
              const registerPassword = document.getElementById("registerPassword");
              const registerPhone = document.getElementById("registerPhone");
              const registerButton = document.querySelector("button[name='dangky']");

              registerButton.disabled = true;
              function checkRegistrationForm() {
                if (registerName.value.trim() !== "" && registerEmail.value.trim() !== "" && registerPassword.value.trim() !== "" && registerPhone.value.trim() !== "") {
                  registerButton.disabled = false;
                } else {
                  registerButton.disabled = true;
                }
              }

              registerName.addEventListener("input", checkRegistrationForm);
              registerEmail.addEventListener("input", checkRegistrationForm);
              registerPassword.addEventListener("input", checkRegistrationForm);
              registerPhone.addEventListener("input", checkRegistrationForm);
              registerAddress.addEventListener("input", checkRegistrationForm);
              // Lấy ảnh ngẫu nhiên từ Lorem Picsum
        const randomImage = `https://picsum.photos/600/400?random=${Math.floor(Math.random() * 1000)}`;

// Thêm ảnh vào trang
const imageContainer = document.createElement("div");
imageContainer.className = "text-center mb-4";
imageContainer.innerHTML = `<img src="${randomImage}" alt="Random Image" class="img-fluid" style="max-width: 100%; height: auto;">`;
document.querySelector(".col-lg-6").insertBefore(imageContainer, document.querySelector("form"));
            });
        </script>

        <h6 style="color: red;">
        <?php
            if(isset($tb)&&($tb!="")){
                echo $tb;
            }
        ?>
        </h6>
      </div>
    </div>
  </div>
  <!-- End Registration Section -->