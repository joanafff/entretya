<!-- Controladores para llamar a funciones del modelo Usuarios -->
<?php 
require_once 'models/usuarios.php';

if (isset($_POST['entrar'])){
    loginUsuario($_POST['usuario'], $_POST['clave']);
}

if (isset($_POST['registrar'])){ 
    registrarUsuario($_POST['nombre'], $_POST['usuario'], $_POST['clave']);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <!-- Para importar fuente de google fonts: -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- CSS propio --> 
    <link rel="stylesheet" href="assets/css/registrarse.css">

</head>
<body>
        <main>
            <!--Cajas traseras de Login y registro-->
            
            <div class="contenedor_todo">
                
                <div class="caja_trasera">
                    <div class="caja_trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn_iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja_trasera-registro">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn_registrarse">Registrarse</button>
                    </div>
                </div>


                <!--Formulario de Login y registro-->
            
                <div class="contenedor_login-registro">
                    
                    <!--Login-->
                    <form action="" method="POST" class="formulario_login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Usuario" name="usuario">
                        <input type="password" placeholder="Contraseña" name="clave">
                        <button type="submit" name="entrar">Entrar</button>
                    </form>

                    <!--Registro-->
                    <form action="" method="POST" class="formulario_registro">
                        <h2>Registrarse</h2>
                        <input type="text" placeholder="Nombre completo" name="nombre" required>
                        <input type="text" placeholder="Usuario" name="usuario" required>
                        <input type="password" placeholder="Contraseña" name="clave" required>
                        <button type="submit" name="registrar">Registrarse</button>
                    </form>

                </div>
            </div>

            <div class="caja_mensaje">
                        <?php if (isset($_GET['error'])) { 
                            $mensaje= $_GET['error'];?>
     		                <p class="mensaje"><?php echo $mensaje; ?></h1>
                        <?php } ?>
            </div>

        </main>
        
        <div class="links">
            <a class="link-home" href="index.php">Volver</a>
            <!--Para acceder al área del administrador-->
            <a class="link-admin" href="admin/login_admin.php">Administrar este sitio</a>
        </div>
        

        <script src="assets/js/registrarse.js"></script>
</body>
</html>