<?php
if (isset($_POST['boton'])) {
  if ($_POST['nombre'] == '') {
    $error1 = '<span class="error">Ingrese su nombre</span>';
  } else if ($_POST['telefono'] == '') {
    $error2 = '<span class="error">Ingrese un telefono</span>';
  } else if ($_POST['correo'] == '') {
    $error3 = '<span class="error">Ingrese un E-mail</span>';
  } else if ($_POST['mensaje'] == '') {
    $error4 = '<span class="error">Ingrese un mensaje</span>';
  } else {
    $dest = "aescobar.dw@gmail.com"; //Email de destino 
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['correo'];
    $mensaje = $_POST['mensaje'];
    $cuerpo = '
				    <p><strong>Mensaje desde www.aseoambiental.com.ar:</strong></p>
				
					<strong>Nombre:</strong> ' . $nombre . ' <br>
					<strong>Telefono:</strong> ' . $telefono . ' <br>
					<strong>E-mail:</strong> ' . $email . ' <br><br>
					<strong>Mensaje:</strong><br>
					 ' . $mensaje . '

'; //Cuerpo del mensaje
    $asunto = "Consulta desde aseoambiental.com.ar";
    //Cabeceras del correo
    $headers = "From: $email \r\n"; //Quien envia?
    /*$headers .= "X-Mailer: PHP5\n";
        $headers .= 'MIME-Version: 1.0' . "\n";*/
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //

    if (mail($dest, $asunto, $cuerpo, $headers)) {
      $result = '<div class="result_ok">Email enviado correctamente :)</a>';
      // si el envio fue exitoso reseteamos lo que el usuario escribio:
      $_POST['nombre'] = '';
      $_POST['telefono'] = '';
      $_POST['correo'] = '';
      $_POST['mensaje'] = '';
    } else {
      $result = '<div class="result_fail">Hubo un error al enviar el mensaje :(</a>';
    }
  }
}

echo $error1;
echo $error2;
echo $error3;
echo $error4;
echo $result;

