<div style="margin-bottom: 100px;" class="container mt-5">
    <h1 class="text-center mb-4">Danh Sách Tài Khoản</h1>
    <div class="row">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="col">
                        <span>Tài khoản</span>
                    </div>
                    <div class="col">
                        <span>Email</span>
                    </div>
                    <div class="col">
                        <span>Vai trò</span>
                    </div>
                    <div class="col">
                        <span>Sdt</span>
                    </div>
                    <div class="col">
                        <span>Hình ảnh</span>
                    </div>
                    <span style="margin-right:20px;">Thao tác</span>
                </li>
                <!-- Example category items -->
                <?php
                    foreach($listtaikhoan as $taikhoan){
                        extract($taikhoan);
                        
                            $suatk="index.php?act=suatk&id=".$id;
                            $xoatk="index.php?act=xoatk&id=".$id;
                            echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="row w-100 align-items-center">
                                        <div class="col">
                                            <span>'.$name.'</span>
                                        </div>
                                        <div class="col">
                                            <span>'.$email.'</span>
                                        </div>
                                        <div class="col"> 
                                            <span>' .$rol.'</span> 
                                        </div>
                                        <div class="col">
                                            <span>'.$phone.'</span>
                                        </div>
                                        
                                        <div style="margin-left: 15px;margin-right: 140px;" class="col-auto">
                                            <div class="userlogined-at-header">
                                                <div class="border-radius-50phantram">
                                                    <img class="hover-text width-100-height-100" src="'.$img.'" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex">
                                        <button style="margin-right:28px; margin-left: 24px;" onclick="confirmDeleteUser('.$id.')" class="btn btn-danger btn-sm">Xóa</button>
                                    </div>
                                </li>';
                        }
                    
                ?>


            </ul>
        </div>
    </div>
</div>
<script>
    function confirmDeleteUser(id) {
    if (confirm("Bạn có chắc chắn muốn xóa người dùng này không?")) {
        window.location.href = "index.php?act=xoatk&id=" + id;
    }
}
</script>