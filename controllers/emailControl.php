<?php

function sendVerificationEmail($userEmail, $token){
  $to = $userEmail;
  $subject = "Verify your Streamsglobal Account";

  $message = "
  <!DOCTYPE html>
  <html>

  <head>
    <title>Verify | Streams Global</title>
    <link href='https://i.imgur.com/q6DcKop.png' rel='shortcut icon' type='image/x-icon'>
    <link href='https://i.imgur.com/q6DcKop.png' rel='apple-touch-icon'>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <style type='text/css'>
    @media screen {
      @import url('https://fonts.googleapis.com/css?family=Saira&display=swap');
      @font-face {
        font-family: \"Saira\";
        font-style: normal;
        font-weight: 400;
        src: local('Saira Regular'), local('Saira-Regular'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }

      @font-face {
        font-family: \"Saira\";
        font-style: normal;
        font-weight: 700;
        src: local('Saira Bold'), local('Saira-Bold'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }

      @font-face {
        font-family: \"Saira\";
        font-style: italic;
        font-weight: 400;
        src: local('Saira Italic'), local('Saira-Italic'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }

      @font-face {
        font-family: \"Saira\";
        font-style: italic;
        font-weight: 700;
        src: local('Saira Bold Italic'), local('Saira-BoldItalic'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }
    }

    /* CLIENT-SPECIFIC STYLES */
    body,
    table,
    td,
    a {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    img {
      -ms-interpolation-mode: bicubic;
    }

    /* RESET STYLES */
    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
    }

    table {
      border-collapse: collapse !important;
    }

    body {
      height: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      width: 100% !important;
    }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width:600px) {
      h1 {
        font-size: 32px !important;
        line-height: 32px !important;
      }
    }

    /* ANDROID CENTER FIX */
    div[style*='margin: 16px 0;'] {
      margin: 0 !important;
    }
    </style>
  </head>

  <body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
    <!-- HIDDEN PREHEADER TEXT -->
    <div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: \"Saira\", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'> We're thrilled to have you here! Get ready to dive into your new account. </div>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
      <!-- LOGO -->
      <tr>
        <td bgcolor='#19b334' align='center'>
          <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 800px;'>
            <tr>
              <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor='#19b334' align='center' style='padding: 0px 10px 0px 10px;'>
          <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 800px;'>
            <tr>
              <td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                <img src=' https://i.imgur.com/Ev3V4AY.png' width='125' height='120' style='display: block; border: 0px;' /><h1 style='font-size: 48px; font-weight: 700; margin: 2;'>Welcome!</h1>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor='#ffffff' align='center' style='padding: 0px 10px 0px 10px;'>
          <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 800px;'>
            <tr>
              <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 20px 30px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <p style='margin: 0;'>We're excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
              </td>
            </tr>

            <tr>

              <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                  <tr>
                    <td align='center' style='border-radius: 5px;' bgcolor='#19b334'><a href='http://streamsglobal.com/sign-up?success=step3&token=" . $token . "' target='_blank' style='font-size: 20px; font-family: \"Saira\", Helvetica, Arial, sans-serif; background-color: #19b334; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 5px; border: 1px solid #19b334; display: inline-block;'>Confirm Account</a></td>
                  </tr>
                </table>
              </td>

            </tr> <!-- COPY -->

            <tr>
              <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 0px 30px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <p style='margin: 0;'>If that doesn't work, copy and paste the following link in your browser:</p>
              </td>
            </tr> <!-- COPY -->
            <tr>
              <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 20px 30px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <p style='margin: 0;'><a href='http://streamsglobal.com/sign-up?success=step3&token=" . $token . "' target='_blank' style='color: #19b334;'>http://streamsglobal.com/sign-up?success=step3&token=" . $token . "</a></p>
              </td>
            </tr>
            <tr>
              <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 20px 30px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <p style='margin: 0;'>If you have any questions, just reply to this email—we're always happy to help out.</p>
              </td>
            </tr>
            <tr>
              <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <p style='margin: 0;'>Cheers,<br>Streamsglobal Team</p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor='#f4f4f4' align='center' style='padding: 30px 10px 0px 10px;'>
          <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 800px;'>
            <tr>
              <td bgcolor='#FFECD1' align='center' style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Need more help?</h2>
                <p style='margin: 0;'><a href='http://streamsglobal.com/faqs' target='_blank' style='color: #19b334;'>We&rsquo;re here to help you out</a></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>

    </table>
  </body>

  </html>
  ";
  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // More headers
  $headers .= 'From: <zubyinnocent@gmail.com>' . "\r\n";

  mail($to,$subject,$message,$headers);
}



// SEND EMAIL TO ADMIN IF A USER PASS A REFERRALCODE
//$userdata['referralfname']
function sendreferralEmail($userdata){
  $to = "com.zubbey@hotmail.com";
  $subject = "New user has been Referred";

  $message = "
  <!DOCTYPE html>
  <html>

  <head>
    <title>Referral Email | Streams Global</title>
    <link href='https://i.imgur.com/q6DcKop.png' rel='shortcut icon' type='image/x-icon'>
    <link href='https://i.imgur.com/q6DcKop.png' rel='apple-touch-icon'>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <style type='text/css'>
    @media screen {
      @import url('https://fonts.googleapis.com/css?family=Saira&display=swap');
      @font-face {
        font-family: \"Saira\";
        font-style: normal;
        font-weight: 400;
        src: local('Saira Regular'), local('Saira-Regular'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }

      @font-face {
        font-family: \"Saira\";
        font-style: normal;
        font-weight: 700;
        src: local('Saira Bold'), local('Saira-Bold'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }

      @font-face {
        font-family: \"Saira\";
        font-style: italic;
        font-weight: 400;
        src: local('Saira Italic'), local('Saira-Italic'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }

      @font-face {
        font-family: \"Saira\";
        font-style: italic;
        font-weight: 700;
        src: local('Saira Bold Italic'), local('Saira-BoldItalic'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }
    }

    /* CLIENT-SPECIFIC STYLES */
    *{font-family: \"Saira\", Helvetica, Arial, sans-serif}
    .bg-light {

    }
    body {
      margin: 0;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #212529;
      text-align: left;
      background-color: #f8f9fa!important;
    }
    .container {
      width: 100%;
      padding-right: 15px;
      padding-left: 15px;
      margin-right: auto;
      margin-left: auto;
    }
    .my-5 {
      margin-bottom: 3rem!important;
  }
  .my-5 {
      margin-top: 3rem!important;
  }
  .row {
      /* display: -ms-flexbox; */
      display: flex;
      /* -ms-flex-wrap: wrap; */
      flex-wrap: wrap;
      margin-right: -15px;
      margin-left: -15px;
  }
  .col {
      /* -ms-flex-preferred-size: 0; */
      flex-basis: 0;
      /* -ms-flex-positive: 1; */
      flex-grow: 1;
      max-width: 100%;
  }
  .col{
      position: relative;
      width: 100%;
      padding-right: 15px;
      padding-left: 15px;
  }
  .card {
      position: relative;
      /* display: -ms-flexbox; */
      display: flex;
      /* -ms-flex-direction: column; */
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 1px solid rgba(0,0,0,.125);
      border-radius: .25rem;
  }
  .card-header:first-child {
      border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
  }
  .justify-content-between {
      /* -ms-flex-pack: justify!important; */
      justify-content: space-between!important;
  }
  .d-flex {
      /* display: -ms-flexbox!important; */
      display: flex!important;
  }
  .card-header {
      padding: .75rem 1.25rem;
      margin-bottom: 0;
      background-color: rgba(0,0,0,.03);
      border-bottom: 1px solid rgba(0,0,0,.125);
  }
  .card-body {
      /* -ms-flex: 1 1 auto; */
      flex: 1 1 auto;
      padding: 1.25rem;
  }
  .card-title {
      margin-bottom: .75rem;
  }
  img.img-responsive.rounded-circle {
      border-radius: 50px;
  }
  h5 {
      font-size: 1.25rem;
      font-weight: 500;
      line-height: 1.2;
      display:block;
          margin: 0;
          /* margin-block-start: 1.67em;
      margin-block-end: 1.67em;
      margin-inline-start: 0px;
      margin-inline-end: 0px; */
  }
  h3 {
      font-size: 1.75rem;
  }
  .font-weight-normal {
      font-weight: 400!important;
  }
  .text-muted {
      color: #6c757d!important;
  }
  p {
      margin-top: 0;
      margin-bottom: 1rem;
      display: block;
      /* margin-block-start: 1em;
      margin-block-end: 1em;
      margin-inline-start: 0px;
      margin-inline-end: 0px; */
  }
  .my-auto {
      margin-bottom: auto!important;
  }
  .my-auto {
      margin-top: auto!important;
  }
  div {
      display: block;
  }
  .btn {
      display: inline-block;
      font-weight: 400;
      /* color: #212529; */
      text-align: center;
      vertical-align: middle;
      /* -webkit-user-select: none; */
      /* -moz-user-select: none; */
      /* -ms-user-select: none; */
      user-select: none;
      /* background-color: transparent; */
      /* border: 1px solid transparent; */
      padding: .375rem .75rem;
      font-size: 1rem;
      line-height: 1.5;
      border-radius: .25rem;
      transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  }
  a {
      /* color: #007bff; */
      text-decoration: none;
      /* background-color: transparent; */
  }
  small {
      font-size: 80%;
      font-weight: 400;
  }
  .text-center {
      text-align: center!important;
  }
  .py-3 {
      padding-bottom: 1rem!important;
  }
  .py-3 {
      padding-top: 1rem!important;
  }
  .bg-white {
      background-color: #fff!important;
  }
    .btn-primary{
      background-color: #2ab334;
      border: 1px solid #23930f;
      color: #fff;
    }
    .btn-primary:hover{
      background-color: #23930f;
    }

    h6 {
      font-size: 14px;
      font-family: \"Saira\", Helvetica, Arial, sans-serif;
    }
    .footer-copyright{
      position: absolute;
      bottom: 0;
      width: 100%;
      margin:auto;
    }
    @media (min-width: 1200px){
      .container {
        max-width: 1140px;
      }
    }
    @media (min-width: 992px){
      .container {
        max-width: 960px;
      }
    }
    @media (min-width: 768px){
      .container {
        max-width: 720px;
      }
    }
    @media (min-width: 576px){
      .container {
        max-width: 540px;
      }
    }
    @media (min-width: 320px) and (max-width: 767.98px) {
      .btn{font-size: .7rem;}
      small.text-muted{font-size: .7rem;}
      p.text-muted {font-size: .7rem;}

    }
    </style>
  </head>

  <body class='bg-light'>
    <div class='container'>
      <div class='row my-5'>
        <div class='col'>
          <div class='card'>
            <div class='card-header d-flex justify-content-between my-auto'>
              <h5>".$userdata['referralfname']." ".$userdata['referrallname']." 	 <small class='text-muted'>&lt;".$userdata['referralemail']."&gt;</small> </h5>
              <img src='https://i.imgur.com/gaJNXRO.png' width='32' height='32' class='img-responsive rounded-circle' alt='profile image'>
            </div>
            <div class='card-body'>
              <h5 class='card-title'>".$userdata['userfname']." ".$userdata['userlname']." has been referred by ".$userdata['referralfname']."' '".$userdata['referrallname']."</h5>
              <div class='card-title'><smail>Referral Code: </small><span class='h3 font-weight-normal'>".$userdata['referralcode']."</span></div>
              <p class='card-text text-muted'>please comfirm if ".$userdata['userfname']." is fully registered.</p>
              <div class='d-flex justify-content-between my-auto'>
              <a href='http://streamsglobal.com/user/admin?users=all' class='btn btn-primary'>View Profile</a>
              <small class='text-muted'>".$userdata['datereferred'].".</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class='footer-copyright text-center py-3 bg-white'>
      <p class='text-muted'>&copy; Copyright 2019 <script>new Date().getFullYear()>2017&&document.write('|'+new Date().getFullYear());</script> <a href='index' class='text-muted'> Streams Global Cooperative</a>, All Rights Reserved</p>
    </footer>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  </body>
  </html>
  ";
  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // More headers
  $headers .= 'From: <zubyinnocent@gmail.com>' . "\r\n";

  mail($to,$subject,$message,$headers);
}

###################### Verify New Email Updated ###########################
function sendemailUpdate($newEmail, $token){
  $to = $newEmail;
  $subject = "Verify your new email address";

  $message = "
  <!DOCTYPE html>
  <html>

  <head>
    <title>Verify | Streams Global</title>
    <link href='https://i.imgur.com/q6DcKop.png' rel='shortcut icon' type='image/x-icon'>
    <link href='https://i.imgur.com/q6DcKop.png' rel='apple-touch-icon'>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <style type='text/css'>
    @media screen {
      @import url('https://fonts.googleapis.com/css?family=Saira&display=swap');
      @font-face {
        font-family: \"Saira\";
        font-style: normal;
        font-weight: 400;
        src: local('Saira Regular'), local('Saira-Regular'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }

      @font-face {
        font-family: \"Saira\";
        font-style: normal;
        font-weight: 700;
        src: local('Saira Bold'), local('Saira-Bold'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }

      @font-face {
        font-family: \"Saira\";
        font-style: italic;
        font-weight: 400;
        src: local('Saira Italic'), local('Saira-Italic'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }

      @font-face {
        font-family: \"Saira\";
        font-style: italic;
        font-weight: 700;
        src: local('Saira Bold Italic'), local('Saira-BoldItalic'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }
    }

    /* CLIENT-SPECIFIC STYLES */
    body,
    table,
    td,
    a {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    img {
      -ms-interpolation-mode: bicubic;
    }

    /* RESET STYLES */
    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
    }

    table {
      border-collapse: collapse !important;
    }

    body {
      height: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      width: 100% !important;
    }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width:600px) {
      h1 {
        font-size: 32px !important;
        line-height: 32px !important;
      }
    }

    /* ANDROID CENTER FIX */
    div[style*='margin: 16px 0;'] {
      margin: 0 !important;
    }
    </style>
  </head>

  <body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
    <!-- HIDDEN PREHEADER TEXT -->
    <div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: \"Saira\", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'> We're thrilled to have you here! Get ready to dive into your new account. </div>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
      <!-- LOGO -->
      <tr>
        <td bgcolor='#19b334' align='center'>
          <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 800px;'>
            <tr>
              <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor='#19b334' align='center' style='padding: 0px 10px 0px 10px;'>
          <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 800px;'>
            <tr>
              <td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                <img src=' https://i.imgur.com/Ev3V4AY.png' width='125' height='120' style='display: block; border: 0px;' /><h3 style='font-size: 48px; font-weight: 700; margin: 2;'>Hello, ".$_SESSION['usersfname']."</h3>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor='#ffffff' align='center' style='padding: 0px 10px 0px 10px;'>
          <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 800px;'>
            <tr>
              <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 20px 30px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <p style='margin: 0;'>you recently changed your email address please verify the email to continue with Streamsglobal Cooperative.</p>
              </td>
            </tr>

            <tr>

              <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                  <tr>
                    <td align='center' style='border-radius: 5px;' bgcolor='#19b334'><a href='http://streamsglobal.com/start?success=emailverified&token=" . $token . "' target='_blank' style='font-size: 20px; font-family: \"Saira\", Helvetica, Arial, sans-serif; background-color: #19b334; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 5px; border: 1px solid #19b334; display: inline-block;'>Confirm Email Account</a></td>
                  </tr>
                </table>
              </td>

            </tr> <!-- COPY -->

            <tr>
              <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 0px 30px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <p style='margin: 0;'>If that doesn't work, copy and paste the following link in your browser:</p>
              </td>
            </tr> <!-- COPY -->
            <tr>
              <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 20px 30px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <p style='margin: 0;'><a href='http://streamsglobal.com/start?success=emailverified&token=" . $token . "' target='_blank' style='color: #19b334;'>http://streamsglobal.com/start?success=emailverified&token=" . $token . "</a></p>
              </td>
            </tr>
            <tr>
              <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 20px 30px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <p style='margin: 0;'>If you have any questions, just reply to this email—we're always happy to help out.</p>
              </td>
            </tr>
            <tr>
              <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <p style='margin: 0;'>Cheers,<br>Streamsglobal Team</p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor='#f4f4f4' align='center' style='padding: 30px 10px 0px 10px;'>
          <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 800px;'>
            <tr>
              <td bgcolor='#FFECD1' align='center' style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Need more help?</h2>
                <p style='margin: 0;'><a href='http://streamsglobal.com/faqs' target='_blank' style='color: #19b334;'>We&rsquo;re here to help you out</a></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>

    </table>
  </body>

  </html>
  ";
  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // More headers
  $headers .= 'From: <zubyinnocent@gmail.com>' . "\r\n";

  mail($to,$subject,$message,$headers);
}


#################  SEND PASSWORD RESET LINK EMAIL #######################
function sendresetpasswordLink($resetemail, $token){
  $to = $resetemail;
  $subject = "Password Reset Link";

  $message = "

  <!DOCTYPE html>
  <html>

  <head>
    <title>Reset Password | Streams Global</title>
    <link href='https://i.imgur.com/q6DcKop.png' rel='shortcut icon' type='image/x-icon'>
    <link href='https://i.imgur.com/q6DcKop.png' rel='apple-touch-icon'>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <style type='text/css'>
    @media screen {
      @import url('https://fonts.googleapis.com/css?family=Saira&display=swap');
      @font-face {
        font-family: \"Saira\";
        font-style: normal;
        font-weight: 400;
        src: local('Saira Regular'), local('Saira-Regular'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }

      @font-face {
        font-family: \"Saira\";
        font-style: normal;
        font-weight: 700;
        src: local('Saira Bold'), local('Saira-Bold'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }

      @font-face {
        font-family: \"Saira\";
        font-style: italic;
        font-weight: 400;
        src: local('Saira Italic'), local('Saira-Italic'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }

      @font-face {
        font-family: \"Saira\";
        font-style: italic;
        font-weight: 700;
        src: local('Saira Bold Italic'), local('Saira-BoldItalic'), url(https://fonts.googleapis.com/css?family=Saira:400,500,600,700,800&display=swap) format('woff');
      }
    }

    /* CLIENT-SPECIFIC STYLES */
    body,
    table,
    td,
    a {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    img {
      -ms-interpolation-mode: bicubic;
    }

    /* RESET STYLES */
    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
    }

    table {
      border-collapse: collapse !important;
    }

    body {
      height: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      width: 100% !important;
    }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width:600px) {
      h1 {
        font-size: 32px !important;
        line-height: 32px !important;
      }
    }

    /* ANDROID CENTER FIX */
    div[style*='margin: 16px 0;'] {
      margin: 0 !important;
    }
    </style>
  </head>

  <body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
    <!-- HIDDEN PREHEADER TEXT -->
    <div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: \"Saira\", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'> We're thrilled to have you here! Get ready to dive into your new account. </div>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
      <!-- LOGO -->
      <tr>
        <td bgcolor='#19b334' align='center'>
          <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 800px;'>
            <tr>
              <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor='#19b334' align='center' style='padding: 0px 10px 0px 10px;'>
          <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 800px;'>
            <tr>
              <td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                <img src=' https://i.imgur.com/Ev3V4AY.png' width='125' height='120' style='display: block; border: 0px;' /><h3 style='font-size: 48px; font-weight: 700; margin: 2;'>Hello dear,</h3>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor='#ffffff' align='center' style='padding: 0px 10px 0px 10px;'>
          <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 800px;'>
            <tr>
              <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 20px 30px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <p style='margin: 0;'>You recently requested to reset your password, please confirm your account to continue.</p>
              </td>
            </tr>

            <tr>

              <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                  <tr>
                    <td align='center' style='border-radius: 5px;' bgcolor='#19b334'><a href='http://streamsglobal.com/resetpassword?success=resetlink&token=" . $token . "' target='_blank' style='font-size: 20px; font-family: \"Saira\", Helvetica, Arial, sans-serif; background-color: #19b334; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 5px; border: 1px solid #19b334; display: inline-block;'>Confirm Password Reset</a></td>
                  </tr>
                </table>
              </td>

            </tr> <!-- COPY -->

            <tr>
              <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 0px 30px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <p style='margin: 0;'>If that doesn't work, copy and paste the following link in your browser:</p>
              </td>
            </tr> <!-- COPY -->
            <tr>
              <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 20px 30px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <p style='margin: 0;'><a href='http://streamsglobal.com/resetpassword?success=resetlink&token=" . $token . "' target='_blank' style='color: #19b334;'>http://streamsglobal.com/resetpassword?success=resetlink&token=" . $token . "</a></p>
              </td>
            </tr>
            <tr>
              <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 20px 30px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <p style='margin: 0;'>If you have any questions, just reply to this email—we're always happy to help out.</p>
              </td>
            </tr>
            <tr>
              <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <p style='margin: 0;'>Cheers,<br>Streamsglobal Team</p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor='#f4f4f4' align='center' style='padding: 30px 10px 0px 10px;'>
          <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 800px;'>
            <tr>
              <td bgcolor='#FFECD1' align='center' style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Need more help?</h2>
                <p style='margin: 0;'><a href='http://streamsglobal.com/faqs' target='_blank' style='color: #19b334;'>We&rsquo;re here to help you out</a></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>

    </table>
  </body>

  </html>

  ";

  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // More headers
  $headers .= 'From: <zubyinnocent@gmail.com>' . "\r\n";

  mail($to,$subject,$message,$headers);
}
