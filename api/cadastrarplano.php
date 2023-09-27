<?php
    include '../includes/authorization.php';
    include '../includes/conexao.php';
    if(isset($_GET['plano'])){
        $tipo = $_GET['plano'];
            switch ($tipo){
                case 1:
                    $preco = 49.99;
                    break;
                case 2:
                    $preco = 29.99;
                    break;
                case 3:
                    $preco = 19.99;
                    break;
                case 4:
                    $preco = 9.99;
                    break;
            }
            $sql_pesquisar_plano = 'SELECT * FROM planos WHERE id_fotografo = '.$_SESSION['id_usuario'].';';
            $pesquisar_plano = mysqli_query($conexao, $sql_pesquisar_plano);
            if(mysqli_num_rows($pesquisar_plano)==0){
                $sql_plano = 'INSERT INTO planos (id_fotografo, preco_plano, tipo_plano) VALUES ('.$_SESSION['id_usuario'].',"'.$preco.'", '.$tipo.');';
                $plano = mysqli_query($conexao, $sql_plano);
                if($plano == true){
                    echo ("<script>window.alert('Aproveite nossa plataforma !!');</script>");
                    echo('<script>window.location = "../perfil_fotografo.php";</script>');
                }else{
                    echo ("<script>window.alert('Ocorreu algum erro, desculpe');</script>");
                    die;
                    echo ('<script>window.location = "../sair.php";</script>');
                }
            }else{
                $sql_plano = 'UPDATE planos SET preco_plano = "'.$preco.'", tipo_plano = "'.$tipo.'" WHERE id_fotografo = '.$_SESSION['id_usuario'].';';
                $plano = mysqli_query($conexao, $sql_plano);
                if($plano == true){
                    echo ("<script>window.alert('Aproveite nossa plataforma!!');</script>");
                    echo('<script>window.location = "../perfil_fotografo.php";</script>');
                }else{
                    echo ("<script>window.alert('Ocorreu algum erro, tente novamente.');</script>");
                    die;
                    echo ('<script>window.location = "../sair.php";</script>');
                }
            }
    }
?>