<?php
    include 'includes/authorization.php';
    $_SESSION['email'] = "";
    $_SESSION['senha'] = "";
    $_SESSION['id_usuario'] = "";
    $_SESSION['user'] = "";
    $_SESSION['tipo'] = "";
    $_SESSION['desc'] = "";
    header('Location:index.php');
?>  