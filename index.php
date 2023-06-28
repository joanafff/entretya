<?php
    require_once 'controller/common.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/marca-shortcut.png">
    <title>Entre Telas y Aromas</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <main id="inicio">

        <div class="contenedor">
            <div class="cont-trasero"></div>
            <div class="cont-contenido">
                    <div class="cont-imagen" style="background-image: url('assets/img/otros/IMG_8506.jpg')"></div>
                    <div class="cont-texto">
                        <p>Este proyecto surge de la pasión por las plantas y el respeto por la naturaleza.</p>
                    </div>
            </div>
        </div>

        <div class="contenedor">
            <div class="cont-trasero"></div>
            <div class="cont-contenido">
                <div class="cont-texto">
                    <p>Con el deseo de acercar los beneficios de las plantas medicinales y aromáticas a nuestra vida diaria de una manera sencilla y sostenible.</p>
                </div>
                <div class="cont-imagen" style="background-image: url('assets/img/otros/hip-ar5.jpg');"></div>
            </div>
        </div>

        <div class="contenedor">
            <div class="cont-trasero"></div>
            <div class="cont-contenido">
                <div class="cont-imagen" style="background-image: url('assets/img/otros/222.jpg')"></div>
                <div class="cont-texto">
                    <p>Todos los productos son elaborados de manera artesanal y con ingredientes 100% naturales.</p>
                </div>
            </div>
        </div>

    </main>

    <?php require 'views/footer.php'; ?>

</body>
</html>
