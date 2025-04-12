<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');



if (isset($_POST["email"])) {

  $email = $_POST["email"];
  $name = $_POST["name"];

  $msg = $_POST["msg"];
  $captcha = $_POST['captcha'];

  $captchaCode = isset($_SESSION['captcha']) ? $_SESSION['captcha'] : '';

  $iscaptchaValid = true;



  $pattern = "/^[a-zA-Z ]+$/";
  if (empty($name)) {
    echo "Please enter the name";
    $iscaptchaValid = false;
  } else if (!preg_match($pattern, $name)) {
    $ErrMsg = " Please enter a valid Name.";
    echo $ErrMsg;
    exit;
  }



  $pattern = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";


  if (empty($email)) {
    echo "Please enter the Email";
    $iscaptchaValid = false;
  } else if (!preg_match($pattern, $email)) {
    $ErrMsg = "Email is not valid.";
    echo $ErrMsg;
    exit;
  }







  if (empty($msg)) {
    echo "Please enter the Message";
    $iscaptchaValid = false;
    exit;
  }





  if (empty($captcha) || empty($captchaCode)) {
    // alert("not valid"); 
    echo "Captcha code is invalid";
    $iscaptchaValid = false;
    exit;
  } else {

    if ($captcha <> $captchaCode) {
      $iscaptchaValid = false;
    }
  }

  if ($iscaptchaValid) {
    $to = $email;
    $subject = "GlintWise India - Thank You for Contacting Us";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: GlintWise India <info@glintwise.com>" . "\r\n";

    $message = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlintWise India</title>
</head>
<body style="margin:0; padding:0; background-color:#f9f9f9; font-family:\'Segoe UI\', Arial, sans-serif;">
    <!-- Main Container -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f9f9f9">
        <tr>
            <td align="center" valign="top">
                <!-- Email Body -->
                <table width="750" border="0" cellspacing="0" cellpadding="30" bgcolor="#ffffff" style="border-bottom:5px solid #071dea; box-shadow:0 0 10px rgba(0,0,0,0.05);">
                    <tr>
                        <td style="padding:0 0 30px 0;">
                            <h1 style="margin:0; font-size:24px; color:#000;">Hi ' . $name . ',</h1>
                            <p style="margin:15px 0; font-size:14px; line-height:1.6; color:#333;">' . $msg . '</p>
                        </td>
                    </tr>

                    <!-- Decorative Element -->
                    <tr>
                        <td style="position:relative;">
                            <div style="position:absolute; right:-85px; top:0; z-index:9;">
                                <img src="https://i.ibb.co/CsXFvXqD/g.png" width="200" alt="Decorative graphic" style="display:block;">
                            </div>
                        </td>
                    </tr>

                    <!-- Footer Content -->
                    <tr>
                        <td style="padding:100px 0 0 0;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <!-- Left Column -->
                                    <td width="33%" valign="top" style="padding:0 15px;">
                                        <a href="#" style="display:inline-block; margin-bottom:10px;">
                                            <img src="https://i.ibb.co/jkKzMxTH/glintwise.png" width="220" height="71" alt="GlintWise Logo" style="display:block;">
                                        </a>
                                        <p style="margin:0; font-size:12px; color:#000; line-height:1.5;">
                                            No:10,11,1st Floor, Dr.Radhakrishnan Nagar, P.H Road,
                                            Arumbakkam, Chennai, Tamil Nadu 600106.
                                        </p>
                                    </td>

                                    <!-- Right Column -->
                                    <td width="66%" valign="top" style="padding:0 15px;">
                                        <table align="right" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="padding:0 10px;">
                                                    <a href="#" style="display:inline-block; width:30px; height:30px; background-color:#071dea; border-radius:50%; text-align:center; line-height:30px;">
                                                        <img src="https://via.placeholder.com/12x12" width="12" height="12" alt="Instagram" style="vertical-align:middle;">
                                                    </a>
                                                </td>
                                                <td style="padding:0 10px;">
                                                    <a href="#" style="display:inline-block; width:30px; height:30px; background-color:#071dea; border-radius:50%; text-align:center; line-height:30px;">
                                                        <img src="https://via.placeholder.com/12x12" width="12" height="12" alt="Twitter" style="vertical-align:middle;">
                                                    </a>
                                                </td>
                                                <td style="padding:0 10px;">
                                                    <a href="#" style="display:inline-block; width:30px; height:30px; background-color:#071dea; border-radius:50%; text-align:center; line-height:30px;">
                                                        <img src="https://via.placeholder.com/12x12" width="12" height="12" alt="LinkedIn" style="vertical-align:middle;">
                                                    </a>
                                                </td>
                                                <td style="padding:0 10px;">
                                                    <a href="#" style="display:inline-block; width:30px; height:30px; background-color:#071dea; border-radius:50%; text-align:center; line-height:30px;">
                                                        <img src="https://via.placeholder.com/12x12" width="12" height="12" alt="WhatsApp" style="vertical-align:middle;">
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Divider -->
                    <tr>
                        <td style="padding:10px 0;">
                            <hr style="border:0; height:1px; background-color:#eee; margin:0;">
                        </td>
                    </tr>

                    <!-- Contact Info -->
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <!-- Phone -->
                                    <td width="33%" valign="middle" style="padding:0 15px; border-right:1px solid #eee;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="padding-right:15px;">
                                                    <img src="https://via.placeholder.com/20x20" width="20" height="20" alt="Phone" style="display:block;">
                                                </td>
                                                <td>
                                                    <p style="margin:0; font-size:12px; color:#000; line-height:1.5;">
                                                        +91 81100 50600
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>

                                    <!-- Email -->
                                    <td width="33%" valign="middle" style="padding:0 15px; border-right:1px solid #eee;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="padding-right:15px;">
                                                    <img src="https://via.placeholder.com/20x20" width="20" height="20" alt="Email" style="display:block;">
                                                </td>
                                                <td>
                                                    <p style="margin:0; font-size:12px; color:#000; line-height:1.5;">
                                                        info@glintwise.com
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>

                                    <!-- Website -->
                                    <td width="33%" valign="middle" style="padding:0 15px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="padding-right:15px;">
                                                    <img src="https://via.placeholder.com/20x20" width="20" height="20" alt="Website" style="display:block;">
                                                </td>
                                                <td>
                                                    <p style="margin:0; font-size:12px; color:#000; line-height:1.5;">
                                                        www.glintwise.com
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';

$mail =  @mail($to, $subject, $message, $headers);






if ($mail) {
  $_SESSION['captcha'] = '';
  echo "Thank you for your message";
  exit;
} else {
  echo "Sorry...! Please try again later";
  exit;
}
} else {
echo "Captcha code is mismatch";
exit;
}
} else {
echo "Invalid Request!";
exit;
}
