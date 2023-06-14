<?php

require_once 'conexion.php';

//El nuevo usuario se guarda si no existe en la tabla Usuarios. 
function registrarUsuario($nombre, $usuario, $clave){
    
    session_start();

    //Encriptamiento de contraseña
    $clave = hash('sha512', $clave);

    $conexion= crearConexion();
    //consulta para verificar que el usuario no se repita en la base de datos
    $verificar_usuario= mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'");
    //consulta para registrar nuevo usuario
    $query= "INSERT INTO usuarios(nombre, usuario, clave) VALUES('$nombre', '$usuario', '$clave')";

    if(mysqli_num_rows($verificar_usuario) > 0){
        header("Location: registrarse.php?error=Este usuario ya existe");     
    }else{
        //Se almacena el nuevo usuario en la base de datos
        $resultado= mysqli_query($conexion, $query);
    
        if($resultado != false){
            $id_usuario= mysqli_fetch_assoc(mysqli_query($conexion, "SELECT id FROM usuarios WHERE usuario='$usuario' and clave='$clave'"));
            $_SESSION['id'] = $id_usuario['id'];
            cerrarConexion($conexion);

            echo '<script> window.location= "index.php"; </script>';
        } else{
            header("Location: registrarse.php?error=Inténtalo de nuevo");
        }
    }
}

//Se comprueba si existe un usuario en la tabla Usuarios con dicho usuario y contraseña, si es así, se crea la sesión y se redirige al inicio para nevegar en modo 'autenticado'
//Actualmente el único usuario existente es us:joanafff / ps:112233
function loginUsuario($usuario, $clave){

    session_start();

    //Encriptamiento de contraseña
    $clave = hash('sha512', $clave);

    $conexion= crearConexion();
    $query= "SELECT * FROM usuarios WHERE usuario='$usuario' and clave='$clave'";
    $res= mysqli_query($conexion, $query);
    
    if(mysqli_num_rows($res) > 0){
        $fila= mysqli_fetch_assoc($res);
        $_SESSION['id']= $fila['id'];
        cerrarConexion($conexion);

        header("Location: index.php");

    }else{
        header("Location: registrarse.php?error= Este usuario no existe, por favor verifique los datos introducidos");
    }
}

//Para cerrar la sesión activa, se destruye la variable de sesión y se vuelve al inicio 
function cerrarSesion(){
    session_start();
    session_unset();
    session_destroy();
    header('location: index.php');
}

?>
