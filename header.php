<?php 
    include 'models/usuarios.php';

    session_start();
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
<header>
    <div class="cabecera">    
        <?php if(empty($user_id)){?>
            <div class="sesion-false">
                <a href="registrarse.php"><img src="assets/img/registrarse.png" alt="Registrarse" width="30"></a>
            </div><?php
        }else{ ?>
            <div class="sesion-true">
                <form action="" method="post">
                    <button type="submit" name="cerrar_sesion"><img src="assets/img/cerrar.png" alt="" width="25"></button>
                </form>
                <a href="milista.php"><img src="assets/img/milista.png" alt="Mi lista" width="30"></a>
            </div><?php } ?>
            
        <div class="logo">
            <img src="assets/img/marca-oscuro.png" alt="Logo" width="320px">
        </div>
    </div>

    <!-- Menú de navegación -->
    <nav>
        <ul class="menu">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="productos.php">Productos</a>
                <ul class="submenu">
                    <li><a href="productos.php?cat=1">Sacos Térmicos de Semillas</a></li>
                    <li><a href="productos.php?cat=2">Saquitos Aromáticos</a></li>
                    <li><a href="productos.php?cat=3">Jabones</a></li>
                    <li><a href="productos.php?cat=4">Cosméticos</a></li>
                </ul>
            </li>
            <li><a href="contacto.php">Contacto</a></li>
        </ul>
    </nav>
</header>