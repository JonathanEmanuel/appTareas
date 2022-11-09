<?php
    session_start();
    if( isset( $_SESSION['email'] )  ){
        $email = $_SESSION['email'];
    } else {
        header('Location: login.php');
    }

    require_once('../conexion.php');
    /* ------ Recibo la variable por POST de la tarea y la inserto en al db ----- */

    if( isset( $_POST['tarea'])){
        $tarea = $_POST['tarea'];
        $fecha = '2022-11-08';
        $id_usuario =  $_SESSION['id_usuario'];

        $sql = "INSERT INTO tareas(descripcion, fecha, completada, id_usuario)
                VALUES('$tarea', '2022-11-08', NULL, $id_usuario)";

        mysqli_query($conexion, $sql);

        header('Location: ../tareas.php');
    }

?>