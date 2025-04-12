<?php

ob_start();
@session_start();

function generateCaptcha() {
//    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   $characters = '0123456789';
    $captcha = '';
    $length = 6; 
    
    for ($i = 0; $i < $length; $i++) {
        $captcha .= $characters[rand(0, strlen($characters) - 1)];
    }
    
    return $captcha;
}

$captchaCode = generateCaptcha();
$_SESSION['captcha'] = $captchaCode;

echo $captchaCode;

 
?>  