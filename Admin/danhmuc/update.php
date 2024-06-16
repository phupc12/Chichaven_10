
<?php
if (is_array($dm)) {
    extract($dm);
}
?>
<div class="container mt-5">
    <h1 class="text-center mb-4">Cập Nhật Thể Loại Sản Phẩm</h1>
    <form action="index.php?act=updatedm" method="POST">
        <div class="mb-3">
            <label for="category_code" class="form-label">Mã Loại Hàng</label>
            <input type="text" class="form-control" id="category_id" name="maloai" value="<?php if (isset($id) && $id > 0) echo $id; ?>" disabled>
        </div>  
        <div class="mb-3">
            <label for="category_name" class="form-label">Tên Loại Hàng</label>
            <input type="text" class="form-control" id="category_name" name="tenloai" value="<?php if (isset($name) && $name != "") echo $name; ?>">
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="hidden" name="id" value="<?php if (isset($id) && $id > 0) echo $id; ?>">
                <input type="submit" name="capnhat" class="btn btn-primary btn-lg w-100" value="Cập nhật">
            </div>
            <div class="col-md-6 mb-3">
                <input type="reset" class="btn btn-secondary btn-lg w-100" value="Nhập lại">
            </div>
        </div>
        <a href="index.php?act=lisdm" class="btn btn-outline-primary btn-lg w-100">Danh Sách</a>
        <?php 
        if (isset($thongbao) && $thongbao != "") echo $thongbao; 
        ?>
    </form>
</div>
