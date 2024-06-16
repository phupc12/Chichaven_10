<?php
if (is_array($sanpham)) {
    extract($sanpham);
    $idsp = $id;
}
$hinhpath = "../App/views/public/images/" .$img;
if(is_file($hinhpath)){
    $hinh="<img src='".$hinhpath."' height='80'>";
}else{
    $hinh="no photo";
}
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Cập Nhật Sản Phẩm</h1>
    <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
    
        <div class="mb-3">
            <label for="product_name" class="form-label">Tên Sản Phẩm</label>
            <input type="text" class="form-control" id="product_name" name="tensp" value="<?= $name ?>">
        </div>
        <select name="iddm" id="product_category" class="form-select me-2">
                <option value="0" selected>Tất cả danh mục</option>
                <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    if($iddm == $id) $s="selected"; else $s="";
                    echo '<option value="'.$id.'" '.$s.'>'.$name.'</option>';
                }
                ?>
            </select>
        <div class="mb-3">
            <label for="product_price" class="form-label">Giá Sản Phẩm</label>
            <input type="text" class="form-control" id="product_price" name="giasp" value="<?=$price?>">
        </div>
        <div class="mb-3">
            <label for="product_category" class="form-label">Danh Mục</label>
           
        </div>
        <div class="mb-3">
            <label for="product_picture" class="form-label">Hình Ảnh Sản Phẩm</label>
            <input type="file" class="form-control" id="product_picture" name="hinh">
            <div class="mt-2">
                <?= $hinh ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="product_mota" class="form-label">Mô Tả Sản Phẩm</label>
            <textarea name="mota" id="product_mota" class="form-control" rows="10"><?=$mota?></textarea>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <input name="id" type="hidden" value="<?=$idsp?>">
                <input type="submit" name="capnhat" class="btn btn-primary btn-lg w-100" value="Cập nhật">
            </div>
            <div class="col-md-6 mb-3">
                <input type="reset" class="btn btn-secondary btn-lg w-100" value="Nhập Lại">
            </div>
        </div>
        <a href="index.php?act=listsp" class="btn btn-outline-primary btn-lg w-100">Danh Sách</a>
        <?php 
        if (isset($thongbao) && ($thongbao != "")) {
            echo '<div class="alert alert-info mt-3">' .$thongbao. '</div>';
        }
        ?>
    </form>
</div>
