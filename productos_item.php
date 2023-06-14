<?php 
    include 'header.php'; 
    include 'models/milista.php';
    include 'models/productos.php';

    $id_producto = $_GET ['id'];
    $producto = obtenerItem($id_producto);

    if(isset($_POST['me-gusta'])){
        anadirProductoMilista($id_producto, $user_id);
    }
?>


<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Propio-->
    <link rel="stylesheet" href="assets/css/tienda.css">
    <!-- CSS : Header y Footer-->
    <link rel="stylesheet" href="assets/css/style.css">
    <title><?= $producto['nombre']; ?></title>

</head>
<body>

    <main id="item">
        <form action="" method="post" class="box">
        <input type="hidden" name="pid" value="">
        <input type="hidden" name="name" value="">
        <input type="hidden" name="price" value="">
        <input type="hidden" name="image" value="">
        <h2><?= $producto['nombre']; ?></h2>
        <div class="row">
            <div class="image-container">
                <div class="main-image">
                    <img src="assets/img/productos/<?=$producto['imagen1'];?>" alt="foto1">
                </div>
                <div class="sub-image">
                    <img src="assets/img/productos/<?=$producto['imagen1'];?>" alt="foto1">
                    <img src="assets/img/productos/<?=$producto['imagen2'];?>" alt="foto2">
                    <img src="assets/img/productos/<?=$producto['imagen3'];?>" alt="foto3">
                </div>
            </div>
            <div class="content">
                <div class="details"><?= $producto['descripcion']; ?></div>
                <div class="flex">
                    <div class="price"><span><?= $producto['precio']; ?></span><span> eu</span></div>
                    <div class="dispo"><span><?= $producto['disponibilidad']; ?></span></div>
                </div>
                <div class="botones">
                    <?php 
                    if(isset($_SESSION['id'])){?>
                        <a href="contacto.php" class="btn-contactar" name="contactar">Contactar</a>
                        <input class="btn-megusta" type="submit" name="me-gusta" value="Me gusta">
                    <?php } else { ?>
                        <a href="contacto.php" class="btn-contactar" name="contactar">Contactar</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        </form>

       
    </main>

    <?php include 'footer.php'; ?>

    <!--Script para controlar el visualizador de imágenes con el evento onclick-->
    <script>
        let mainImage = document.querySelector('.main-image img');
        let subImages = document.querySelectorAll('.sub-image img');

        subImages.forEach(images =>{
        images.onclick = () =>{
            src = images.getAttribute('src');
            mainImage.src = src;
        }
        });
    </script>
    
</body>
</html>