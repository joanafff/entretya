<?php
    require_once 'controller/common.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/marca-shortcut.png">
    <title>Mi Lista</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <main id="milista">

    <?php 
    require_once 'models/milista.php';
    $productos = obtenerProductosMilista();

    //Si no hay productos en la lista, solo se muestra este <section>
    if (mysqli_num_rows($productos) <= 0){ ?>
        <section class="no-prod">
                <h2 > Todavía no hay productos </h1>
                <h4> Visita la tienda para agregar productos a tu carrito</h2><br><br>
                <a href="productos.php">Ver tienda</a>
        </section>
    <?php
    } else {?>
        <div class="container">
        <h1>Tu lista de productos que te gustan</h1>
        
        <div class="cont_tabla">
            <table>
                    <?php
                    while ($producto = mysqli_fetch_assoc($productos)) {
                    ?>
                    <tr>
                        <td><img src="assets/img/productos/<?php echo $producto['imagen1'];?>" alt="foto1" width="130px"></td>
                        <td>
                            <h3><?php echo $producto['nombre'];?></h3>
                            <p><?php echo $producto['disponibilidad'];?><p>
                            <p class="precio"><?php echo $producto['precio'];?> €</p>
                        </td>
                        <td class="botones">
                            <!----- Boton Eliminar ----->
                            <a href="productos_item.php?id=<?php echo $producto['id'];?>">Ver</a>
                            <form method="POST" action="" class="eliminar">
                                <button type="submit" name="eliminar">Quitar</button>
                                <input type="hidden" name="id_producto" value="<?php echo $producto['id'] ?>">
                            </form><br>
                        <?php
                            if(isset($_POST['eliminar'])){
                                eliminarProductoMilista($_POST['id_producto']);
                            } ?>
                        </td>
                    </tr>
                    <?php } ?>
                    
            </table>
            </div>
            
            <div class="contact">
                <img src="assets/img/carta.png" alt="" width="40px">
                <p>Si quieres saber más acerca de alguno de estos productos, contacta conmigo a través de este formulario</p>
                <a href="contacto.php">Contactar</a>
            </div>
        </div>
        
    <?php 
    }
    ?>
    </main>

    <?php require 'views/footer.php'; ?>

</body>
</html>
