<?php
    include '../models/admin.php'; 
    include '../models/productos.php';
    include '../models/categorias.php';

    if(isset($_POST["guardarCambios"])){
        //se recogen los datos introducidos por el usuario
        $nombre = $_POST['nombre'];
        $descripcion = nl2br($_POST['descripcion']); 
        $precio = $_POST['precio'];
        $disponibilidad = $_POST['disponibilidad'];
        $categoria = $_POST['categoria'];

        //para la subida de imágenes:
        $img1 = $_FILES['imagen1']['name'];
        $tmpname1 = $_FILES['imagen1']['tmp_name'];
        $destino1 = "../assets/img/productos/" . $img1;
        //------
        $img2 = $_FILES['imagen2']['name'];
        $tmpname2 = $_FILES['imagen2']['tmp_name'];
        $destino2 = "../assets/img/productos/" . $img2;
        //-------
        $img3 = $_FILES['imagen3']['name'];
        $tmpname3 = $_FILES['imagen3']['tmp_name'];
        $destino3 = "../assets/img/productos/" . $img3;

        //se añade el nuevo producto a la base de datos
        $resultado = nuevoProducto($nombre, $descripcion, $precio, $disponibilidad, $categoria, $img1, $img2, $img3);
        
        //si se ha añadido el nuevo producto, las nuevas imagenes se almacenan en la carpeta
        if($resultado){ 
           if(insertarImagenes($tmpname1, $tmpname2, $tmpname3, $destino1, $destino2, $destino3)){
                echo '<script> window.location= "productos.php"; </script>';
           }
        }
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
            <h1>Nuevo Producto</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="nombre">Nombre</label>
                    <input id="nombre" type="text" name="nombre" placeholder="Nombre" required>
                </div>

                <div>
                    <label for="disponibilidad">Disponibilidad</label>
                    <input id="disponibilidad" type="text" name="disponibilidad" placeholder="Disponibilidad" required>
                </div>

                <div>
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="6" required></textarea>
                </div>  

                <div>
                    <label for="precio">Precio</label>
                    <input id="precio" type="number" step="0.01" name="precio" placeholder="Precio" required>
                </div>
          
                <div>
                    <label for="categoria">Categoria</label>
                    <select id="categoria" name="categoria" required>
                        <?php optionCategorias()?>
                    </select>
                </div>
            
                <div>
                    <p>- Introduce 3 imágenes -</p>
                    <label for="imagen1">Imagen Principal: </label>
                    <input type="file" name="imagen1" required>
                    <label for="imagen2">Imagen 2: </label>
                    <input type="file" name="imagen2" required>
                    <label for="imagen3">Imagen 3: </label>
                    <input type="file" name="imagen3" required>
                </div>

                <button name="guardarCambios" type="submit">Registrar</button>
            </form> 
        </div>
    </main>

</body>
</html>