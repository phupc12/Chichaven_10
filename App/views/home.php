		<!-- Start Hero Section -->
        <div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Studio thiết kế nội thất <span clsas="d-block">hiện đại</span></h1>
								<p class="mb-4">Chúng tôi sẽ mang đến những sản phẩm chất lượng đến cho khách hàng. Sự hài lòng của khách hàng là niềm vinh hạnh cho chúng tôi.</p>
								<p><a href="" class="btn btn-secondary me-2">Mua ngay</a><a href="index.php?act=shop" class="btn btn-white-outline">Khám phá</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="App/views/public/images/couch.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Được chế tạo bằng vật liệu tuyệt vời.</h2>
						<p class="mb-4">Với những vật liệu tuyệt vời chúng tôi mong muốn mang đến cho khách hàng những trải nghiệm thú vị nhất. </p>
						<p><a href="shop.html" class="btn">Khám phá</a></p>
					</div> 
					<!-- End Column 1 -->
                    <?php
                    $i=0;
                        foreach ($spnew as $sp) {
                            extract($sp);
							$linksp="index.php?act=sanphamchitiet&idsp=".$id;
                            $img=$img_path.$img;
                            if(($i==2)||($i==5)||($i==8)){
                                $mr="";
                            }else{
                                $mr="mr";
                            }
                            echo '<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0 '.$mr.' ">
                                        <a class="product-item" href="'.$linksp.'">
                                            <img src="'.$img.'" class="img-fluid product-thumbnail">
                                            <h3 class="product-title">'.$name.'</h3>
                                            <strong class="product-price">'.$price.'<sup>đ</sup></strong>
                
                                            <span class="icon-cross">
                                                <img src="App/views/public/images/cross.svg" class="img-fluid">
                                            </span>
                                        </a>
                                    </div> ';
                                    $i+=1;
                            }
                    ?>
					<!-- Start Column 2 -->
					<!-- <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="cart.html">
							<img src="App/views/public/images/product-1.png" class="img-fluid product-thumbnail">
							<h3 class="product-title">Nordic Chair</h3>
							<strong class="product-price">$50.00</strong>

							<span class="icon-cross">
								<img src="App/views/public/images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div>  -->
					<!-- End Column 2 -->

					<!-- Start Column 3 -->
					<!-- <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="cart.html">
							<img src="App/views/public/images/product-2.png" class="img-fluid product-thumbnail">
							<h3 class="product-title">Kruzo Aero Chair</h3>
							<strong class="product-price">$78.00</strong>

							<span class="icon-cross">
								<img src="App/views/public/images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> -->
					<!-- End Column 3 -->

					<!-- Start Column 4 -->
					<!-- <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="cart.html">
							<img src="App/views/public/images/product-3.png" class="img-fluid product-thumbnail">
							<h3 class="product-title">Ergonomic Chair</h3>
							<strong class="product-price">$43.00</strong>

							<span class="icon-cross">
								<img src="App/views/public/images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> -->
					<!-- End Column 4 -->

				</div>
			</div>
		</div>
		<!-- End Product Section -->

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Tại sao chọn chúng tôi</h2>
						<p>Tìm nguồn cảm hứng, sản phẩm và những ưu điểm để biến điều đó thành hiện thực — tất cả ở cùng một nơi.</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="App/views/public/images/truck.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Vận chuyển nhanh &amp; miễn phí</h3>
									<p><span style="color:black; font-weight: 500;">MIỄN PHÍ</span> vận chuyển cho các đơn hàng trên $49!</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="App/views/public/images/bag.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Dễ dàng mua sắm</h3>
									<p>Tiện lợi, mua sắm theo sở thích của riêng bạn.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="App/views/public/images/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Hỗ trợ 24/7</h3>
									<p>Các chuyên gia của chúng tôi sẽ hỗ trợ bạn 24/7 mọi lúc bạn cần.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="App/views/public/images/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Trả lại miễn phí</h3>
									<p>Trả hàng hoàn toàn miễn phí.</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="App/views/public/images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="App/views/public/images/img-grid-1.jpg" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="App/views/public/images/img-grid-2.jpg" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="App/views/public/images/img-grid-3.jpg" alt="Untree.co"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4">Chúng tôi giúp bạn thiết kế nội thất hiện đại</h2>
						<p>Biến ngôi nhà mơ ước của bạn thành hiện thực. Sở hữu công cụ tất cả trong một dành cho tiếp thị, CRM và quản lý dự án. Duyệt qua bộ sưu tập ý tưởng thiết kế nhà lớn nhất cho mọi phòng trong nhà bạn. Với hàng triệu bức ảnh đầy cảm hứng từ các chuyên gia thiết kế, bạn sẽ thấy mình chỉ muốn biến ngôi nhà của mình thành ngôi nhà mơ ước.</p>

						<ul class="list-unstyled custom-list my-4">
							<li>Tham gia cùng hàng triệu chuyên gia tại nhà</li>
							<li>Kiến trúc sư & Nhà thiết kế xây dựng</li>
							<li>Kiến trúc sư cảnh quan & Nhà thiết kế cảnh quan</li>
							<li>Hệ thống chiếu sáng & âm thanh ngoài trời</li>
						</ul>
						<p><a herf="#" class="btn">Explore</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- End We Help Section -->

		<!-- Start Popular Product -->
		<div class="popular-product">
			<div class="container">
				<div class="row">
				<?php
					$i=0;
					foreach ($spfooter as $sp) {
						extract($sp);
						$linksp="index.php?act=sanphamchitiet&idsp=".$id;
						$img=$img_path.$img;
						if(($i==2)||($i==5)||($i==8)){
							$mr="";
						}else{
							$mr="mr";
						}
						echo'<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
								<div class="product-item-sm d-flex">
									<div class="thumbnail">
										<img src="'.$img.'" alt="Image" class="img-fluid">
									</div>
									<div class="pt-3">
										<h3>'.$name.'</h3>
										<p>Phong cách Bắc Âu được biết đến đến rộng rãi và đã trở thành xu hướng được ưa chuộng nhờ sự sang trọng trong thiết kế. </p>
										<p><a href="'.$linksp.'">Đọc thêm</a></p>
									</div>
								</div>
							</div>';
						}
				?>			
					

					<!-- // <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
					// 	<div class="product-item-sm d-flex">
					// 		<div class="thumbnail">
					// 			<img src="App/views/public/images/product-2.png" alt="Image" class="img-fluid">
					// 		</div>
					// 		<div class="pt-3">
					// 			<h3>Ghế Kruzo Aero</h3>
					// 			<p>Một món đồ nội thất cổ điển nhẹ giữa thế kỷ. được chế tạo từ vật liệu chất lượng tốt nhất. </p>
					// 			<p><a href="#">Đọc thêm</a></p>
					// 		</div>
					// 	</div>
					// </div>

					// <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
					// 	<div class="product-item-sm d-flex">
					// 		<div class="thumbnail">
					// 			<img src="App/views/public/images/product-3.png" alt="Image" class="img-fluid">
					// 		</div>
					// 		<div class="pt-3">
					// 			<h3>Ghế làm việc</h3>
					// 			<p>Ghế làm việc LOBERGET chính hãng IKEA đọc đáo. </p>
					// 			<p><a href="#">Đọc thêm</a></p>
					// 		</div>
					// 	</div>
					// </div> -->

				</div>
			</div>
		</div>
		<!-- End Popular Product -->

		<!-- Start Testimonial Slider -->
		
		<!-- End Testimonial Slider -->

		<!-- Start Blog Section -->
		<div class="blog-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-6">
						<h2 class="section-title">Blog gần đây</h2>
					</div>
					<div class="col-md-6 text-start text-md-end">
						<a href="#" class="more">Xem tất cả bài viết</a>
					</div>
				</div>

				<div class="row">

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="App/views/public/images/post-1.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Ý tưởng của chủ sở hữu nhà lần đầu</a></h3>
								<div class="meta">
									<span>bởi <a href="#">Kristin Watson</a></span> <span>vào <a href="#">19 tháng 12 năm 2023</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="App/views/public/images/post-2.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Làm thế nào để giữ đồ nội thất của bạn sạch sẽ</a></h3>
								<div class="meta">
									<span>bởi <a href="#">Robert Fox</a></span> <span>vào <a href="#">15 tháng 12 năm 2023</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="App/views/public/images/post-3.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Ý tưởng nội thất căn hộ không gian nhỏ</a></h3>
								<div class="meta">
									<span>bởi <a href="#">Kristin Watson</a></span> <span>vào <a href="#"> 12 tháng 12 năm 2023</a></span>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Blog Section -->