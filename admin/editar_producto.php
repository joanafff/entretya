<?php 
    include '../models/admin.php'; 
    include '../models/productos.php';
    include '../models/categorias.php';

    if(isset($_GET['editar'])){
        $id_producto= $_GET["editar"];
        $producto = obtenerItem($id_producto);
    }

    if(isset($_POST["guardarCambios"])){
        $nombre = $_POST['nombre'];
        $descripcion = nl2br($_POST['descripcion']);
        $precio = $_POST['precio'];
        $disponibilidad = $_POST['disponibilidad'];
        $categoria = $_POST['categoria'];
        
        editarProducto($id_producto, $nombre, $descripcion, $precio, $disponibilidad, $categoria);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/admin.css">
    <link rel="shortcut icon" href="../assets/img/marca-shortcut.png">
    <title>Área privada</title>
</head>

<body id="area_admin">

    <header>
        <a href="productos.php">Volver</a>
        <h1>Área Privada del Administrador</h1>
    </header>

    <main id="edit_new">
        <div class="cont_2">
            <h1>Editar Producto</h1>
            <form action="" method="POST">
                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" name="nombre" value="<?php echo $producto["nombre"];?>" required>
            
                <label for="disponibilidad">Disponibilidad</label>
                <input id="disponibilidad" type="text" name="disponibilidad" value="<?php echo $producto["disponibilidad"];?>" required>

                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="6" required><?php echo  str_replace("<br />","", $producto["descripcion"]);?></textarea>
            
                <label for="precio">Precio</label>
                <input id="precio" type="number" step="0.01" name="precio" value="<?php echo $producto["precio"];?>" required>
          
                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria" required>
                    <?php optionCategoriasSelected($producto['id_categoria']); ?>
                </select>
        
                <button id="guardarCambios" name="guardarCambios" type="submit">Guardar Cambios</button>
            </form> 

            <?php
                if(isset($_POST["guardarCambios"])){
                    $nombre = $_POST['nombre'];
                    $descripcion = nl2br($_POST['descripcion']); 
                    $precio = $_POST['precio'];
                    $disponibilidad = $_POST['disponibilidad'];
                    $categoria = $_POST['categoria'];
                    
                    editarProducto($id_producto, $nombre, $descripcion, $precio, $disponibilidad, $categoria);
                }
            ?>
        
        </div>
    </main>

    
</body>
</html>