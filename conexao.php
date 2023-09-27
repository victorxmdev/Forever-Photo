<?php
	$host = 'localhost';
    $basename = 'foreverphoto';
    $user = 'root';
    $pass = '';

    $conexao = new PDO('mysql:host='.$host.';dbname='.$basename.'',$user, $pass);
?>