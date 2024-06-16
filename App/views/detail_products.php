 <!-- Product Detail Section -->
 <section style="background: #fff; padding: 50px 0; padding-top:140px" class="product-detail">
        <div class="container">
            <div class="row">
                <?php
                    extract($onesp);
                    $img=$img_path.$img;
                    echo '<div style="margin-top: -45px;" class="col-md-6">
                            <img style="max-width: 100%;height: auto;" src="'.$img.'" class="img-fluid" alt="Product Image">
                          </div>
                            <div class="col-md-6">
                                <h2 style="font-size: 24px; margin-bottom: 20px; color:black;">'.$name.'</h2>
                                <p style="font-size: 16px;line-height: 1.6;margin-bottom: 20px;font-weight: bold;color: #007bff;margin-bottom: 20px;" class="product-price">'.$price.'<sup>đ</sup></p>
                                <p style="font-size: 16px;line-height: 1.6;margin-bottom: 20px;">'.$mota.'</p>
							<form action="index.php?act=addtocart" method="post"> 
                                <div style="display: flex; align-items: center;" class="quantity-input"> 	
                                  <input name="quantity" style="width: 50px; height: 30px; text-align: center; border: 1px solid #ccc; border-radius: 5px; margin-right: 5px; margin-bottom: 10px;" type="number" id="quantity" min="0" max="100" value="1"> 
                              </div>
								<input type="hidden" name="id" value="' . $id . '">
									<input type="hidden" name="name" value="' . $name . '">
									<input type="hidden" name="img" value="' . $img . '">
									<input type="hidden" name="price" value="' . $price . '">
                                <input style="background-color: #007bff; border: none; padding: 10px 20px; font-size: 18px; transition: background-color 0.3s; font-weight:normal; border-radius: 5px; class="btn btn-primary hover" type="submit" name="addtocart" value="Thêm vào giỏ hàng">
							</form>
                            </div>';
                ?>
                
            </div>
        </div>
    </section>
    <div style="background: #fff; padding-top: 50px">
        <div class="container" style="background: #fff; color: black; font-weight: bold; font-size: 30px">
            Sản phẩm cùng loại
        </div>
    </div>
    <div style="background: #fff;" class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">
                    <?php
                        foreach ($spdm as $spdm) {
                            extract($spdm);
                            $linksp="index.php?act=sanphamchitiet&idsp=".$id;
                            $img=$img_path.$img;
                            echo '<div class="col-12 col-md-4 col-lg-3 mb-5">
                                    <a class="product-item" href="'.$linksp.'">
                                        <img src="'.$img.'" class="img-fluid product-thumbnail">
                                        <h3 class="product-title">'.$name.'</h3>
                                        <strong class="product-price">'.$price.'<sup>đ</sup></strong>
            
                                        <span class="icon-cross">
                                            <img src="App/views/public/images/cross.svg" class="img-fluid">
                                        </span>
                                    </a>
                                </div>';
                        }
                    ?>

		      		
					
					
		      	</div>
		    </div>
		</div>
		<style>
 	.comment-form {
 		background: white;
 		padding: 20px;
 		border-radius: 8px;
 		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
 		width: 100%;
 	}

 	.comment-form h2 {
 		margin-top: 0;
 		color: #333;
 	}

 	.form-group {
 		margin-bottom: 15px;
 	}

 	.form-group label {
 		display: block;
 		margin-bottom: 5px;
 		color: #555;
 	}

 	.form-group input,
 	.form-group textarea {
 		width: 100%;
 		padding: 10px;
 		border: 1px solid #ccc;
 		border-radius: 4px;
 		font-size: 14px;
 	}

 	.form-group input:focus,
 	.form-group textarea:focus {
 		border-color: #007bff;
 		outline: none;
 	}

 	.form-group textarea {
 		resize: vertical;
 		min-height: 100px;
 	}

 	.submit-btn {
 		background-color: #007bff;
 		color: white;
 		padding: 10px 15px;
 		border: none;
 		border-radius: 4px;
 		cursor: pointer;
 		font-size: 16px;
 	}

 	.submit-btn:hover {
 		background-color: #0056b3;
 	}
 </style>
 <?php
	if ($_GET['idsp']) {
		$id_pro = $_GET['idsp'];
	}

	$fullComment = fullComment($id_pro);

	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
		$id_user = $_POST['id_user'];
		$id_pro = $_POST['id_pro'];
		$content = $_POST['content'];
		if (isset($_SESSION['user'])) {
			$id_user = $_SESSION['user']['id'];
			addComment($content, $id_user, $id_pro);
			header('Location: index.php?act=sanphamchitiet&idsp=' . $id_pro . '');
		} else {
			header("Location: index.php?act=login");
		}
	}
	?>
 <div class="comment-form">
 	<h2>Bình luận</h2>
 	<form action="" method="post" enctype="multipart/form-data">
 		<div class="form-group">
 			<input type="hidden" name="id_user" value="<?php echo isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : "";
														?>">
 			<input type="hidden" name="id_pro" value="<?php echo $id_pro; ?>">
 			<label for="content">Nội dung</label>
 			<textarea id="content" name="content" required></textarea>
 		</div>
 		<input type="submit" value="Gửi" class="submit-btn">
 	</form>
 </div>
<!-- <?php
echo "<pre>";
echo print_r($_SESSION['user']);
echo "</pre>";
?> -->
 <?php
	$thongbao = false; // Biến cờ để kiểm tra có bình luận nào có trangthai == 1 hay không

	for ($i = 0; $i < count($fullComment); $i++) {
		if ($fullComment[$i]['trangthai'] == 1) {
			$thongbao = true; // Nếu có ít nhất một bình luận có trangthai == 1, đặt cờ thành true
	?>
		<h2><?= $fullComment[$i]['name']?> đã bình luận lúc <?= $fullComment[$i]['ngaybinhluan']?></h2>
 		<h1><?= $fullComment[$i]['noidung'] ?></h1>
 <?php
		}
	}

	if (!$thongbao) {
		echo "Không có bình luận";
	}
	?>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
		document.querySelector('form[action="index.php?act=addtocart"]').addEventListener('submit', function(event) {
			if(!isLoggedIn()) {
				if(!confirm("Bạn chưa đăng nhập! Có muốn tiếp tục mua hàng không?")) {
					event.preventDefault();
				}
			}
		});
	});

		function isLoggedIn() {
		
			return <?php echo isset($_SESSION['user']) ? 'true' : 'false'; ?>;
		}
	</script>