
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 22/11/2020 04:09
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class ConfiguracionControlador
{


  public static function ctrEnviarCorreoVerificacion($data)
  {

    try {


      $mail = new PHPMailer(true);

      $mail->CharSet = "UTF-8";

      $mail->SMTPDebug = 0;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.hostinger.mx';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'alberto@ifixitmor.com';                     // SMTP username
      $mail->Password   = '199720031230';                               // SMTP password
      $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
      $mail->Port       = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('alberto@ifixitmor.com', 'GRUPO EDUCATIVO SEAD');
      $mail->addAddress($data['usr_correo'], '');
      // Optional name

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Verificación de cuenta';
      $mail->Body  = '<!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
            <title>
              
            </title>
            <!--[if !mso]><!-- -->
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!--<![endif]-->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style type="text/css">
              #outlook a { padding:0; }
              .ReadMsgBody { width:100%; }
              .ExternalClass { width:100%; }
              .ExternalClass * { line-height:100%; }
              body { margin:0;padding:0;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%; }
              table, td { border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt; }
              img { border:0;height:auto;line-height:100%; outline:none;text-decoration:none;-ms-interpolation-mode:bicubic; }
              p { display:block;margin:13px 0; }
            </style>
            <!--[if !mso]><!-->
            <style type="text/css">
              @media only screen and (max-width:480px) {
                @-ms-viewport { width:320px; }
                @viewport { width:320px; }
              }
            </style>
            <!--<![endif]-->
            <!--[if mso]>
            <xml>
            <o:OfficeDocumentSettings>
              <o:AllowPNG/>
              <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
            </xml>
            <![endif]-->
            <!--[if lte mso 11]>
            <style type="text/css">
              .outlook-group-fix { width:100% !important; }
            </style>
            <![endif]-->
            
          <!--[if !mso]><!-->
            <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet" type="text/css">
            <style type="text/css">
              @import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);
    @import url(https://fonts.googleapis.com/css?family=Cabin:400,700);
            </style>
          <!--<![endif]-->
    
        
            
        <style type="text/css">
          @media only screen and (min-width:480px) {
            .mj-column-per-100 { width:100% !important; max-width: 100%; }
    .mj-column-per-25 { width:25% !important; max-width: 25%; }
    .mj-column-per-75 { width:75% !important; max-width: 75%; }
          }
        </style>
        
      
            <style type="text/css">
            
            
    
        @media only screen and (max-width:480px) {
          table.full-width-mobile { width: 100% !important; }
          td.full-width-mobile { width: auto !important; }
        }
      
            </style>
            <style type="text/css">.hide_on_mobile { display: none !important;} 
            @media only screen and (min-width: 480px) { .hide_on_mobile { display: block !important;} }
            .hide_section_on_mobile { display: none !important;} 
            @media only screen and (min-width: 480px) { .hide_section_on_mobile { display: table !important;} }
            .hide_on_desktop { display: block !important;} 
            @media only screen and (min-width: 480px) { .hide_on_desktop { display: none !important;} }
            .hide_section_on_desktop { display: table !important;} 
            @media only screen and (min-width: 480px) { .hide_section_on_desktop { display: none !important;} }
            [owa] .mj-column-per-100 {
                width: 100%!important;
              }
              [owa] .mj-column-per-50 {
                width: 50%!important;
              }
              [owa] .mj-column-per-33 {
                width: 33.333333333333336%!important;
              }
              p {
                  margin: 0px;
              }
              @media only print and (min-width:480px) {
                .mj-column-per-100 { width:100%!important; }
                .mj-column-per-40 { width:40%!important; }
                .mj-column-per-60 { width:60%!important; }
                .mj-column-per-50 { width: 50%!important; }
                mj-column-per-33 { width: 33.333333333333336%!important; }
                }</style>
            
          </head>
          <body style="background-color:#FFFFFF;">
            
            
          <div style="background-color:#FFFFFF;">
            
          
          <!--[if mso | IE]>
          <table
             align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
          >
            <tr>
              <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
          <![endif]-->
        
          
          <div style="Margin:0px auto;max-width:600px;">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
              <tbody>
                <tr>
                  <td style="direction:ltr;font-size:0px;padding:9px 0px 9px 0px;text-align:center;vertical-align:top;">
                    <!--[if mso | IE]>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    
            <tr>
          
                <td
                   class="" style="vertical-align:top;width:600px;"
                >
              <![endif]-->
                
          <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
            
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
            
                <tbody><tr>
                  <td align="center" style="font-size:0px;padding:0px 0px 0px 0px;word-break:break-word;">
                    
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
            <tbody>
              <tr>
              <td style="width:200px;">

              <img height="auto" src="https://softmor.com/wp-content/uploads/2020/11/logo-sead-1.png"
                style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;"
                width="200px">

            </td>
              </tr>
            </tbody>
          </table>
        
                  </td>
                </tr>
              
          </tbody></table>
        
          </div>
        
              <!--[if mso | IE]>
                </td>
              
            </tr>
          
                      </table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody>
            </table>
            
          </div>
        
          
          <!--[if mso | IE]>
              </td>
            </tr>
          </table>
          
          <table
             align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
          >
            <tr>
              <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
          <![endif]-->
        
          
          <div style="Margin:0px auto;max-width:600px;">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
              <tbody>
                <tr>
                  <td style="direction:ltr;font-size:0px;padding:9px 0px 9px 0px;text-align:center;vertical-align:top;">
                    <!--[if mso | IE]>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    
            <tr>
          
                <td
                   class="" style="vertical-align:top;width:600px;"
                >
              <![endif]-->
                
          <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
            
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
            
                <tbody><tr>
                  <td align="left" style="font-size:0px;padding:15px 15px 15px 15px;word-break:break-word;">
                    
          <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:11px;line-height:1.5;text-align:left;color:#000000;">
            <div><span style="font-size: 14px; color: #34495e;">&#xA1;Hola <strong>' . $data['usr_nombre'] . '</strong>!</span></div>
    <div><span style="font-size: 14px; color: #34495e;">Por favor, t&#xF3;mate unos minutos para completar tu registro verificando tu direcci&#xF3;n de email <strong>' . $data['usr_correo'] . '</strong>. &#xA1;Solo haz clic en el bot&#xF3;n debajo!</span></div>
          </div>
        
                  </td>
                </tr>
              
          </tbody></table>
        
          </div>
        
              <!--[if mso | IE]>
                </td>
              
            </tr>
          
                      </table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody>
            </table>
            
          </div>
        
          
          <!--[if mso | IE]>
              </td>
            </tr>
          </table>
          
          <table
             align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
          >
            <tr>
              <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
          <![endif]-->
        
          
          <div style="Margin:0px auto;max-width:600px;">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
              <tbody>
                <tr>
                  <td style="direction:ltr;font-size:0px;padding:9px 0px 9px 0px;text-align:center;vertical-align:top;">
                    <!--[if mso | IE]>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    
            <tr>
          
                <td
                   class="" style="vertical-align:top;width:600px;"
                >
              <![endif]-->
                
          <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
            
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
            
                <tbody><tr>
                  <td align="left" vertical-align="middle" style="font-size:0px;padding:20px 20px 20px 20px;word-break:break-word;">
                    
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;">
            <tbody><tr>
              <td align="center" bgcolor="#014F9F" role="presentation" style="border:0px solid #000;border-radius:10px;cursor:auto;mso-padding-alt:10px 30px 10px 30px;background:#014F9F;" valign="middle">
                <a href="' . $data['url_verificacion'] . '" style="display:inline-block;background:#014F9F;color:#ffffff;font-family:Ubuntu, Helvetica, Arial, sans-serif, Helvetica, Arial, sans-serif;font-size:15px;font-weight:normal;line-height:100%;Margin:0;text-decoration:none;text-transform:none;padding:10px 30px 10px 30px;mso-padding-alt:0px;border-radius:10px;" target="_blank">
                  <div>Verificar ahora</div>
                </a>
              </td>
            </tr>
          </tbody></table>
        
                  </td>
                </tr>
              
          </tbody></table>
        
          </div>
        
              <!--[if mso | IE]>
                </td>
              
            </tr>
          
                      </table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody>
            </table>
            
          </div>
        
          
          <!--[if mso | IE]>
              </td>
            </tr>
          </table>
          
          <table
             align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
          >
            <tr>
              <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
          <![endif]-->
        
          
          <div style="Margin:0px auto;max-width:600px;">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
              <tbody>
                <tr>
                  <td style="direction:ltr;font-size:0px;padding:9px 0px 9px 0px;text-align:center;vertical-align:top;">
                    <!--[if mso | IE]>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    
            <tr>
          
                <td
                   class="" style="vertical-align:top;width:150px;"
                >
              <![endif]-->
                
          <div class="mj-column-per-25 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
            
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
            
                <tbody><tr>
                  <td align="center" style="font-size:0px;padding:0px 0px 0px 0px;word-break:break-word;">
                    
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
            <tbody>
              <tr>
                <td style="width:150px;">
                  
          <img height="auto" src="https://cdn3.iconfinder.com/data/icons/social-media-logos-flat-colorful/2048/5303_-_Gmail-512.png" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="150">
        
                </td>
              </tr>
            </tbody>
          </table>
        
                  </td>
                </tr>
              
          </tbody></table>
        
          </div>
        
              <!--[if mso | IE]>
                </td>
              
                <td
                   class="" style="vertical-align:top;width:450px;"
                >
              <![endif]-->
                
          <div class="mj-column-per-75 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
            
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
            
                <tbody><tr>
                  <td align="center" style="font-size:0px;padding:15px 15px 15px 15px;word-break:break-word;">
                    
          <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:11px;line-height:2;text-align:center;color:#000000;">
            <p><span style="font-size: 14px; color: #34495e;">Si tienes dudas o preguntas, por favor cont&#xE1;ctanos por email a ' . $data['soporte_correo'] . '</span></p>
          </div>
        
                  </td>
                </tr>
              
          </tbody></table>
        
          </div>
        
              <!--[if mso | IE]>
                </td>
              
            </tr>
          
                      </table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody>
            </table>
            
          </div>
        
          
          <!--[if mso | IE]>
              </td>
            </tr>
          </table>
          <![endif]-->
        
        
          </div>
        
          
        
      </body></html>';
      $mail->send();

      return true;
    } catch (PHPMailer $th) {
      throw $th;
      return false;
    }
  }

  public static function ctrEnviarCorreoCambiarClave($data)
  {

    try {


      $mail = new PHPMailer(true);

      $mail->CharSet = "UTF-8";

      $mail->SMTPDebug = 0;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.hostinger.mx';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'alberto@ifixitmor.com';                     // SMTP username
      $mail->Password   = '199720031230';                               // SMTP password
      $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
      $mail->Port       = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('alberto@ifixitmor.com', 'GRUPO EDUCATIVO SEAD');
      $mail->addAddress($data['usr_correo'], '');
      // Optional name

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Solicitud para establecer una nueva contraseña';
      $mail->Body  = '<!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
            <title>
              
            </title>
            <!--[if !mso]><!-- -->
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!--<![endif]-->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style type="text/css">
              #outlook a { padding:0; }
              .ReadMsgBody { width:100%; }
              .ExternalClass { width:100%; }
              .ExternalClass * { line-height:100%; }
              body { margin:0;padding:0;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%; }
              table, td { border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt; }
              img { border:0;height:auto;line-height:100%; outline:none;text-decoration:none;-ms-interpolation-mode:bicubic; }
              p { display:block;margin:13px 0; }
            </style>
            <!--[if !mso]><!-->
            <style type="text/css">
              @media only screen and (max-width:480px) {
                @-ms-viewport { width:320px; }
                @viewport { width:320px; }
              }
            </style>
            <!--<![endif]-->
            <!--[if mso]>
            <xml>
            <o:OfficeDocumentSettings>
              <o:AllowPNG/>
              <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
            </xml>
            <![endif]-->
            <!--[if lte mso 11]>
            <style type="text/css">
              .outlook-group-fix { width:100% !important; }
            </style>
            <![endif]-->
            
          <!--[if !mso]><!-->
            <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet" type="text/css">
            <style type="text/css">
              @import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);
    @import url(https://fonts.googleapis.com/css?family=Cabin:400,700);
            </style>
          <!--<![endif]-->
    
        
            
        <style type="text/css">
          @media only screen and (min-width:480px) {
            .mj-column-per-100 { width:100% !important; max-width: 100%; }
    .mj-column-per-25 { width:25% !important; max-width: 25%; }
    .mj-column-per-75 { width:75% !important; max-width: 75%; }
          }
        </style>
        
      
            <style type="text/css">
            
            
    
        @media only screen and (max-width:480px) {
          table.full-width-mobile { width: 100% !important; }
          td.full-width-mobile { width: auto !important; }
        }
      
            </style>
            <style type="text/css">.hide_on_mobile { display: none !important;} 
            @media only screen and (min-width: 480px) { .hide_on_mobile { display: block !important;} }
            .hide_section_on_mobile { display: none !important;} 
            @media only screen and (min-width: 480px) { .hide_section_on_mobile { display: table !important;} }
            .hide_on_desktop { display: block !important;} 
            @media only screen and (min-width: 480px) { .hide_on_desktop { display: none !important;} }
            .hide_section_on_desktop { display: table !important;} 
            @media only screen and (min-width: 480px) { .hide_section_on_desktop { display: none !important;} }
            [owa] .mj-column-per-100 {
                width: 100%!important;
              }
              [owa] .mj-column-per-50 {
                width: 50%!important;
              }
              [owa] .mj-column-per-33 {
                width: 33.333333333333336%!important;
              }
              p {
                  margin: 0px;
              }
              @media only print and (min-width:480px) {
                .mj-column-per-100 { width:100%!important; }
                .mj-column-per-40 { width:40%!important; }
                .mj-column-per-60 { width:60%!important; }
                .mj-column-per-50 { width: 50%!important; }
                mj-column-per-33 { width: 33.333333333333336%!important; }
                }</style>
            
          </head>
          <body style="background-color:#FFFFFF;">
            
            
          <div style="background-color:#FFFFFF;">
            
          
          <!--[if mso | IE]>
          <table
             align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
          >
            <tr>
              <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
          <![endif]-->
        
          
          <div style="Margin:0px auto;max-width:600px;">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
              <tbody>
                <tr>
                  <td style="direction:ltr;font-size:0px;padding:9px 0px 9px 0px;text-align:center;vertical-align:top;">
                    <!--[if mso | IE]>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    
            <tr>
          
                <td
                   class="" style="vertical-align:top;width:600px;"
                >
              <![endif]-->
                
          <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
            
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
            
                <tbody><tr>
                  <td align="center" style="font-size:0px;padding:0px 0px 0px 0px;word-break:break-word;">
                    
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
            <tbody>
              <tr>
              <td style="width:200px;">

              <img height="auto" src="https://softmor.com/wp-content/uploads/2020/11/logo-sead-1.png"
                style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;"
                width="200px">

            </td>
              </tr>
            </tbody>
          </table>
        
                  </td>
                </tr>
              
          </tbody></table>
        
          </div>
        
              <!--[if mso | IE]>
                </td>
              
            </tr>
          
                      </table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody>
            </table>
            
          </div>
        
          
          <!--[if mso | IE]>
              </td>
            </tr>
          </table>
          
          <table
             align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
          >
            <tr>
              <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
          <![endif]-->
        
          
          <div style="Margin:0px auto;max-width:600px;">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
              <tbody>
                <tr>
                  <td style="direction:ltr;font-size:0px;padding:9px 0px 9px 0px;text-align:center;vertical-align:top;">
                    <!--[if mso | IE]>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    
            <tr>
          
                <td
                   class="" style="vertical-align:top;width:600px;"
                >
              <![endif]-->
                
          <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
            
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
            
                <tbody><tr>
                  <td align="left" style="font-size:0px;padding:15px 15px 15px 15px;word-break:break-word;">
                    
          <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:11px;line-height:1.5;text-align:left;color:#000000;">
            <div><span style="font-size: 14px; color: #34495e;">&#xA1;Hola <strong>' . $data['usr_nombre'] . '</strong>!</span></div>
    <div><span style="font-size: 14px; color: #34495e;">Hemos recibido una solicitud para restablecer tu contraseña. Si no enviaste esta solicitud puedes ignorar este mensaje. <br>  De lo contrario, puedes restablecer tu contraseña usando este botón:</span></div>
          </div>
        
                  </td>
                </tr>
              
          </tbody></table>
        
          </div>
        
              <!--[if mso | IE]>
                </td>
              
            </tr>
          
                      </table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody>
            </table>
            
          </div>
        
          
          <!--[if mso | IE]>
              </td>
            </tr>
          </table>
          
          <table
             align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
          >
            <tr>
              <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
          <![endif]-->
        
          
          <div style="Margin:0px auto;max-width:600px;">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
              <tbody>
                <tr>
                  <td style="direction:ltr;font-size:0px;padding:9px 0px 9px 0px;text-align:center;vertical-align:top;">
                    <!--[if mso | IE]>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    
            <tr>
          
                <td
                   class="" style="vertical-align:top;width:600px;"
                >
              <![endif]-->
                
          <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
            
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
            
                <tbody><tr>
                  <td align="left" vertical-align="middle" style="font-size:0px;padding:20px 20px 20px 20px;word-break:break-word;">
                    
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;">
            <tbody><tr>
              <td align="center" bgcolor="#014F9F" role="presentation" style="border:0px solid #000;border-radius:10px;cursor:auto;mso-padding-alt:10px 30px 10px 30px;background:#014F9F;" valign="middle">
                <a href="' . $data['url_verificacion'] . '" style="display:inline-block;background:#014F9F;color:#ffffff;font-family:Ubuntu, Helvetica, Arial, sans-serif, Helvetica, Arial, sans-serif;font-size:15px;font-weight:normal;line-height:100%;Margin:0;text-decoration:none;text-transform:none;padding:10px 30px 10px 30px;mso-padding-alt:0px;border-radius:10px;" target="_blank">
                  <div>Restablecer contraseña</div>
                </a>
              </td>
            </tr>
          </tbody></table>
        
                  </td>
                </tr>
              
          </tbody></table>
        
          </div>
        
              <!--[if mso | IE]>
                </td>
              
            </tr>
          
                      </table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody>
            </table>
            
          </div>
        
          
          <!--[if mso | IE]>
              </td>
            </tr>
          </table>
          
          <table
             align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
          >
            <tr>
              <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
          <![endif]-->
        
          
          <div style="Margin:0px auto;max-width:600px;">
            
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
              <tbody>
                <tr>
                  <td style="direction:ltr;font-size:0px;padding:9px 0px 9px 0px;text-align:center;vertical-align:top;">
                    <!--[if mso | IE]>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    
            <tr>
          
                <td
                   class="" style="vertical-align:top;width:150px;"
                >
              <![endif]-->
                
          <div class="mj-column-per-25 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
            
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
            
                <tbody><tr>
                  <td align="center" style="font-size:0px;padding:0px 0px 0px 0px;word-break:break-word;">
                    
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
            <tbody>
              <tr>
                <td style="width:150px;">
                  
          <img height="auto" src="https://cdn3.iconfinder.com/data/icons/social-media-logos-flat-colorful/2048/5303_-_Gmail-512.png" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="150">
        
                </td>
              </tr>
            </tbody>
          </table>
        
                  </td>
                </tr>
              
          </tbody></table>
        
          </div>
        
              <!--[if mso | IE]>
                </td>
              
                <td
                   class="" style="vertical-align:top;width:450px;"
                >
              <![endif]-->
                
          <div class="mj-column-per-75 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
            
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
            
                <tbody><tr>
                  <td align="center" style="font-size:0px;padding:15px 15px 15px 15px;word-break:break-word;">
                    
          <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:11px;line-height:2;text-align:center;color:#000000;">
            <p><span style="font-size: 14px; color: #34495e;">Si tienes dudas o preguntas, por favor cont&#xE1;ctanos por email a ' . $data['soporte_correo'] . '</span></p>
          </div>
        
                  </td>
                </tr>
              
          </tbody></table>
        
          </div>
        
              <!--[if mso | IE]>
                </td>
              
            </tr>
          
                      </table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody>
            </table>
            
          </div>
        
          
          <!--[if mso | IE]>
              </td>
            </tr>
          </table>
          <![endif]-->
        
        
          </div>
        
          
        
      </body></html>';
      $mail->send();

      return true;
    } catch (PHPMailer $th) {
      throw $th;
      return false;
    }
  }

  public function ctrAgregarConfiguracion()
  {
  }
  public function ctrActualizarConfiguracion()
  {
  }
  public function ctrMostrarConfiguracion()
  {
  }
  public function ctrEliminarConfiguracion()
  {
  }

  public static function ctrAccesoSucursalUsr()
  {
    if (isset($_POST['btnAccesoSucursalUsr'])) {

      $acceso = ConfiguracionModelo::mdlAccesoSucursalUsr(json_encode($_POST['scl_acceso_usr'],true), $_SESSION['session_suc']['scl_id']);

      if ($acceso) {
        $_SESSION['session_suc'] = SucursalesModelo::mdlMostrarSucursales($_SESSION['session_suc']['scl_id']);
        return array(
          'status' => true,
          'mensaje' => 'Accesos modificados',
          'pagina' => ''
        );
      } else {
        return array(
          'status' => false,
          'mensaje' => 'Ocurrio un error, intente de nuevo',
          'pagina' => HTTP_HOST . 'configuracion'
        );
      }
    }
  }
}
