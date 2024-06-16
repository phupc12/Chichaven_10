<?php
session_start();

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Function to add or update product in cart
function addToCart($product_id, $product_name, $product_price, $quantity) {
  // Sanitize and validate input
  $product_id = filter_var($product_id, FILTER_SANITIZE_SPECIAL_CHARS);
  $product_name = filter_var($product_name, FILTER_SANITIZE_SPECIAL_CHARS);
  $product_price = filter_var($product_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $quantity = filter_var($quantity, FILTER_SANITIZE_NUMBER_INT);

  // Check if product already exists in cart
  foreach ($_SESSION['cart'] as &$item) {
      if ($item['product_id'] === $product_id) {
          $item['quantity'] += $quantity;
          return;
      }
  }

  // Add new product to cart
  $_SESSION['cart'][] = [
      'product_id' => $product_id,
      'product_name' => $product_name,
      'product_price' => $product_price,
      'quantity' => $quantity,
      // 'image_url' => $image_url // Make sure 'image_url' is included
  ];
}

// Function to remove product from cart
function removeFromCart($product_id) {
    // Sanitize input
    $product_id = filter_var($product_id, FILTER_SANITIZE_SPECIAL_CHARS);

    // Find and remove product from cart
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['product_id'] === $product_id) {
            unset($_SESSION['cart'][$key]);
            return;
        }
    }
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id'])) {
        if (isset($_POST['remove_product'])) {
            removeFromCart($_POST['product_id']);
        } else {
          addToCart($_POST['product_id'], $_POST['product_name'], $_POST['product_price'], $_POST['quantity']); // Add the missing argument
        }
    }
}
?>





<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Cart</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Product</th>
                          <th class="product-price">Price</th>
                          <th class="product-quantity">Quantity</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
if (isset($_SESSION['cart'])) {
  $total = 0; // Initialize total price
    foreach ($_SESSION['cart'] as $item) {
        echo '<tr>
                <td class="product-thumbnail">
                </td>
                <td class="product-name">
                    <h2 class="h5 text-black">'.$item['product_name'].'</h2>
                </td>
                <td>$'.$item['product_price'].'</td>
                <td>
                    <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center quantity-amount" value="'.$item['quantity'].'" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-outline-black increase" type="button">&plus;</button>
                        </div>
                    </div>
                </td>
                <td>$'.(($item['product_price']) * ($item['quantity'])).'</td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="product_id" value="'.$item['product_id'].'">
                        <button type="submit" class="btn btn-black btn-sm" name="remove_product">Xóa</button>
                    </form>
                </td>
              </tr>';
    }
}
?>


                        <!-- <tr>
                          <td class="product-thumbnail">
                            <img src="images/product-2.png" alt="Image" class="img-fluid">
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black">Product 2</h2>
                          </td>
                          <td>$49.00</td>
                          <td>
                            <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                              <div class="input-group-prepend">
                                <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                              </div>
                              <input type="text" class="form-control text-center quantity-amount" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                              <div class="input-group-append">
                                <button class="btn btn-outline-black increase" type="button">&plus;</button>
                              </div>
                            </div>
        
                          </td>
                          <td>$49.00</td>
                          <td><a href="#" class="btn btn-black btn-sm">X</a></td>
                        </tr> -->
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <button class="btn btn-black btn-sm btn-block">Update Cart</button>
                    </div>
                    <div class="col-md-6">
                      <button class="btn btn-outline-black btn-sm btn-block">Continue Shopping</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-black h4" for="coupon">Coupon</label>
                      <p>Enter your coupon code if you have one.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                      <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-black">Apply Coupon</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">$230.00</strong>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">$230.00</strong>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='index.php?act=thanhtoan'">Proceed To Checkout</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>