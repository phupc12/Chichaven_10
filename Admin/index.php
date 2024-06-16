<?php
session_start();
ob_start();
#xác thực Admin
if(isset($_SESSION['user']['role'])) {
    if($_SESSION['user']['role'] !== 'admin') die('Not access, return to <a href="../index.php">Home</a>');
}else die('Not access, return to <a href="../index.php">Home</a>');

include "../App/dao/pdo.php";
require_once "functions.php";
include "../App/dao/danhmuc_admin.php";
include "../App/dao/quanlydonhang.php";
include "../App/dao/sanpham_admin.php";
include_once "../App/dao/binhluan.php";
include_once "../App/dao/taikhoan.php";
include "header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case 'lisdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']); // Corrected variable from $tenloai to $_GET['id']
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);

                $thongbao = "Cập nhật thành công";
            }
            $sql = "select * from danhmuc order by id desc";
            $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;
        /*quản lý sản phẩm*/
        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST["iddm"];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../App/views/public/images/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);

                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // File uploaded successfully
                } else {
                    $thongbao = "Sorry, there was an error uploading your file.";
                }
                insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                $thongbao = "Thêm thành công";
            }

            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;

        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm); // Added missing arguments
            include "sanpham/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham("", 0); // Added missing arguments
            include "sanpham/list.php";
            break;
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/update.php";
            }
            break;
        case 'logout':
            unset($_SESSION['user']);
            header('Location: ../index.php');
            exit;
        case 'dskh':
            $listtaikhoan = loadall_taikhoan();
            include "nguoidung/user.php";
            break;
        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
                header('Location: index.php?act=dskh');
            }
            $listtaikhoan = loadall_taikhoan();
            break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                // Kiểm tra xem $_POST['id'] có tồn tại không trước khi gán cho $id
                $id = isset($_POST['id']) ? $_POST['id'] : null;

                // Kiểm tra xem $id có giá trị hợp lệ không trước khi tiếp tục
                if ($id !== null && $id > 0) {
                    $iddm = $_POST["iddm"];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../App/views/public/images/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);

                    if ($hinh != "" && move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // File uploaded successfully
                    } else {
                        $hinh = ""; // Không thay đổi hình nếu không upload thành công
                        $thongbao = "Sorry, there was an error uploading your file.";
                    }

                    // Gọi hàm update_sanpham chỉ khi $id hợp lệ
                    update_sanpham($id, $tensp, $giasp, $hinh, $mota, $iddm);
                    $thongbao = "Cập nhật thành công";
                } else {
                    $thongbao = "ID sản phẩm không hợp lệ";
                }
            }


            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
        case 'dsbl':
            $adminComment = adminComment();
            include_once "binhluan/list.php";
            break;
        case 'changeStatus':
            if (isset($_GET['id_bl'])) {
                $id_bl = $_GET['id_bl'];
            }
            updateStatus($id_bl);
            header('Location: index.php?act=dsbl');
            break;
        case 'xoabl':
            if (isset($_GET['id_bl']) && ($_GET['id_bl'] > 0)) {
                $id_bl = $_GET['id_bl'];
                delete_binhluan($_GET['id_bl']);
            }
            header('Location: index.php?act=dsbl');
            break;
        case 'dsdhct':
            $listdonhangct = loadall_donhangct();
            include "donhang/listdhct.php";
            break;
        case 'xoadhct':
            if (isset($_GET['token_order']) && ($_GET['token_order'] > 0)) {
                delete_donhangct($_GET['token_order']);
            }

            $listdonhangct = loadall_donhangct();
            include "donhang/listdhct.php";
            break;
        case 'dsdh':
            $kyw = isset($_POST['kyw']) ? $_POST['kyw'] : '';
            $token_order = isset($_POST['iddh']) ? $_POST['iddh'] : 0;
            $listdonhangct = loadall_donhangct();
            $listdonhang = loadall_donhang($kyw, $token_order); // Updated with isset check
            include "donhang/list.php";
            break;
        case 'xoadh':
            if (isset($_GET['token_order']) && ($_GET['token_order'] > 0)) {
                delete_donhang($_GET['token_order']);
            }

            $listdonhang = loadall_donhang();
            include "donhang/list.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
