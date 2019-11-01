<?php
require_once ('./config/constants.php');
require_once './vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $token){
    // Create a message
    global $mailer;

    $body = "
    <html>
    <head>

    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <meta content='telephone=no' name='format-detection'>
    <title>Verify | Streams Global</title>
    <link href='https://i.imgur.com/q6DcKop.png' rel='shortcut icon' type='image/x-icon'>
    <link href='https://i.imgur.com/q6DcKop.png' rel='apple-touch-icon'>
    <style type='text/css'>
    .ReadMsgBody {width: 100%; background-color: #ffffff;}
    .ExternalClass {width: 100%; background-color: #ffffff;}
    body {
      width: 100%;
      background-color: #ffffff;
      margin:0;
      padding:0;
      -webkit-font-smoothing: antialiased;
      font-family: sans-serif; }
      a { color:#D8D8D8; text-decoration:none }

      table {border-collapse: collapse;}

      body[yahoo] .desktop-hidden { max-height: 0px; overflow:hidden;  max-height: 0px !important; overflow:hidden !important; display: none; display: none !important;}

      @media only screen and (max-width: 640px)  {
        body[yahoo] .deviceWidth {width:600px!important; padding:0;}
        body[yahoo] .center {text-align: center!important; display:block; margin-left:auto; margin-right:auto;}
        body[yahoo] .desktop-hidden { max-height: 0px; overflow:hidden;  max-height: 0px !important; overflow:hidden !important; display: none; display: none !important;}
        body[yahoo] .mobile-bg{background-color:#ffffff!important}
        body[yahoo] .linkColor { color: #d8d8d8!important;text-decoration: none!important;}

      }

      @media only screen and (max-width: 479px) {

        body[yahoo] .mobile-font{font-size: 11px!important;color:#777777!important;}
        body[yahoo] .mobile-font2{font-size: 14px!important;color:#666666!important;}
        body[yahoo] .mobile-font22{font-size: 22px!important;color:#4d4d4d!important;display:block!important;}
        body[yahoo] .mobile-font20{font-size: 20px!important;color:#4d4d4d!important;display:block!important;}
        body[yahoo] .mobile-font14{font-size: 14px!important;color:#4d4d4d!important;display:block!important;}
        body[yahoo] .mobile-font10{font-size: 10px!important;color:#aaaaaa!important;display:block!important;}
        body[yahoo] .mobile-font12{font-size: 12px!important;color:#4d4d4d!important;display:block!important;}
        body[yahoo] .mobile-font16{font-size: 16px!important;color:#4d4d4d!important;display:block!important;}
        body[yahoo] .mobile-font24{font-size: 24px!important;color:#4d4d4d!important;display:block!important;}
        body[yahoo] .mobile-font24c{font-size: 24px!important;color:#fff!important;display:block!important;}
        body[yahoo] .mobile-font22c{font-size: 22px!important;color:#ffffff!important;display:block!important;}
        body[yahoo] .mobile-font14c{font-size: 14px!important;color:#ffffff!important;display:block!important;}
        body[yahoo] .mobile-font16c{font-size: 16px!important;color:#ffffff!important;display:block!important;}
        body[yahoo] .mobile-font12c{font-size: 12px!important;color:#ffffff!important;display:block!important;}
        body[yahoo] .mobile-link{color:#f47d31!important;}
        body[yahoo] .mobile-bg{background-color:#ffffff!important}
        body[yahoo] .center {text-align: center!important;}
        body[yahoo] .deviceWidth {width:320px!important; padding:0;}
        body[yahoo] .mobile-hidden { display:none !important; }
        body[yahoo] .desktop-hidden { max-height: none; overflow:visible;  max-height: none !important; overflow:visible!important; display: block; display: block !important;}
        body[yahoo] .linkColor { color: #d8d8d8!important;text-decoration: none!important;}
      }

      /***** SMARTPHONE STYLING RULES *****/
      @media only screen and (max-width: 600px) {
        body[yahoo] .mobile-font{font-size: 11px!important;color:#777777!important;}
        body[yahoo] .mobile-font2{font-size: 14px!important;color:#666666!important;}
        body[yahoo] .mobile-font22{font-size: 22px!important;color:#4d4d4d!important;display:block!important;}
        body[yahoo] .mobile-font20{font-size: 20px!important;color:#4d4d4d!important;display:block!important;}
        body[yahoo] .mobile-font14{font-size: 14px!important;color:#4d4d4d!important;display:block!important;}
        body[yahoo] .mobile-font12{font-size: 12px!important;color:#4d4d4d!important;display:block!important;}
        body[yahoo] .mobile-font16{font-size: 16px!important;color:#4d4d4d!important;display:block!important;}
        body[yahoo] .mobile-font24{font-size: 24px!important;color:#4d4d4d!important;display:block!important;}
        body[yahoo] .mobile-font24c{font-size: 24px!important;color:#fff!important;display:block!important;}
        body[yahoo] .mobile-font22c{font-size: 22px!important;color:#ffffff!important;display:block!important;}
        body[yahoo] .mobile-font14c{font-size: 14px!important;color:#ffffff!important;display:block!important;}
        body[yahoo] .mobile-font16c{font-size: 16px!important;color:#ffffff!important;display:block!important;}
        body[yahoo] .mobile-font12c{font-size: 12px!important;color:#ffffff!important;display:block!important;}
        body[yahoo] .mobile-link{color:#f47d31!important;}
        body[yahoo] .mobile-bg{background-color:#ffffff!important}
        body[yahoo] .center {text-align: center!important;}
        body[yahoo] .deviceWidth {width:320px!important; padding:0;}
        body[yahoo] .mobile-hidden { display:none !important; }
        body[yahoo] .desktop-hidden { max-height: none; overflow:visible;  max-height: none !important; overflow:visible!important; display: block; display: block !important;}
        body[yahoo] .linkColor { color: #d8d8d8!important;text-decoration: none!important;}

      }
      </style>
      </head>

      <body leftmargin='0' topmargin='0' marginwidth='0' marginheight='0' yahoo='fix' style='font-family: sans-serif;>

      <!-- Wrapper -->
      <table style= ' width:100%; border:0; cellpadding:0; cellspacing:0; align:center; bgcolor:#ffffff;>
      <tbody>
      <tr>
      <!-- Wrapper -->
      <td width='100%' valign='top' style='padding-top:0px;margin:0;border:0;vertical-align: top;'>
      <!-- Wrapper -->

      <!-- Begin HEADER Desktop Content -->
      <div class='mobile-hidden'>
      <table width='600' border='0' cellpadding='0' cellspacing='0' align='center' class='mobile-hidden' bgcolor='#ffffff'>
      <tbody>
      <tr>
      <td style='min-width: 600px;'></td>
      </tr>
      <tr>
      <td style='font-size: 0;background: #ffffff; padding: 30px 0;' align='center'>

      <a href='https://www.streamsglobal.com/login.php' target='_blank' conversion='true'>
      <img src='https://i.imgur.com/Okn5Kqm.png' width='300' style=' display: block; max-width: 300px; width: 300px;margin:0 auto;' border='0' alt='streamsglobal'>
      </a>
      </td>
      </tr>
      </tbody>
      </table>
      </div>

      <!--END DESKTOP HEADER-->
      <!--Mobile HEADER-->
      <div class='desktop-hidden' style='max-height: 0px; overflow:hidden; display:none;'>
      <table width='600' cellpadding='0' cellspacing='0' align='center' class='desktop-hidden deviceWidth' bgcolor='#ffffff' padding='0' margin='0' border='0' style='max-height: 0px; overflow:hidden; display:none; margin-left:auto; margin-right:auto; width:0px;'>
      <tbody>
      <tr>
      <td style='font-size:0;' class='deviceWidth'>

      </td>
      </tr>
      <tr>

      <td style='font-size: 0;padding: 20px 0;margin-top: 20px;'>
      <a href='https://www.streamsglobal.com/login.php' target='_blank' conversion='true'>
      <img src='https://i.imgur.com/Okn5Kqm.png' width='120' style=' display: block; max-width: 120px; width: 120px;margin:0 auto;' border='0' alt='streamsglobal'>
      </a>
      </td>
      </tr>
      </tbody>
      </table>
      </div>
      <!--END Mobile HEADER-->
      </td>
      </tr>
      <tr>
      <td width='100%' valign='top' style='padding-top:0px;margin:0;border:0;vertical-align: top;'>
      <!--END OF TOP PART-->
      <!--BEGIN CONTENTS-->
      <!--BEGIN DESKTOP CONTENTS-->
      <div class='mobile-hidden'>
      <table width='600' border='0' cellpadding='0' cellspacing='0' align='center' class='mobile-hidden' bgcolor='#ffffff'>
      <tbody>
      <tr>
      <td style='min-width: 600px'></td>
      </tr>
      <tr>
      <td style='font-size: 0;background: #ffffff; width: 552px; padding:24px 24px 32px; ' align='center'>
      <h1 style='line-height:3rem;font-family: sans-serif; font-size: 3rem; letter-spacing:.8px; color: #19b334;'>


      It's time to Save & Invest Your Money.</h1>
      </td>
      </tr>

      <tr>

      <td style='font-size: 0;background: #ffffff; width: 552px; padding:24px 24px 32px;' align='center'>
      <p style='line-height:28px;font-family:\"Saira\", sans-serif; font-size: 16px; letter-spacing:.8px; color: #605f5d;'>


      Thanks you for signing up to Streams Global Cooperative. Verify your account to start saving, Please click the button below to verify your email.</p>
      </td>

      </tr>
      <tr>
      <td style='font-size: 0;background: #ffffff;padding:0px 0px 32px 0px;' align='center'>

      <a http://streamsglobal.com/sign-up.php?success=step3&token=" . $token . "' style='padding: 10px; background: #19b334; color: ffffff; margin: 0; border: 0; box-shadow: 0; font-size: 1.2rem; font-family: sans-serif; cursor: pointer; display: inline-flex;'>Verify your email address</a>

      </td>
      </tr>

      </tbody>
      </table>
      </div>
      <!--END DESKTOP CONTENTS-->
      <!--BEGIN MOBILE CONTENTS-->
      <div class='desktop-hidden' style='max-height: 0px; overflow:hidden; display:none;'>
      <table width='600' cellpadding='0' cellspacing='0' align='center' class='desktop-hidden deviceWidth' bgcolor='#ffffff' padding='0' margin='0' border='0' style='max-height: 0px; overflow:hidden; display:none; margin-left:auto; margin-right:auto; width:0px'>
      <tbody>
      <tr>
      <td style='font-size:0;' class='deviceWidth'>

      </td>
      </tr>
      <tr>

      <td style='font-size: 0;background: #ffffff; width: 552px; padding:24px 24px 32px; ' align='center'>
      <h1 style='line-height:3rem;font-family: sans-serif; font-size: 1.2rem; letter-spacing:.8px; color: #19b334;'>

      It\'s time to Save & Invest Your Money.</h1>
      </td>
      </tr>
      <tr>
      <td align='center'>
      <span class='mobile-font14' style='line-height: 28px; margin:auto; padding: 32px;font-family: sans-serif;ze: 0px; color: #4d4d4d;background: #fff;'>

      Thanks you for signing up to Streams Global Cooperative. Verify your account to start saving, Please click the button below to verify your email.

      </span>
      </td>
      </tr>

      <tr>

      <td style='font-size: 0;padding: 0px 0px 16px 0px;'>
      <a http://streamsglobal.com/sign-up.php?success=step3&token=" . $token . "' style='padding: 10px; background: #19b334; color: ffffff; margin: 0; border: 0; box-shadow: 0; font-size: 1rem; font-family: sans-serif; cursor: pointer; display: inline-flex;'>Verify your email address</a>
      </td>
      </tr>

      </tbody>
      </table>
      </div>
      <!--END MOBILE CONTENTS-->
      <!--END CONTENTS-->
      <!--BEGIN BOTTOM PART-->
      </td>
      </tr>
      <tr>
      <td width='100%' valign='top' style='padding-top:0px;margin:0;border:0;vertical-align: top;'>


      <!-- Begin FOOTER Desktop Content -->
      <div class='mobile-hidden'>
      <table width='600' border='0' cellpadding='0' cellspacing='0' align='center' class='mobile-hidden' bgcolor='#ffffff'>
      <tbody>
      <tr>
      <td style='min-width: 600px'></td>
      </tr>
      <tr>

      <td style='font-size: 0; padding: 20px 0; ' align='center' bgcolor='#ffffff'>

      <table width='100%' border='0' cellspacing='0' cellpadding='0' class='mobile-hidden'>
      <tbody>
      <tr>
      <td style='font-size:0;padding: 20px 0;' align='center'>
      <table width='176' height='1' border='0' cellspacing='0' cellpadding='0' class='mobile-hidden'>
      <tbody>
      <tr>

      <td width='176' height='1' style='font-size:0;' bgcolor='#D8D8D8'>

      </td>

      </tr>
      </tbody>
      </table>
      </td>
      </tr>
      <tr>
      <td style='font-size:0;' align='center'>
      <table width='176' border='0' cellspacing='0' cellpadding='0' class='mobile-hidden'>
      <tbody>
      <tr>
      <td width='63' class='img-center' style='font-size:0pt; line-height:0pt; text-align:center'>
      <a href='https://www.facebook.com/streamsglobal' target='_blank'><img border='0' src='http://hosting.fyleio.com/35437/public/Master%20template%20images/Social_Icon_Facebook.png' width='13' height='24'></a>
      </td>
      <td width='63' class='img-center' style='font-size:0pt; line-height:0pt; text-align:center'>
      <a href='https://www.instagram.com/streamsglobal/' target='_blank'><img border='0' src='http://hosting.fyleio.com/35437/public/Master%20template%20images/Social_Icon_Instagram.png' width='24'></a>
      </td>


      <td width='63' class='img-center' style='font-size:0pt; line-height:0pt; text-align:center'>
      <a href='https://twitter.com/streamsglobal' target='_blank'><img border='0' src='http://hosting.fyleio.com/35437/public/Master%20template%20images/Social_Icon_Twitter.png' width='24'></a>
      </td>
      <td width='63' class='img-center' style='font-size:0pt; line-height:0pt; text-align:center'>
      <a href='https://www.youtube.com/user/streamsglobal' target='_blank'><img border='0' src='http://hosting.fyleio.com/35437/public/Master%20template%20images/Social_Icon_Youtube.png' width='24'></a>
      </td>
      </tr>
      </tbody>
      </table>
      </td>
      </tr>
      </tbody>
      </table>

      </td>
      </tr>
      <tr>
      <td align='center' style='font-size: 0;' bgcolor='#ffffff'>
      <table width='100%' border='0' cellspacing='0' cellpadding='0' >
      <tbody>
      <tr>
      <p style='font-family: sans-serif; font-size: 0.7rem; color: #a9a9a9'>
      Our investment professionals invest savers funds in financial instruments and manage the investments to ensure optimum return. To facilitate security of savers funds, assets are held by Meristem Trustees, a company registered with the Security and Exchange Commission (SEC) on behalf of savers. These assets are marked to market periodically to ensure savers\' investments are protected.
      </p>
      </tr>
      </tbody>
      </table>
      </td>
      </tr>
      </tbody>
      </table>
      </div>

      <!--END DESKTOP FOOTER-->
      <!--Mobile FOOTER-->
      <div class='desktop-hidden' style='max-height: 0px; overflow:hidden; display:none;'>
      <table width='600' cellpadding='0' cellspacing='0' align='center' class='desktop-hidden deviceWidth mobile-bg' padding='0' margin='0' border='0' style='max-height: 0px; overflow:hidden; display:none; margin-left:auto; margin-right:auto; width:0px'>
      <tbody>
      <tr>
      <td style='font-size: 0; padding: 22px 0;' align='center'>
      <table width='100%' height='2' class='desktop-hidden deviceWidth img-center mobile-bg' style='max-height: 0px; overflow:hidden; display:none; margin: 0 auto; width:0px'>
      <tbody>
      <tr>
      <td style='font-size: 0pt;' width='72'>

      </td>
      <td style='font-size: 0pt;background: #d8d8d8;height:1px;' height='2' width='176'>

      </td>
      <td style='font-size: 0pt;' width='72'>

      </td>
      </tr>
      </tbody>
      </table>
      </td>
      </tr>
      <tr>
      <td style='font-size: 0; padding: 22px 0;' align='center'>

      <table width='176' border='0' cellspacing='0' cellpadding='0' class='desktop-hidden deviceWidth img-center' style='max-height: 0px; overflow:hidden; display:none; margin: 0 auto; width:0px'>
      <tbody>
      <tr>
      <td style='font-size: 0;' width='34'></td>
      <td style='font-size: 0;' width='63' align='center'>
      <a href='https://www.facebook.com/streamsglobal' target='_blank'><img border='0' src='http://hosting.fyleio.com/35437/public/Master%20template%20images/Social_Icon_Facebook.png' height='24' class='img-center'></a>
      </td>
      <td style='font-size: 0;' width='63' align='center'>
      <a href='https://www.instagram.com/streamsglobal/' target='_blank'><img border='0' src='http://hosting.fyleio.com/35437/public/Master%20template%20images/Social_Icon_Instagram.png' height='24' class='img-center'></a>
      </td>


      <td style='font-size: 0;' width='63' align='center'>
      <a href='https://twitter.com/streamsglobal' target='_blank'><img border='0' src='http://hosting.fyleio.com/35437/public/Master%20template%20images/Social_Icon_Twitter.png' height='24' class='img-center'></a>
      </td>
      <td style='font-size: 0;' width='63' align='center'>
      <a href='https://www.youtube.com/user/streamsglobal' target='_blank'><img border='0' src='http://hosting.fyleio.com/35437/public/Master%20template%20images/Social_Icon_Youtube.png' height='24' class='img-center'></a>
      </td>
      <td style='font-size: 0;' width='34'></td>
      </tr>
      </tbody>
      </table>


      </td>
      </tr>
      <tr>
      <td align='center' style='font-size: 0;'>
      <table width='100%' border='0' cellspacing='0' cellpadding='0' class='desktop-hidden deviceWidth mobile-bg' style='max-height: 0px; overflow:hidden; display:none; margin-left:auto; margin-right:auto; width:0px'>
      <tbody>
      <tr>
      <p style='font-family:sans-serif; font-size: 0.5rem; color: #a9a9a9'>

      Our investment professionals invest savers funds in financial instruments and manage the investments to ensure optimum return. To facilitate security of savers funds, assets are held by Meristem Trustees, a company registered with the Security and Exchange Commission (SEC) on behalf of savers. These assets are marked to market periodically to ensure savers\' investments are protected.
      </p>
      </tr>
      </tbody>
      </table>
      </td>
      </tr>
      </tbody>
      </table>
      </div>
      <!--END MOBILE FOOTER-->
      </td>
      </tr>
      </tbody>
      </table>

      </body>

      </html>
      ";

    $message = (new Swift_Message('Verify your email address'))
      ->setFrom([EMAIL => 'Streamsglobal'])
      ->setTo([$userEmail])
      ->setBody($body, 'text/html')
      ;

    // Send the message
    $result = $mailer->send($message);
}
