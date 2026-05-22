<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

//----------------------------------------------------

if (isset($_POST['boton'])) {
  
    $dest1 =  "info@dwebdesarrollo.com.ar"; //Email de destino
    //$dest2 =  "alejandros.escobar@gmail.com"; //Email de destino 
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['correo'];
    $mensaje = $_POST['mensaje'];
    $cuerpo = '
				  <p><strong>Mensaje desde el sitio web.</strong></p>
				
					<strong>Nombre:</strong> ' . $nombre . ' <br>
					<strong>Telefono:</strong> ' . $telefono . ' <br>
					<strong>E-mail:</strong> ' . $email . ' <br><br>
					<strong>Mensaje:</strong><br>
					 ' . $mensaje . '

'; //Cuerpo del mensaje
    //$asunto = "Consulta desde tunquelen.tur.ar";
    //Cabeceras del correo
   // */ $headers = "From: $email \r\n"; //Quien envia?
    /*$headers .= "X-Mailer: PHP5\n";
        $headers .= 'MIME-Version: 1.0' . "\n";*/
   /* $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //

    if (mail($dest, $asunto, $cuerpo, $headers)) {
      $result = "<span class='ok'>Mensaje enviado correctamente!!</span>";
      // si el envio fue exitoso reseteamos lo que el usuario escribio:
      $_POST['nombre'] = '';
      $_POST['telefono'] = '';
      $_POST['correo'] = '';
      $_POST['mensaje'] = '';
    } else {
      $result = "<span class='error'>Hubo un error al enviar el mensaje.</span>";
    }*/

}



//-----------------------------------------------------
try {
    //Server settings
    $mail->SMTPDebug = 0;/*SMTP::DEBUG_SERVER;    */                  //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.dwebdesarrollo.com.ar';//'smtp.example.com';             //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'aescobar';                     //SMTP username
    $mail->Password   = 'Asd123$%&/';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('aescobar@dwebdesarrollo.com.ar', 'DWeb desarrollo');
    $mail->addAddress($dest1);     //Add a recipient
    //$mail->addAddress($dest2);               //Name is optional
    /*$mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Consulta desde el sitio web';
    $mail->Body    = $cuerpo;//'This is the HTML message body <b>in bold!</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $result = 'El mensaje se envió correctamente';
} catch (Exception $e) {
    $result =  "Hubo un error al enviar el mensaje. {$mail->ErrorInfo}";
}


?>