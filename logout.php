<?php
    session_start();
    unset( $_SESSION['nombre']);
    unset( $_SESSION['email']);
    unset( $_SESSION['id_usuario'] );
    session_unset();
    session_destroy();
    header('Location: login.php');
?>