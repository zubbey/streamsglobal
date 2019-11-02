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
                  <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                      <tr>
                          <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
                      </tr>
                  </table>
              </td>
          </tr>
          <tr>
              <td bgcolor='#19b334' align='center' style='padding: 0px 10px 0px 10px;'>
                  <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                      <tr>
                          <td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                              <img src=' https://i.imgur.com/Ev3V4AY.png' width='125' height='120' style='display: block; border: 0px;' /><h1 style='font-size: 48px; font-weight: 700; margin: 2;'>Welcome!</h1>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
          <tr>
              <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                  <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                      <tr>
                          <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 20px 30px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                              <p style='margin: 0;'>We're excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
                          </td>
                      </tr>
                        <tr>
                            <td bgcolor='#19b334' align='center' style='padding: 0px 10px 0px 10px;'>
                                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                    <tr>
                                        <td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                                          <a href='http://streamsglobal.com/sign-up.php?success=step3&token=" . $token . "' target='_blank' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 3px; border: 1px solid #19b334; display: inline-block;'>
                                            Confirm Account
                                          </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                      <tr>
                          <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 0px 30px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                              <p style='margin: 0;'>If that doesn't work, copy and paste the following link in your browser:</p>
                          </td>
                      </tr> <!-- COPY -->
                      <tr>
                          <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 20px 30px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                              <p style='margin: 0;'><a href='http://streamsglobal.com/sign-up.php?success=step3&token=" . $token . "' target='_blank' style='color: #19b334;'>http://streamsglobal.com/sign-up.php?success=step3&token=" . $token . "</a></p>
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
                  <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                      <tr>
                          <td bgcolor='#FFECD1' align='center' style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: \"Saira\", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                              <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Need more help?</h2>
                              <p style='margin: 0;'><a href='http://streamsglobal.com/faqs.php' target='_blank' style='color: #19b334;'>We&rsquo;re here to help you out</a></p>
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
  $headers .= 'From: <help@streamsglobal.com>' . "\r\n";

  mail($to,$subject,$message,$headers);
}
