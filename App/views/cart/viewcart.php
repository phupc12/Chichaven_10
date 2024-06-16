<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Cart</h1>
                </div>
            </div>
            <div class="col-lg-7"></div>
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
                            $tong = 0;
                            $i = 0; 
                            foreach ($_SESSION['mycart'] as &$cart) {
                                
                                $hinh =  $cart[2];
                                $ttien = $cart[3] * $cart[4];
                                $tong += $ttien;
                                $xoasp='<a href="index.php?act=delcart&idcart='.$i.'" class="btn btn-black btn-sm"><i class="fa-solid fa-trash-can"></i></a>';

                                echo '<tr>
                                    <td class="product-thumbnail">
                                        <img src="' . $hinh . '" alt="Image" class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">' . $cart[1] . '</h2>
                                    </td>
                                    <td>$' . number_format($cart[3], 2) . '</td>
                                    <td>
                                        <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                                            <input type="text" class="form-control text-center quantity-amount" name="quantity[]" value="' . $cart[4] . '" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly>
                                        </div>
                                    </td>
                                    <td>$' . number_format($ttien, 2) . '</td>
                                    <td>'.$xoasp.'</td>
                                </tr>';
                                $i++;
                            }
                            ?>
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
                        <button onclick="window.location='index.php?act=shop'" class="btn btn-outline-black btn-sm btn-block">Continue Shopping</button>
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
                                <strong class="text-black">$<?php echo number_format($tong, 2); ?></strong>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">$<?php echo number_format($tong, 2); ?></strong>
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