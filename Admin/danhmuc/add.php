<div class="container mt-5">
    <h1 class="text-center mb-4">Thêm Loại Hàng Mới</h1>
    <form action="index.php?act=adddm" method="POST">
        <div class="mb-3">
            <label for="category_code" class="form-label">Mã Loại Hàng</label>
            <input type="text" class="form-control" id="category_id" name="maloai" disabled>
        </div>  
        <div class="mb-3">
            <label for="category_name" class="form-label">Tên Loại Hàng</label>
            <input type="text" class="form-control" id="category_name" name="tenloai" required>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <button type="submit" name="themmoi" class="btn btn-primary btn-lg w-100" value="Thêm mới">Thêm Loại Hàng</button>
            </div>
            <div class="col-md-6 mb-3">
                <button type="reset" class="btn btn-secondary btn-lg w-100">Nhập Lại</button>
            </div>
        </div>
        <div class="mb-3">
            <a href="index.php?act=lisdm" class="btn btn-outline-primary btn-lg w-100">Danh Sách Loại Hàng</a>
        </div>
        <?php 
        if(isset($thongbao)&&($thongbao!="")) echo '<div class="alert alert-info mt-3">'.$thongbao.'</div>'; 
        ?>
    </form>
</div>