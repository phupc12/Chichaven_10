		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="App/views/public/images/sofa.png" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="App/views/public/images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Đăng ký tin</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Nhập tên của bạn">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Nhập email của bạn">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
						<p class="mb-4">Hãy theo dõi chúng tôi để biết thêm chi tiết và cập nhật các khuyến mãi mới nhất dành cho bạn</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Về chúng tôi</a></li>
									<li><a href="#">Dịch vụ</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Liên hệ chúng tôi</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Ủng hộ</a></li>
									<li><a href="#">Kiến thức cơ bản</a></li>
									<li><a href="#">Trò chuyện trực tiếp</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Việc làm</a></li>
									<li><a href="#">Đội của chúng tôi</a></li>
									<li><a href="#">Khả năng lãnh đạo</a></li>
									<li><a href="#">Chính sách bảo mật</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Ghế Bắc Âu</a></li>
									<li><a href="#">Cruzo Aero</a></li>
									<li><a href="#">Ghế làm việc</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Bản quyền &copy;<script>document.write(new Date().getFullYear());</script>. Mọi quyền được bảo lưu. &mdash; Được thiết kế bởi <a href="">ChicHaven &mdash; </a> Được phân phới bởi <a hreff="">ChicHaven</a>  <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Điều khoản &amp; điều kiện</a></li>
								<li><a href="#">Chính sách bảo mật</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="App/views/public/js/bootstrap.bundle.min.js"></script>
		<script src="App/views/public/js/tiny-slider.js"></script>
		<script src="App/views/public/js/custom.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script>
    $(document).ready(function(){
        $('.quantity-container').on('click', '.increase, .decrease', function(){
            var $input = $(this).closest('.quantity-container').find('.quantity-amount');
            var currentQuantity = parseInt($input.val());
            var newQuantity = $(this).hasClass('increase') ? currentQuantity + 1 : currentQuantity - 1;
            if (newQuantity < 1) newQuantity = 1;
            $input.val(newQuantity);

            var row = $(this).closest('tr');
            var productId = row.data('id'); // Assuming each row has a data-id attribute

            // AJAX request to update quantity
            $.ajax({
                url: 'update_cart.php',
                type: 'POST',
                data: {
                    id: productId,
                    quantity: newQuantity
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    row.find('.product-total').text('$' + data.itemTotal.toFixed(2));
                    $('#cart-subtotal').text('$' + data.cartTotal.toFixed(2));
                    $('#cart-total').text('$' + data.cartTotal.toFixed(2));
                }
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
      const randomImage = `https://picsum.photos/200?random=${Math.floor(Math.random() * 1000)}`;
      const randomImgElements = document.querySelectorAll('.random-img');
      randomImgElements.forEach(img => {
        img.src = randomImage;
      });
    });
  </script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

	</body>

</html>
