<?php
#submit
require_once 'App/dao/doimatkhau.php';
$email = '';
$formFailed = $formSuccess = false;
if (isset($_POST['forgotPass'])) {
    $email = $_POST['email'];
    if ($email) {
        $id = checkEmail($email);
        if ($id) {
            $password = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 6); 
            pdo_execute('UPDATE users SET pass ="'.password_hash($password,PASSWORD_DEFAULT).'" WHERE id ='.$id);
            if(mailForgotPassword($email,$password)) $formSuccess = true;
            else $formFailed = true;
        }else add_error('Email không hợp lệ.');
    }else add_error('Vui lòng nhập email của bạn.');
}
#render view
require_once 'App/views/quenmatkhau.php';