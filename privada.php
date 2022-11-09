<?php
    session_start();

    if( isset( $_SESSION['email'] )  ){
        $email = $_SESSION['email'];
    } else {
        header('Location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Página Privada</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/login.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="bg-primary d-flex justify-content-center align-items-center">
        <h1 class="text-center text-white">Página Privada</h1>
    </header>
    <main class="container">
        
        <h2 class="text-center text-success"> Bienvenido <?php echo $email; ?></h2>
        <h4> El id del usuario es <?php echo $_SESSION['id_usuario']; ?></h4>
        
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <a href="tareas.php" class="btn btn-success"> Ir tareas</a>
                <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
            </div>
            <div class="col"></div>
        </div>
    </main>
</body>
</html>