<?php
    require_once 'controller/common.php';

    require_once 'models/milista.php';
    require_once 'models/productos.php';
    require_once 'models/categorias.php';

    //Se asigna un valor a la variable $orden, dependiendo de la variable pasada por GET
    if(isset($_GET['orden'])){
        switch($_GET['orden']){
            case 'a-z' : 
                $orden = 'nombre';
                break;
            case 'asc':
                $orden = 'precio ASC';
                break;
            case 'desc':
                $orden = 'precio DESC';  
        }
    } else { $orden = 'nombre'; }

    //La variable por GET sirve para controlar la llamada a la función
    if(isset($_GET['cat'])){
        $productos= obtenerCatProductos($_GET['cat'], $orden);
        $categoria = obtenerCategoria($_GET['cat']);
    }else{
        $productos = obtenerTodosProductos($orden);
    }

    if(isset($_POST['buscar'])){
        $nombre = $_POST['search'];
        $productos = buscarProducto($nombre);
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!-- CSS : Header y Footer-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- CSS propio -->
    <link rel="stylesheet" href="assets/css/tienda.css">
    <link rel="shortcut icon" href="assets/img/marca-shortcut.png">
</head>
<body>
    
    <?php 
        require 'views/header.php'; 

        if(isset($_POST['me-gusta'])){
            anadirProductoMilista($_POST['id'], $user_id);
        }
    ?>

    <main id="productos">

        <div class="container-filtros">
            <!----- PARA BUSCAR POR NOMBRE ------>
            <div class="filtro">
                <form action="productos.php" method="POST">
                    <input type="search" name="search" placeholder="Buscar Producto">
                    <button name="buscar" type="submit"><img src="assets/img/buscar.png" alt="" width="20"></button>
                </form>
            </div>
            <!----- PARA ORDENAR PRODUCTOS ------>
            <div class="filtro">
                <h3>Ordenar por:</h3>
                <a href="productos.php?orden=a-z">Nombre A-Z</a></br>
                <a href="productos.php?orden=asc">Precio Ascendiente</a></br>
                <a href="productos.php?orden=desc">Precio Descendiente</a></br>
            </div>
            <!----- PARA CAMBIAR DE CATEGORIA ------>
            <div class="filtro">
                <h3>Categorías</h3>
                <a href="productos.php">Todos los productos</a></br>
                <a href="productos.php?cat=1">Sacos Térmicos de Semillas</a></br>
                <a href="productos.php?cat=2">Saquitos Aromáticos</a></br>
                <a href="productos.php?cat=3">Jabones</a></br>
                <a href="productos.php?cat=4">Cosméticos</a></br>
            </div>
        </div>

        <div class="cuerpo-catalogo">
            <!----- EXPLICACIÓN CATEGORIA ------>
            <div class="intro_categoria">
                <?php if(isset($_GET['cat'])){ ?>
                    <h1><?php echo $categoria['categoria']?></h1>
                    <p><?php echo $categoria['descripcion']?></p>
                <?php } else if(!isset($_POST['buscar'])){ ?>
                    <h1>Entre Telas y Aromas</h1>
                    <p>Todos los productos son elaborados de manera artesanal y con ingredientes 100% naturales.</p>
                <?php } ?>
            </div>


            <!----- CATÁLOGO DE PRODUCTOS ------>
            <div class="catalogo_productos">
            <?php
            if(mysqli_num_rows($productos) > 0){
                while ($producto = mysqli_fetch_assoc($productos)) {
            ?>
                <form action="" method="post" class="caja_producto">
                    <input type="hidden" name="id" value="<?= $producto['id']; ?>">
                    <input type="hidden" name="name" value="<?= $producto['nombre']; ?>">
                    <input type="hidden" name="price" value="<?= $producto['precio']; ?>">
                    <input type="hidden" name="image" value="<?= $producto['imagen1']; ?>">
                
                    <?php 
                    //Dependiendo de si existe sesion activa, se muestra o no el botón me gusta
                    if(isset($_SESSION['id'])){?>
                        <button class="megusta" type="submit" name="me-gusta"></button>
                        <a href="productos_item.php?id=<?= $producto['id']; ?>" class="ver"></a>
                    <?php } else { ?>
                        <a href="productos_item.php?id=<?= $producto['id']; ?>" class="ver"></a>
                    <?php } ?>

                    <img src="assets/img/productos/<?= $producto['imagen1']; ?>" alt="">
                    <div class="name"><?= $producto['nombre']; ?></div>
                    <div class="flex">
                        <div class="price"><?= $producto['precio']; ?><span> €</span></div>
                        <div class="qty"><?= $producto['disponibilidad']; ?></div>
                    </div>
                </form>
            <?php 
                }
            }else{
                echo '<p class="empty">No se han encontrado productos!</p>';
            } ?>
            </div>
        </div>

    </main>

    <?php require 'views/footer.php'; ?>

</body>
</html>