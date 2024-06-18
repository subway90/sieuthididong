<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../../publics/mailer/src/Exception.php';
require_once '../../publics/mailer/src/PHPMailer.php';
require_once '../../publics/mailer/src/SMTP.php';
require_once '../../config/APP.php';

function SendMail()
{
    $mail = new PHPMailer(true);
    try {
        //Cấu hình Server
        $mail->SMTPDebug = 2;
        $mail->isSMTP(); // Sử dụng SMTP để gửi mail
        $mail->Host = 'smtp.gmail.com'; // Server SMTP của gmail
        $mail->SMTPAuth = true; // Bật xác thực SMTP
        $mail->Username = 'mobilevutru@gmail.com'; // Tài khoản email
        $mail->Password = 'viapcixaviklgopg'; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
        $mail->SMTPSecure = 'ssl'; // Mã hóa SSL
        $mail->Port = 465; // Cổng kết nối SMTP
        //Cấu hình thông tin người gửi
        $mail->setFrom('mobilevutru@gmail.com', 'sieuthididong.shop'); // Địa chỉ email và tên người gửi
        // $mail->addAddress('nguyenhieu3105@gmail.com', 'USER');
        // $mail->addCC('nguyenhieu3105@gmail.com', 'USER');
        $mail->addCC('hieunmps33151@fpt.edu.vn', 'USER');
        // Định dạng Form HTML
        $mail->isHTML(true);
        // Tiêu đề
        $mail->Subject = 'TEST MAILER';
        // Nội dung
        $mail->Body = 'Tôi đến từ <strong> Siêu Thị Di Động. </strong>';
        //Gửi
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
function SendMail2()
{
    $mail = new PHPMailer(true);
    try {
        //Cấu hình Server
        $mail->SMTPDebug = 2;
        $mail->isSMTP(); // Sử dụng SMTP để gửi mail
        $mail->Host = 'mail.muasach.net'; // Server SMTP của gmail
        $mail->SMTPAuth = true; // Bật xác thực SMTP
        $mail->Username = 'lienhe@muasach.net'; // Tài khoản email
        $mail->Password = 'HongHa7979@'; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
        $mail->SMTPSecure = 'ssl'; // Mã hóa SSL
        $mail->Port = 465; // Cổng kết nối SMTP
        //Cấu hình thông tin người gửi
        $mail->setFrom('lienhe@muasach.net', 'lien he mua sach'); // Địa chỉ email và tên người gửi
        // $mail->addAddress('nguyenhieu3105@gmail.com', 'USER');
        // $mail->addCC('nguyenhieu3105@gmail.com', 'USER');
        $mail->addCC('hieunmps33151@fpt.edu.vn', 'USER');
        // Định dạng Form HTML
        $mail->isHTML(true);
        // Tiêu đề
        $mail->Subject = 'TEST MAILER';
        // Nội dung
        $mail->Body = 'Tôi là liên hệ đến từ <strong> Siêu Thị Di Động. </strong>';
        //Gửi
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}