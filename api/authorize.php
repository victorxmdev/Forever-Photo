<?php
    session_start();
    function isUserAuthorize(){
        if (empty($_SESSION["id_usuario"])) {
            http_response_code(401);
            echo json_encode(["message" => "ID do usuário não encontrado"]);
            die;
        }

        if (empty($_SESSION['senha'])) {
            http_response_code(401);
            echo json_encode(["message" => "Senha inválida, por favor refaça seu login"]);
            die;
        }

        if (empty($_SESSION['user'])) {
            http_response_code(401);
            echo json_encode(["message" => "Usuário invalido, por favor refaça seu login"]);
            die;
        }

        if (empty($_SESSION['email'])) {
            http_response_code(401);
            echo json_encode(["message" => "Usuário invalido, por favor refaça seu login"]);
            die;
        }
    }
?>