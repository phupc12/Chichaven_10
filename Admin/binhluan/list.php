<div class="container">
    <h2 class="mt-5 mb-4">Quản lý bình luận</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Tên Người Dùng</th>
                <th scope="col">Nội Dung Bình Luận</th>
                <th scope="col">Thời Gian</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Chức Năng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($adminComment); $i++) {
            ?>
                <td><?= $adminComment[$i]['id'] ?></td>
                <td><?= $adminComment[$i]['name'] ?></td>
                <td><?= $adminComment[$i]['noidung'] ?></td>
                <td><?= $adminComment[$i]['ngaybinhluan'] ?></td>
                <td class=""><?= $adminComment[$i]['trangthai'] == 0 ?  "Chưa duyệt" : "Đã duyệt"; ?></td>
                <td>
                    <a href="index.php?act=changeStatus&id_bl=<?= $adminComment[$i]['id'] ?>" class="btn btn-success">Duyệt</a>
                    <a href="index.php?act=xoabl&id_bl=<?= $adminComment[$i]['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không?')">Xóa</a>
                </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>