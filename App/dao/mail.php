<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'mailer/src/Exception.php';
require_once 'mailer/src/PHPMailer.php';
require_once 'mailer/src/SMTP.php';

function mailForgotPassword($email,$password)
{
    $mail = new PHPMailer(true);
    try {
        //Cấu hình Server
        // $mail->SMTPDebug = 2;
        $mail->isSMTP(); // Sử dụng SMTP để gửi mail
        $mail->Host = 'smtp.gmail.com'; // Server SMTP của gmail
        $mail->SMTPAuth = true; // Bật xác thực SMTP
        $mail->Username = 'votanphu.lop12a7@gmail.com'; // Tài khoản email
        $mail->Password = 'soitqfpwgndxpulq'; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
        $mail->SMTPSecure = 'ssl'; // Mã hóa SSL
        $mail->Port = 465; // Cổng kết nối SMTP
        //Cấu hình thông tin người gửi
        $mail->setFrom('votanphu.lop12a7@gmail.com', 'Chichaven Shop'); // Địa chỉ email và tên người gửi
        $mail->addCC($email, 'USER');
        // Định dạng Form HTML
        $mail->isHTML(true);
        // Tiêu đề
        $mail->Subject = 'Cap nhat mat khau moi';
        // Nội dung
        $mail->Body = 'Mật khẩu mới của bạn là <strong>'.$password.'</strong><br>Vui lòng không cung cấp mật khẩu này cho bất kì ai.';
        //Gửi
        $mail->send();

        return true;
    } catch (Exception $e) {
        return false;
        // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

function mailInvoice($email,$invoice)
{
    $mail = new PHPMailer(true);
    try {
        //Cấu hình Server
        // $mail->SMTPDebug = 2;
        $mail->isSMTP(); // Sử dụng SMTP để gửi mail
        $mail->Host = 'smtp.gmail.com'; // Server SMTP của gmail
        $mail->SMTPAuth = true; // Bật xác thực SMTP
        $mail->Username = 'votanphu.lop12a7@gmail.com'; // Tài khoản email
        $mail->Password = 'soitqfpwgndxpulq'; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
        $mail->SMTPSecure = 'ssl'; // Mã hóa SSL
        $mail->Port = 465; // Cổng kết nối SMTP
        //Cấu hình thông tin người gửi
        $mail->setFrom('votanphu.lop12a7@gmail.com', 'Chichaven Shop'); // Địa chỉ email và tên người gửi
        $mail->addCC($email, 'USER');
        // Định dạng Form HTML
        $mail->isHTML(true);
        // Tiêu đề
        $mail->Subject = 'HOA DON DON HANG cua Chichaven';
        // Nội dung
        $mail->Body = $invoice;
        $mail->send();
    } catch (Exception $e) {
        return false;
        // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}