<?php
    session_start();
    require_once('conexion.php');
    $error = false;
    // Si existe un sesion activa, vamos a la página privada
    if( isset( $_SESSION['email'] )  ){
        header('Location: privada.php');
    } 

    if(  isset( $_POST['email'] ) && isset($_POST['clave'])){
        $email = $_POST['email'];
        $clave = $_POST['clave'];
        /* ------------------------- Escribo la consulta SQL ------------------------ */
        $sql = "SELECT id_usuario, nombre, email 
                FROM usuarios
                WHERE email = '$email' AND password = '$clave'";

        /* -----------------------  Ejecuto la consulta SQL ----------------------- */
        $respuesta = mysqli_query($conexion, $sql);

        /* ------------------------ Recorro el dataset ----------------------- */
        if( $array =  mysqli_fetch_assoc( $respuesta)) {
            //echo 'Datos validos';
            $_SESSION['nombre'] = $array['nombre'];
            $_SESSION['id_usuario'] = $array['id_usuario'];
            $_SESSION['email'] = $array['email'];
                   
            //print_r($array);
            header('Location: privada.php');
        } else {
            echo 'Usuario o contaseña invalidos';
            $error = true;
        }

 
    }


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/login.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="bg-primary d-flex justify-content-center align-items-center">
        <h1 class="text-center text-white">Login</h1>
    </header>
    <main class="container">
        <div class="row mt-4">
            <div class="col-md-4"></div>
            <div class="col-md-4 card p-5">
                <h4 class="text-center">Login </h4>
                <img src="img/login.png" alt="login" class="img-fluid">

                <form action="login.php" method="post">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" class="form-control">

                    <label for="password">Contaseña</label>
                    <input name="clave" id="password" type="password" class="form-control">
                    
                    <div class="alert alert-danger mt-2 <?php if($error==false){ echo 'oculto'; } ?>" role="alert">
                        <p>Email o Contraseña invalida</p>
                    </div>
                    <button class="btn btn-primary mt-2 col-md-12" type="submit">Login</button>
                    <a href="registro.php" >Registrarme</a>
                </form>


            </div>
            <div class="col-md-4"></div>
        </div>
    </main>
</body>
</html>