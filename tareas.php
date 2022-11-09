<?php
    session_start();

    if( isset( $_SESSION['email'] )  ){
        $email = $_SESSION['email'];
    } else {
        header('Location: login.php');
    }
    require_once('conexion.php');

    $id_usuario = $_SESSION['id_usuario'];

    $sql = "SELECT id_tarea, descripcion, fecha 
            FROM tareas
            WHERE id_usuario = $id_usuario";

    $respuesta = mysqli_query($conexion, $sql);

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
        <h1 class="text-center text-white">Crear tarea</h1>
    </header>
    <main class="container">
        <div class="row mt-4">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <ol class="list-group list-group-numbered mt-1">

                    <?php
                        while( $array =  mysqli_fetch_assoc( $respuesta) ) {
                            print_r($array);
                        }
                    ?>                    

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Subheading</div>
                        Content for list item
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
 
                    </ol>
            </div>
            <div class="col-md-4 card p-5">
                <h4 class="text-center">Crear tarea </h4>

                <form action="function/tareaCrear.php" method="post">
                    <label for="tarea">tarea</label>
                    <textarea name="tarea" id="tarea" cols="30" rows="8" class="form-control"></textarea>
                    <button class="btn btn-primary mt-2 col-md-12" type="submit">Crear</button>
                </form>


            </div>
            <div class="col-md-2">
            <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>

            </div>
        </div>
    </main>
</body>
</html>