<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <link rel="shortcut icon" href="favicon.png">
  <link rel="icon" type="image/png" href="App/views/public/images/bowl-2.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="App/views/public/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="App/views/public/css/tiny-slider.css" rel="stylesheet">
		<link href="App/views/public/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
		<title>ChicHaven </title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark fixed-top" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.php">Furni<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item <?php if(!isset($_GET['act'])) { echo 'active'; } ?>">
							<a class="nav-link" href="index.php">Trang chủ</a>
						</li>
						<li class="nav-item <?php if(isset($_GET['act']) && $_GET['act'] == 'shop') { echo 'active'; } ?>">
							<a class="nav-link" href="index.php?act=shop">Cửa hàng</a>
						</li>
						<li class="nav-item <?php if(isset($_GET['act']) && $_GET['act'] == 'aboutus') { echo 'active'; } ?>">
							<a class="nav-link" href="index.php?act=aboutus">Về chúng tôi</a>
						</li>
						<li class="nav-item <?php if(isset($_GET['act']) && $_GET['act'] == 'services') { echo 'active'; } ?>">
							<a class="nav-link" href="index.php?act=services">Dịch vụ</a>
						</li>
						<li class="nav-item <?php if(isset($_GET['act']) && $_GET['act'] == 'blog') { echo 'active'; } ?>">
							<a class="nav-link" href="index.php?act=blog">Blog</a>
						</li>
						<li class="nav-item <?php if(isset($_GET['act']) && $_GET['act'] == 'contact') { echo 'active'; } ?>">
							<a class="nav-link" href="index.php?act=contact">Liên hệ chúng tôi</a>
						</li>
                        <li class="nav-item <?php if(isset($_GET['act']) && $_GET['act'] == 'lichsu') { echo 'active'; } ?>">
							<a class="nav-link" href="index.php?act=lichsu">Lịch sử mua hàng</a>
						</li>
					</ul>
					
					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
					<?php
					// if(isset($_SESSION['user'])){
					// 	extract($_SESSION['user']);
					// 	echo '<li><a style="font-weight: 600; color: white;" class="nav-link" href="index.php?act=logout">Đăng xuất</a></li>
					// 	<li><a class="nav-link" href="index.php?act=cart"><img src="App/views/public/images/cart.svg"></a></li>';
					// } else {https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.csscdnjs.cloudflare.com/-strong/-heart:>:o:-((:-h// 	echo '<li><a class="nav-link" href="index.php?act=login"><img src="App/views/public/images/user.svg"></a></li>
					// 	<li><a class="nav-link" href="index.php?act=cart"><img src="App/views/public/images/cart.svg"></a></li>';
					// }
                    if ($_SESSION['user']) {
                        extract($_SESSION['user']);
                        if (array_key_exists('rol', $_SESSION['user']) && $_SESSION['user']['rol'] == 'admin') {
                            echo '
                            <div class="d-flex">
                                <ul class="list-unstyled d-flex align-items-center m-0">
                                    <li class="me-3 fw-bold text-white">
                                        <a class="nav-link text-white margin" href="#">Quản trị</a>
                                    </li>
                                    <li class="position-relative">
                                        
                                        <div class="dropdown image-container">
                                                <a href="#" class="d-block link-dark text-decoration-none border-radius-50phantram" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="userlogined-at-header">
                                                    <div class="border-radius-50phantram">
                            <img class="width-100-height-100 random-img" src="' . $img . '" alt="" class="rounded-circle" >
                          </div>
                                                </a>
                                            
                                            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
                                                <li class="dropdown-item">
                                                    <div class="d-flex align-items-center flex-container">
                                                      <div style="height: 50px; width: 50px;">
                              <img class="random-img" src="' . $img . '" alt="" class="me-2" style="width: 50px; height: 50px;">
                            </div>
                                                        <div>
                                                            <div class="fw-bold">' . $name . '</div>
                                                            <small>Quản trị</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><a class="dropdown-item" href="admin/index.php">Đi đến trang quản trị</a></li>
                                                <li><a class="dropdown-item" href="index.php?act=logout">Đăng xuất</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>';
                        } else {
                            echo '
                            <div class="d-flex">
                                <ul class="list-unstyled d-flex align-items-center m-0">
                                    <li class="me-3 fw-bold text-white">
                                        <a class="nav-link text-white margin" href="#">'.$name.'</a>
                                    </li>
                                    <li class="position-relative">
                                        
                                        <div class="dropdown image-container">
                                                <a href="#" class="d-block link-dark text-decoration-none border-radius-50phantram" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="userlogined-at-header">
                                                    <div class="border-radius-50phantram">
                            <img class="width-100-height-100 random-img" src="' . $img . '" alt="" class="rounded-circle" >
                          </div>
                                                </a>
                                            
                                            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
                                                <li class="dropdown-item">
                                                    <div class="d-flex align-items-center flex-container">
                                                   <div style="height: 50px; width: 50px;">
                              <img class="random-img" src="' . $img . '" alt="" class="me-2" style="width: 50px; height: 50px;">
                            </div>
                                                        <div>
                                                            <div class="fw-bold">' . $name . '</div>
                                                            <small>Người dùng</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><a class="dropdown-item" href="index.php?act=forgotpassword">Quên mật khẩu</a></li>
                                                <li><a class="dropdown-item" href="index.php?act=logout">Đăng xuất</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <li style="margin-left: 15px;"><a class="nav-link" href="index.php?act=addtocart"><img src="App/views/public/images/cart.svg"></a></li>';
                        }
                    } else {
                        echo '
                        <li><a class="nav-link" href="index.php?act=login"><img src="App/views/public/images/user.svg"></a></li>
                        <li><a class="nav-link" href="index.php?act=addtocart"><img src="App/views/public/images/cart.svg"></a></li>';
                    }
                    ?>
					</ul>
				</div>
			</div>
		</nav>
        