<?php

require_once 'models/conexion.php';

//Se realiza una consulta cruzada entre la tabla productos y la tabla milista, para obtener los detalles de los productos guardados por un usuario en concreto 
function obtenerProductosMilista(){
    $id_usuario = $_SESSION['id'];
    $conexion = crearConexion();
    $query= "SELECT p.id, p.imagen1, p.nombre, p.disponibilidad, p.precio FROM productos p INNER JOIN milista m ON p.id = m.id_producto WHERE m.id_usuario = '$id_usuario' ";
    $resultado= mysqli_query($conexion, $query);
    cerrarConexion($conexion);
    
    return $resultado;
}

//Para eliminar un producto de la lista, se elimina la fila que coincida con el id del producto y el id del usuario 
function eliminarProductoMilista($id_producto){
    $id_usuario = $_SESSION['id'];
    $conexion = crearConexion();
    mysqli_query($conexion, "DELETE FROM milista WHERE id_producto= $id_producto and id_usuario = $id_usuario");
    cerrarConexion($conexion);
    header ("Location: milista.php");
}

//Si el usuario no ha añadido el producto anteriormente, se inserta el nuevo producto en la tabla milista
function anadirProductoMilista($id_producto, $user_id){
    $conexion = crearConexion();
    $check_producto = mysqli_query($conexion, "SELECT * FROM milista WHERE id_usuario= '$user_id' and id_producto= '$id_producto'");

    if(mysqli_num_rows($check_producto) == 0){
        $query = "INSERT INTO milista (id_usuario, id_producto) VALUES ($user_id, $id_producto)";
        mysqli_query($conexion, $query);  
        cerrarConexion($conexion);
    }
}

?>

