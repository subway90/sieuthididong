<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../../publics/mailer/src/Exception.php';
require_once '../../publics/mailer/src/PHPMailer.php';
require_once '../../publics/mailer/src/SMTP.php';


function SendMail()
{
    $mail = new PHPMailer(true);
    try {
        //Cấu hình Server
        $mail->SMTPDebug = 2;
        $mail->isSMTP(); // Sử dụng SMTP để gửi mail
        $mail->Host = '	mail.sieuthididong.shop'; // Server SMTP của gmail
        $mail->SMTPAuth = true; // Bật xác thực SMTP
        $mail->Username = 'lienhe@sieuthididong.shop'; // Tài khoản email
        $mail->Password = 'HongHa7979@'; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
        $mail->SMTPSecure = 'ssl'; // Mã hóa SSL
        $mail->Port = 465; // Cổng kết nối SMTP là 587 [Ưu tiền dùng hơn 465]
        //Cấu hình thông tin người gửi
        $mail->setFrom('lienhe@sieuthididong.shop', 'sieuthididong.shop'); // Địa chỉ email và tên người gửi
        $mail->addAddress('nguyenhieu3105@gmail.com', 'USER'); // Địa chỉ mail và tên người nhận
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