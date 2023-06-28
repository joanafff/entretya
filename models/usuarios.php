<?php

require_once 'conexion.php';

//El nuevo usuario se guarda si no existe en la tabla Usuarios. 
function registrarUsuario($nombre, $usuario, $clave){
    //Encriptamiento de contraseña
    $clave = hash('sha512', $clave);

    $conexion= crearConexion();
    //consulta para verificar que el usuario no se repita en la base de datos
    $verificar_usuario= mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'");
    //consulta para registrar nuevo usuario
    $query= "INSERT INTO usuarios(nombre, usuario, clave) VALUES('$nombre', '$usuario', '$clave')";

    if(mysqli_num_rows($verificar_usuario) > 0){
        redirigir("registrarse.php?error=Este+usuario+ya+existe");    
    }else{
        //Se almacena el nuevo usuario en la base de datos
        $resultado= mysqli_query($conexion, $query);
    
        if($resultado != false){
            $id_usuario= mysqli_fetch_assoc(mysqli_query($conexion, "SELECT id FROM usuarios WHERE usuario='$usuario' and clave='$clave'"));
            $_SESSION['id'] = $id_usuario['id'];
            cerrarConexion($conexion);

            redirigir("index.php");
        } else{
            redirigir("registrarse.php?error=Inténtalo+de+nuevo");
        }
    }
}

//Se comprueba si existe un usuario en la tabla Usuarios con dicho usuario y contraseña, si es así, se crea la sesión y se redirige al inicio para nevegar en modo 'autenticado'
function loginUsuario($usuario, $clave){
    //Encriptamiento de contraseña
    $clave = hash('sha512', $clave);

    $conexion= crearConexion();
    $query= "SELECT * FROM usuarios WHERE usuario='$usuario' and clave='$clave'";
    $res= mysqli_query($conexion, $query);
    
    if(mysqli_num_rows($res) > 0){
        $fila= mysqli_fetch_assoc($res);
        log_debug("id usuari: " . $fila['id']);
        $_SESSION['id']= $fila['id'];
        cerrarConexion($conexion);

        redirigir("index.php");
    }else{
        redirigir("registrarse.php?error=Este+usuario+no+existe,+por+favor+verifique+los+datos+introducidos");
    }
}

?>