<div class="container mt-5">
    <h1 class="text-center mb-4">Thêm Mới Sản Phẩm</h1>
    <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="product_dm" class="form-label">Danh mục</label>
            <select name="iddm" id="product_dm" class="form-select">
                <?php
                if (isset($listdanhmuc)) {
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="'.$id.'">'.$name.'</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="product_code" class="form-label">Mã Sản Phẩm</label>
            <input type="text" class="form-control" id="product_id" name="masp" disabled>
        </div>  
        <div class="mb-3">
            <label for="product_name" class="form-label">Tên Sản Phẩm</label>
            <input type="text" class="form-control" id="product_name" name="tensp" required>
        </div>
        <div class="mb-3">
            <label for="product_price" class="form-label">Giá Sản Phẩm</label>
            <input type="text" class="form-control" id="product_price" name="giasp" required>
        </div>
        <div class="mb-3">
            <label for="product_picture" class="form-label">Hình Ảnh Sản Phẩm</label>
            <input type="file" class="form-control" id="product_picture" name="hinh" required>
        </div>
        <div class="mb-3">
            <label for="product_mota" class="form-label">Mô Tả Sản Phẩm</label>
            <textarea name="mota" id="product_mota" class="form-control" rows="5"></textarea>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <button type="submit" name="themmoi" class="btn btn-primary btn-lg w-100" value="Thêm mới">Thêm Sản Phẩm Mới</button>
            </div>
            <div class="col-md-6 mb-3">
                <button type="reset" class="btn btn-secondary btn-lg w-100">Nhập Lại</button>
            </div>
        </div>
        <div class="mb-3">
            <a href="index.php?act=listsp" class="btn btn-outline-primary btn-lg w-100">Danh Sách Sản Phẩm</a>
        </div>
        <?php 
        if (isset($thongbao) && $thongbao != "") {
            echo '<div class="alert alert-info mt-3">'.$thongbao.'</div>';
        }
        ?>
    </form>
</div>
