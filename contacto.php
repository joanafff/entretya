<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/marca-shortcut.png">
    <title>Contacto</title>
</head>
<body>

    <?php include 'header.php'; ?>

    <div id="contactar">
        <div class="texto-formulario">
            <div class="texto">
                <div class="titulo">
                    <img src="assets/img/carta.png" alt="">
                    <h1>Contacta conmigo!</h1>
                </div>
                <p>
                    Si te gustaría comprar alguno de mis productos, te interesa más información o quieres proponerme alguna colaboración... No dudes en ponerte en contacto conmigo a través de este formulario!
                    <br><br>
                    También puedes escribirme directamente a este email: <b>entretelasyaromas@gmail.com</b>
                </p>
                <img class="img-lavanda" src="assets/img/otros/11.JPG" alt="">
                
            </div>
            <div class="formulario">
                <!-- Para el envío del mensaje, los datos del formulario se envían al fichero mail.php--> 
                <form action="models/mail.php" method="post">
                    <label for="nombre">Nombre</label>
                        <input type="text" placeholder="Escribe tu nombre.." name="nombre" required>
                    <label for="correo">Correo</label>
                        <input type="email" placeholder="Escribe tu correo electrónico.." name="correo" required>  
                    <label for="asunto">Asunto</label>
                        <input type="text" placeholder="Escribe un asunto.." name="asunto" required>
                    <label for="mensaje">Mensaje</label>
                        <textarea type="text" placeholder="Escribe aquí tu mensaje.." name="mensaje" required></textarea>  
                    <button type="submit" name="enviar">Enviar</button>
                </form>
            </div>
        </div>
        
        <div>
            <?php if (isset($_GET['exito'])) { ?>
                <p class="mensaje">Mensaje enviado correctamente, pronto obtendrás tu respuesta</p>
            <?php } ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>   

</body>
</html>