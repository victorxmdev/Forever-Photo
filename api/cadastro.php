<?php
    include '../includes/conexao.php';

    function defaultUser($conexao, $id){
        $insertDefaultPic = "INSERT INTO USUARIO_IMAGEM(id_usuario, nome_imagem) values($id, 'default.png');";
        $insert = mysqli_query($conexao, $insertDefaultPic);
        return $insert;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nmuser = $_POST['nmuser_usuario'];
        $nome = $_POST['nome_usuario'];
        $sobrenome = $_POST['sobrenome_usuario'];
        $endereco = $_POST['rua_usuario'];
        $bairro = $_POST['bairro_usuario'];
        $complemento = $_POST['complemento_usuario'];
        $rua = $_POST['rua_usuario'];
        $numero = $_POST['num_casa_usuario'];
        $cidade = $_POST['cidade_usuario'];
        $estado = $_POST['uf_estado'];
        $telefone = $_POST['telefone_usuario'];
        $email = $_POST['email_usuario'];
        $senha = /*sha1*/($_POST['senha_usuario']);
        $senha2 = /*sha1*/($_POST['senha_usuario2']);
        $tipo = $_POST['tipo_usuario'];
        $cpf = $_POST['cpf_usuario'];
        
        $cpf1 = trim($cpf);
        $cpf1 = str_replace(".", "", $cpf1);
        $cpf1 = str_replace("-", "", $cpf1);
        
        $telefone1 = trim($telefone);
        $telefone1 = str_replace("(", "", $telefone1);
        $telefone1 = str_replace(")", "", $telefone1);
        $telefone1 = str_replace("-", "", $telefone1);
        
        if ($senha == $senha2) {
            //verificar 1: tipo
            $sql_verificar_email = ('select * from usuario where email_usuario="' . $email . '";');
            $resu_email = mysqli_query($conexao, $sql_verificar_email);

            //verificar 2: nmuser
            $sql_verificar_nmuser = ('select * from usuario where nmuser_usuario="' . $nmuser . '";');
            $resu_nmuser = mysqli_query($conexao, $sql_verificar_nmuser);

            if (mysqli_num_rows($resu_email) == 0 && mysqli_num_rows($resu_nmuser) == 0) {
                //verificar 3: estado
                $sql_verificar_estado = 'SELECT * from estado where uf_estado="' . $estado . '";';
                $resu_estado = mysqli_query($conexao, $sql_verificar_estado);

                while ($con = mysqli_fetch_array($resu_estado)) {
                    //verificar 4: cidade
                    $sql_verificar_cidade = ('select * from cidade where nome_cidade="' . $cidade . '" and estado_cidade=' . $con['id_estado'] . ';');
                    $resu_cidade = mysqli_query($conexao, $sql_verificar_cidade);
                    if (mysqli_num_rows($resu_cidade) != 0) {
                        $sql_cadastrar = 'INSERT INTO `usuario`(`nmuser_usuario`, `email_usuario`, `senha_usuario`, `nome_usuario`, `sobrenome_usuario`, `num_casa_usuario`, `complemento_usuario`, `bairro_usuario`, `rua_usuario`, `cidade_usuario`, `uf_usuario`, `telefone_usuario`, `tipo_usuario`, `cpf_usuario`) VALUES ("' . $nmuser . '","' . $email . '","' . $senha . '","' . $nome . '","' . $sobrenome . '","' . $numero . '","' . $complemento . '","' . $bairro . '","' . $rua . '","' . $cidade . '","' . $estado . '",' . $telefone1 . ',' . $tipo . ','.$cpf1.')';
                        if ($query = mysqli_query($conexao, $sql_cadastrar) == true) {
                            session_start();
                            $_SESSION['user']=$nmuser;
                            $imageUploaded = defaultUser($conexao, mysqli_insert_id($conexao));
                            if(!$imageUploaded){
                                echo json_encode(['register' => false, "message" => "Falha ao tentar inserir foto padrão"]);
                                die;
                            }
                            echo json_encode(["register" => true, "message" => "OK"]);
                        } else {
                            echo json_encode(["register" => false, "message" => "falha no servidor, erro=>". mysqli_error($conexao)]);
                        }
                    } else {
                        echo json_encode(["register" => false, "message" => "Cidade não encontrada, query => $sql_verificar_cidade"]);
                    }
                }
            } else {
                echo json_encode(["register" => false, "message" => "Ja existe um úsuario com este Nome de Usuário ou E-mail!"]);
            }
        } else {
            echo json_encode(["register" => false, "message" => "As duas senhas não coincidem"]);
        }
    }
?>