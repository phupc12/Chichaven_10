<div class="container mt-5">
    <h1 class="text-center mb-4">Danh sách sản phẩm</h1>
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row mb-3">
                <div class="col">
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
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <button class="btn btn-primary btn-sm" onclick="selectAllItems()">Chọn tất cả</button>
                    <button class="btn btn-secondary btn-sm" onclick="deselectAllItems()">Bỏ chọn tất cả</button>
                </div>
                <div class="col-md-6 text-end">
                    <button class="btn btn-danger btn-sm" onclick="deleteSelectedItems()">Xóa các mục đã chọn</button>
                </div>
            </div>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="selectAll" onclick="toggleAll(this)">
                                <label class="form-check-label" for="selectAll">Chọn tất cả</label>
                            </div>
                        </th>
                        <th scope="col">Mã Sản Phẩm</th>
                        <th scope="col">Mã Danh Mục</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Hình</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Mô Tả</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($listsanpham as $sanpham){
                        extract($sanpham);
                        $suasp = "index.php?act=suasp&id=".$id;
                        $xoasp = "index.php?act=xoasp&id=".$id;
                        $hinhpath = "../App/views/public/images/".$img;
                        $hinh = is_file($hinhpath) ? "<img src='".$hinhpath."' height='100px' />" : "no images";
                        echo '<tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="product'.$id.'">
                                </div>
                            </td>
                            <td>'.$id.'</td>
                            <td>'.$iddm.'</td>
                            <td>'.$name.'</td>
                            <td>'.$hinh.'</td>
                            <td>'.$price.'</td>
                            <td>'.$mota.'</td>
                            <td>
                                <a href="'.$suasp.'" class="btn btn-sm btn-primary">Sửa</a>
                                <button onclick="confirmDeleteProduct('.$id.')" class="btn btn-sm btn-danger">Xóa</button>
                            </td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-10 offset-md-1 text-end">
            <a href="index.php?act=addsp" class="btn btn-success btn-lg">Nhập thêm</a>
        </div>
    </div>
</div>
<script>
    function confirmDeleteProduct(id) {
    if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
        window.location.href = "index.php?act=xoasp&id=" + id;
    }
}
</script>