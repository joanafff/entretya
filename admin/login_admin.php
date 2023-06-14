<?php
    include '../models/admin.php';
    
    if (isset($_POST['entrar'])) {
        $usuario= $_POST['usuario'];
        $clave= $_POST['clave'];

        comprobarAdmin($usuario, $clave);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS propio -->
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Administrador</title>
</head>

<body id="login_admin">

        <div class="caja_mensaje">
            <?php if (isset($_GET['error'])) { 
                $mensaje= $_GET['error'];?>
                <p class="mensaje"><?php echo $mensaje; ?></p>
            <?php } ?>
        </div>

        <div class="caja_login">
            <form action="#" method="POST">
                <h1>Administrador</h1>
                <h3><i>- Área privada -</i></h3>
                <input type="text" placeholder="Usuario" name="usuario" required>
                <input type="password" placeholder="Contraseña" name="clave" required>
    
                <button type="submit" name='entrar' value="entrar">Entrar</button>
            </form>
        </div>        
       
</body>
</html>