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
            <form class="col-md-8" method="post">
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="p-0 pb-2 ps-3 product-thumbnail text-start">Ảnh</th>
                                <th class="p-0 pb-2 ps-3 product-name text-start">Tên</th>
                                <th class="p-0 pb-2 ps-3 product-price text-start">Giá</th>
                                <th class="p-0 pb-2 text-center product-quantity">Số lượng</th>
                                <th class="p-0 pb-2 ps-3 product-total">Tổng</th>
                                <th class="p-0 pb-2 ps-3 product-remove"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tong = 0;
                            $i = 0;
                            if ($_SESSION['mycart']) {
                                foreach ($_SESSION['mycart'] as $cart) {
                                    $hinh = $cart[2];
                                    $ttien = $cart[3] * $cart[4];
                                    $tong += $ttien;
                                    ?>
                                    <tr>
                                        <td class="text-start product-thumbnail">
                                            <img src="<?= $hinh ?>" alt="Image" class="w-100 p-0">
                                        </td>
                                        <td class="product-name text-start">
                                            <h2 class="h5 text-black"><?= $cart[1] ?></h2>
                                        </td>
                                        <td class="text-start"><?= number_format($cart[3]) ?> <sup>vnđ</sup></td>
                                        <td class="p-0">
                                            <div class="input-group mb-3 d-flex align-items-center quantity-container">
                                                <button <?= ($cart[4]==1) ? 'disabled' : '' ?> type="submit" name="giamSL" class="btn btn-sm btn-secondary"><i class="fas fa-minus"></i></button>
                                                <input disabled type="text" class="px-0 form-control text-center quantity-amount w-25" name="quantity[]" value="<?= $cart[4] ?>">
                                                <button type="submit" name="themSL" class="btn btn-sm btn-secondary"><i class="fas fa-plus"></i></button>
                                                <input type="hidden" name="indexCart" value="<?= $i ?>">
                                            </div>
                                            </td>
                                        <td><?= number_format($ttien) ?> <sup>vnđ</sup></td>
                                        <td><a href="index.php?act=delcart&idcart=<?= $i ?>" class="btn btn-black btn-sm"><i
                                                    class="fa-solid fa-trash-can"></i></a></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">Chưa có sản phẩm nào <a href="index.php?act=shop" class="nav-link text-primary fw-bold">&rarr; Cửa hàng</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
            <div class="col-md-4 text-end">
                <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-5">
                        <h3 class="text-black h4 text-uppercase">Giỏ hàng</h3>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <span class="text-black">Số lượng</span>
                    </div>
                    <div class="col-md-6 text-right">
                        <strong class="text-black"><?= count($_SESSION['mycart']) ?> sản phẩm</strong>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6">
                        <span class="text-black">Tổng tiền</span>
                    </div>
                    <div class="col-md-6 text-right">
                        <strong class="text-black"><?php echo number_format($tong); ?> <sup>vnđ</sup></strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <a href="index.php?act=thanhtoan" class="btn btn-black btn-lg py-3 btn-block">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row justify-content-end">

                </div>
            </div>
        </div>
    </div>
</div>