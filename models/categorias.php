<?php

require_once 'conexion.php';

//Se pinta un <option> por cada categoria de la tabla Categorias. La que corresponda a la categoria del producto, se marca como seleccionada
function optionCategoriasSelected($defecto){
    $conexion= crearConexion();
    $categorias = mysqli_query($conexion, "SELECT * FROM categorias");
    cerrarConexion($conexion);
    $cat= mysqli_fetch_array($categorias);
    foreach ($categorias as $cat) { 
        if ($cat['id'] == $defecto) {
            echo "<option value='".$cat['id']."' selected>";	
        } else {
            echo "<option value='".$cat['id']."'>";
        }
        echo $cat['categoria']."</option>";
    }
}

//Se pinta un <option> por cada categoria de la tabla Categorias
function optionCategorias(){
    $conexion= crearConexion();
    $categorias = mysqli_query($conexion, "SELECT * FROM categorias");
    cerrarConexion($conexion);
    $cat= mysqli_fetch_array($categorias);
    foreach ($categorias as $cat) { 
        echo "<option value='".$cat['id']."'>".$cat['categoria']."</option>";
    }
}

//Se devuelve la información de la categoría especificada
function obtenerCategoria($id){
    $conexion= crearConexion();
    $res = mysqli_query($conexion, "SELECT * FROM categorias WHERE id = $id");
    cerrarConexion($conexion);
    $cat= mysqli_fetch_array($res);
    return $cat;
}


?>