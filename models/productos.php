<?php

require_once 'conexion.php';

//Para obtener el producto a mostrar
function obtenerItem($id){
    $conexion= crearConexion();
    $query= "SELECT * FROM productos WHERE id= $id";
    $resultado = mysqli_query ($conexion, $query);
    cerrarConexion($conexion);
    $item = mysqli_fetch_array($resultado);
    return $item;
}

//Para obtener una lista con todos los productos existentes. Cruzado con la tabla Categorias para obtener el nombre de la categoria.
function obtenerProductosAdmin(){
    $query= "SELECT p.id, p.nombre, p.descripcion, p.precio, p.disponibilidad, p.imagen1, c.categoria as categoria FROM productos p INNER JOIN categorias c ON c.id= p.id_categoria ORDER BY c.categoria ASC";
    $conexion= crearConexion();
    $resultado = mysqli_query($conexion, $query);
    cerrarConexion($conexion);
    return $resultado;
}

//Se devuelve una lista con todos los productos existentes, en el orden especificado
function obtenerTodosProductos($orden){
    $query="SELECT * FROM productos ORDER BY $orden"; 
    $conexion= crearConexion();
    $productos= mysqli_query($conexion, $query);
    cerrarConexion($conexion);
    return $productos;
}

//Se devuelve una lista con todos los productos de una categoria en concreto, y en un orden especifico
function obtenerCatProductos($categoria, $orden){
    $query="SELECT * FROM productos WHERE id_categoria = $categoria ORDER BY $orden"; 
    $conexion= crearConexion();
    $productos= mysqli_query($conexion, $query);
    cerrarConexion($conexion);
    return $productos;
}

//Se devuelven todos los productos que contengan los caracteres especificados
function buscarProducto($nombre){
    $query="SELECT * FROM productos WHERE nombre LIKE '%$nombre%'";
    $conexion= crearConexion();
    $productos= mysqli_query($conexion, $query);
    cerrarConexion($conexion);
    return $productos;
}

?>