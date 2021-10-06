<?php
$to_email = "tranphucnm510@gmail.com";
$subject = "chúc mừng bạn đã đăng kí thành công tại websize";
$body = "vui lòng nhấp vào đây  ";
$headers = "From: sender\'s email";
 
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}