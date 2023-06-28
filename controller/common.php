<?php 
    session_start();
    //require_once 'models/usuarios.php';

    //Para cerrar la sesión activa, se destruye la variable de sesión y se vuelve al inicio 
    function cerrarSesion(){
        //session_start();
        session_unset();
        session_destroy();
        redirigir("index.php");
    }

    function redirigir ($url){
        log_debug("_SESSION values (at models/usuarios.php)");
        foreach ($_SESSION as $key => $value) {
            log_debug("_SESSION " . $key . ": " . $value);
        }
    
        //echo ("<script language='javascript'>window.location='" . $url . "'</script>");
        header("Location: " . $url);
        exit();
    }
    
    function log_debug ($msg){
        //echo ("<script language='javascript'>console.log($msg);</script>");
    }
    
	log_debug("_SESSION values (at header.php)");
	foreach ($_SESSION as $key => $value) {
        log_debug ("_SESSION " . $key . ":" . $value);
    }

    //Para comprobar si existe sesión activa
    if(isset($_SESSION['id'])){
        $user_id = $_SESSION['id'];
    }else{
        $user_id = '';
    };

    //Para cerrar la sesion
    if (isset($_POST['cerrar_sesion'])){
        cerrarSesion();
     }
?>