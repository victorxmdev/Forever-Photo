<?php
    include 'conexao.php';
    session_start();
    $sqlVerificar = "SELECT id_usuario FROM usuario where id_usuario =" . $_SESSION['id_usuario'] . " AND email_usuario ='" . $_SESSION['email'] . "' AND senha_usuario ='" . $_SESSION['senha'] ."';";
    $verificar = mysqli_query($conexao, $sqlVerificar);
    if(mysqli_num_rows($verificar) == 0){
        header('Location: sair.php');
    }
?>