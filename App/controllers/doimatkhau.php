<?php
#submit
require_once 'App/dao/doimatkhau.php';
$oldPass = $newPass = $verifyPass = '';
if (isset($_POST['changePass'])) {
    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $verifyPass = $_POST['verifyPass'];
    if ($oldPass) {
        if (checkPass($_SESSION['user']['id'], $oldPass)) {
            if ($newPass) {
                if (strlen($newPass) >= 6) {
                    if ($verifyPass) {
                        if ($verifyPass === $newPass) {
                            pdo_execute('UPDATE users SET pass = "' . password_hash($newPass, PASSWORD_DEFAULT) . '" WHERE id =' . $_SESSION['user']['id']);
                            unset($_SESSION['user']);
                            header('Location: index.php?act=login');
                        }else add_error('Mật khẩu xác thực không trùng khớp.');
                    }else add_error('Vui lòng nhập xác thực mật khẩu.');
                }else add_error('Độ dài mật khẩu mới phải từ 6 kí tự trở lên.');
            }else add_error('Vui lòng nhập mật khẩu mới.');
        }else add_error('Mật khẩu cũ không chính xác.');
    }else add_error('Vui lòng nhập mật khẩu cũ.');
}
#render view
require_once 'App/views/doimatkhau.php';
