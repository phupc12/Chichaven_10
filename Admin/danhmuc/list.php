<div class="container mt-5">
    <h1 class="text-center mb-4">Danh Sách Danh Mục</h1>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="selectAll">
                        <label class="form-check-label" for="selectAll">Chọn tất cả</label>
                    </div>
                    <span>Mã Loại Hàng</span>
                    <span>Tên Loại Hàng</span>
                    <span>Thao tác</span>
                </li>
                <!-- Example category items -->
                <?php
                foreach($listdanhmuc as $danhmuc){
                    extract($danhmuc);
                    $suadm="index.php?act=suadm&id=".$id;
                    $xoadm="index.php?act=xoadm&id=".$id;
                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="category'.$id.'">
                    </div>
                    <span>'.$id.'</span>
                    <span>'.$name.'</span>
                    <div>
                    <a href="'.$suadm.'" class="btn btn-warning btn-sm me-2">Sửa</a>
                    <button onclick="confirmDeleteCategory('.$id.')" class="btn btn-sm btn-danger">Xóa</button>
                    </div>
                </li>';
                }
                ?>
            </ul>
            <div class="mt-3">
                <a href="index.php?act=adddm" class="btn btn-success btn-lg w-100">Nhập thêm</a>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmDeleteCategory(id) {
    if (confirm("Bạn có chắc chắn muốn xóa danh mục này không?")) {
        window.location.href = "index.php?act=xoadm&id=" + id;
    }
}
</script>