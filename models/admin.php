<?php

require_once 'conexion.php';

//Al loguearse, se verifica el usuario y contraseña del Administrador
function comprobarAdmin($usuario, $clave){
    $admin="admin";
    $pwd= "entretya2023";
    if($usuario==$admin && $clave==$pwd){
        echo "<script language='javascript'>window.location='../admin/productos.php'</script>";
    }else{
        echo "<script language='javascript'>window.location='../admin/login_admin.php?error=Usuario o contraseña incorrectos. Por favor, verifique los datos introducidos'</script>";
    }
}

//Se modifican los cambios del producto en la base de datos
function editarProducto($id, $nombre, $descripcion, $precio, $disponibilidad, $categoria){
    $conexion= crearConexion();
    $query= "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', disponibilidad='$disponibilidad', id_categoria='$categoria' WHERE id='$id' ";
    mysqli_query ($conexion, $query);
    cerrarConexion($conexion);
    echo '<script> window.location= "../admin/productos.php"; </script>';
}

//Se introduce un nuevo producto en la tabla Productos
function nuevoProducto($nombre, $descripcion, $precio, $disponibilidad, $categoria, $img1, $img2, $img3){
    $conexion= crearConexion();
    $query= "INSERT INTO productos(nombre, descripcion, precio, disponibilidad, imagen1, imagen2, imagen3,  id_categoria) VALUES ('$nombre', '$descripcion', '$precio', '$disponibilidad', '$img1', '$img2', '$img3', '$categoria')";
    $resultado = mysqli_query ($conexion, $query);
    cerrarConexion($conexion);

    return $resultado;
}

//Se almacenan las nuevas imágenes en la carpeta: /assets/img/productos
function insertarImagenes($tmpname1, $tmpname2, $tmpname3, $destino1, $destino2, $destino3){
    $img1 = move_uploaded_file($tmpname1, $destino1);
    $img2 = move_uploaded_file($tmpname2, $destino2);
    $img3 = move_uploaded_file($tmpname3, $destino3);

    if ($img1 && $img2 && $img3) {
        echo '<script> window.location= "../admin/productos.php"; </script>';
    }
}

//Se elimina el producto de la tabla Productos
function eliminarProducto($id){
    $conexion= crearConexion();
    mysqli_query($conexion, "DELETE FROM productos WHERE id = $id");
    cerrarConexion($conexion);
    echo '<script> window.location= "../admin/productos.php"; </script>';
}

?>
