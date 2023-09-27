<?php
    include '../includes/conexao.php';
    include '../includes/authorization.php';

    function defaultUser($conexao, $id){
        $insertDefaultPic = "INSERT INTO USUARIO_IMAGEM(id_usuario, nome_imagem) values($id, 'default.png');";
        $insert = mysqli_query($conexao, $insertDefaultPic);
        return $insert;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $bairro = $_POST['bairro_usuario'];
        $complemento = $_POST['complemento_usuario'];
        $rua = $_POST['rua_usuario'];
        $numero = $_POST['num_casa_usuario'];
        $cidade = $_POST['cidade_usuario'];
        $estado = $_POST['uf_estado'];
        $telefone = $_POST['telefone_usuario'];
        $senha = sha1($_POST['senha_usuario']);
        $senha2 = sha1($_POST['senha_usuario2']);
        $pergunta = $_POST['pergunta_usuario'];
        $resposta = $_POST['resposta_usuario'];
        if($_SESSION['tipo'] == 2) $especializacao = $_POST['especializacao_usuario'];
        if ($senha == $senha2) {
            if($_SESSION['tipo'] == 2) $sql_editar = 'UPDATE usuario SET rua_usuario = "'.$rua.'", bairro_usuario = "'.$bairro.'", complemento_usuario = "'.$complemento.'", num_casa_usuario = "'.$numero.'", cidade_usuario = "'.$cidade.'", uf_usuario = "'.$estado.'", telefone_usuario = "'.$telefone.'", senha_usuario = "'.$senha.'", especializacao_usuario = "'.$especializacao.'" WHERE id_usuario = '.$_SESSION['id_usuario'].';';
            if($_SESSION['tipo'] == 1) $sql_editar = 'UPDATE usuario SET rua_usuario = "'.$rua.'", bairro_usuario = "'.$bairro.'", complemento_usuario = "'.$complemento.'", num_casa_usuario = "'.$numero.'", cidade_usuario = "'.$cidade.'", uf_usuario = "'.$estado.'", telefone_usuario = "'.$telefone.'", senha_usuario = "'.$senha.'", pergunta_usuario = "'.$pergunta.'", resposta_usuario = "'.$resposta.'" WHERE id_usuario = '.$_SESSION['id_usuario'].';';
            if ($query = mysqli_query($conexao, $sql_editar) == true) {
                $_SESSION['email'] = $_SESSION['email'];
                $_SESSION['senha'] = $senha;
                $_SESSION['id_usuario'] = $_SESSION['id_usuario'];
                $_SESSION['user'] = $_SESSION['user'];
                $_SESSION['tipo'] = $_SESSION['tipo'];
                $_SESSION['desc'] = $_SESSION['desc'];                
                echo true;
            } else {
                echo false;
            }
        } else {
            echo false;
        }
    }
?>