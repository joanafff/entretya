<?php
    include '../models/admin.php';
    include '../models/productos.php';

    if(isset($_GET['eliminar'])){
        $id = $_GET['eliminar'];
        eliminarProducto($id);
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
        <a href="../index.php">Salir</a>
        <h1>Área Privada del Administrador</h1>
    </header>

    <main id="productos">
        <div class="contenedor">
            <div class="cabecera">
                <h1>Productos</h1>
                <a href='nuevo_producto.php'>+ Nuevo</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Disponibilidad</th>
                        <th>Categoria</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $productos = obtenerProductosAdmin();
                    $fila = mysqli_fetch_array($productos);
                    foreach ($productos as $fila){ ?>
                        <tr>
                            <td><img src="../assets/img/productos/<?php echo $fila['imagen1'];?>" alt="foto1"></td>
                            <td><?php echo $fila['nombre'];?></td>
                            <td><?php echo substr($fila['descripcion'], 0, 50);?> ...</td>
                            <td><?php echo $fila['precio'];?>€</td>
                            <td><?php echo $fila['disponibilidad'];?></td>
                            <td><?php echo $fila['categoria'];?></td>
                            <td>
                                <!----- Boton Eliminar ----->
                                <form method="POST" action="productos.php?eliminar=<?php echo $fila['id']; ?>" class="eliminar">
                                    <button class="btn-delete" type="submit" name="eliminar" onclick="return confirmacion();">Eliminar</button>
                                </form><br>                          
                                <!----- Botón Editar ----->
                                <a class="btn-edit" href='editar_producto.php?editar=<?php echo $fila['id'];?>'>Editar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>    
            </table>
        </div>

        <script>
            function confirmacion(){
                var respuesta= confirm("Estás seguro que quieres eliminar este producto?");
                if(respuesta == true){
                    return true;
                }else {
                    return false;
                }
            }
        </script>
    </main>
</body>
</html>