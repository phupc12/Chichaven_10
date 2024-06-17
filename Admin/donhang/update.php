
<?php

if (is_array($onedonhang)) {
    extract($onedonhang);
}
?>
<div class="container mt-5">
    <h1 class="text-center mb-4">Cập Nhật Trạng Thái</h1>
    <form action="index.php?act=updatedonhang" method="POST">
        <div class="mb-3">
            <label for="token_order" class="form-label">Token_Order</label>
            <input type="text" class="form-control" id="token_order" name="token_order" value="<?php if (isset($token_order) && $token_order > 0) echo $token_order; ?>" disabled>
        </div>  
        <div class="mb-3">
            <label for="category_name" class="form-label">Trạng Thái</label>
            <input type="text" class="form-control" id="status" name="status" value="<?php if (isset($status) && $status != "") echo $status; ?>">
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="hidden" name="token_order" value="<?php if (isset($token_order) && $token_order > 0) echo $token_order; ?>">
                <input type="submit" name="capnhattrangthai" class="btn btn-primary btn-lg w-100" value="Cập nhật">
            </div>
            <div class="col-md-6 mb-3">
                <input type="reset" class="btn btn-secondary btn-lg w-100" value="Nhập lại">
            </div>
        </div>
        <a href="index.php?act=dsdh" class="btn btn-outline-primary btn-lg w-100">Danh Sách</a>
        <?php 
        if (isset($thongbao) && $thongbao != "") echo $thongbao; 
        ?>
    </form>
</div>
