<?php
$to_email = "sdshafin5421@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$from="sdshaheer5421@gmail.com";
$headers = "From: $from";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} 
else {
    echo "Email sending failed...";
}
?>
