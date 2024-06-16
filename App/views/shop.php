<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Shop</h1>
                </div>
            </div>
            <div class="col-lg-7">
                <!-- Optional content -->
            </div>
        </div>
    </div>
</div>

<!-- Search Form -->
<div class="container my-4">
<form action="#" method="post" class="d-flex align-items-center">
                        <input type="text" name="kyw" class="form-control me-2" placeholder="Nhập từ khóa">
                        <select name="iddm" class="form-select me-2">
                            <option value="">Tất cả danh mục</option>
                            <?php
                            foreach ($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                echo '<option value="'.$id.'">'.$name.'</option>';
                            }
                            ?>
                        </select>
                        <input type="submit" class="btn btn-primary" name="listok" value="Lọc">
                    </form>
</div>

<!-- Product List Section -->
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            <?php
            $i = 0;
            foreach ($spshow as $sp) {
                extract($sp);
                $linksp = "index.php?act=sanphamchitiet&idsp=" . $id;
                $img = $img_path . $img;
                echo '<div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item" href="' . $linksp . '">
                            <img src="' . $img . '" class="img-fluid product-thumbnail">
                            <h3 class="product-title">' . $name . '</h3>
                            <strong class="product-price">' . $price . '<sup>đ</sup></strong>
                            <span class="icon-cross">
                                <img src="App/views/public/images/cross.svg" class="img-fluid">
                            </span>
                        </a>
                    </div>';
                $i++;
            }
            ?>
        </div>
    </div>
</div>
