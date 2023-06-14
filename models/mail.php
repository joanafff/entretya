<?php

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$asunto = $_POST['asunto']; 
$mensaje = nl2br($_POST['mensaje']);

if(isset($_POST['enviar'])){
    enviarCorreo($nombre, $correo, $asunto, $mensaje);
}


//para enviar el correo a destinatario, usando la función mail() de php
function enviarCorreo($nombre, $correo, $asunto, $mensaje){
    $destinatario = "entretelasyaromas@gmail.com";

    $cuerpo ='
        <html> 
        <head> 
            <title>Prueba de envio de correo</title> 
        </head>
        <body> 
            <h1>Contacto desde la web</h1>
            <p>De: '.$nombre . ' - ' . $correo .'</p>
            <h2>Mensaje</h2>
            '.$mensaje.'
        </body>
        </html>';

    //para el envío en formato HTML 
    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=UTF8\r\n"; 
    //dirección del remitente
    $headers .= "FROM: $nombre <$correo>\r\n";
    
    $envio = mail($destinatario, $asunto, $cuerpo, $headers);
    if (!empty($envio)){
        header("Location: ../contacto.php?exito");
    }
}
?>