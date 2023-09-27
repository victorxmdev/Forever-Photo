<?php 
    include 'includes/authorization.php';
    if($_SESSION['tipo']!=2) header('Location:sair.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <?php include 'includes/head.php'; include 'includes/conexao.php' ?>
        <title>Editar descrição -- 4Ever Photo</title>
        <style>
            .input-field label {
                color: white;
            }

            .input-field input[type=text]:focus+label {
                color: #000;
            }

            .input-field input[type=text]:focus {
                border-bottom: 1px solid #000;
                box-shadow: 0 1px 0 0 #000;
            }

            .center input[type=submit] {
                color: #fff;
                background: black;
                border: none;
                padding: 2%;
                border-radius: 8%;
            }

            .center input[type=submit]:hover {
                background-color: #FFCD0D;
                color: black;
                -webkit-transition: background-color 0.8s;
                -moz-transition: background-color 0.8s;
                -o-transition: background-color 0.8s;
                transition: background-color 0.8s;
            }

        </style>
    </head>

    <body class="#424242 grey darken-3">
        <?php include 'includes/menu.php'; ?>
        <h2 class="center white-text ">EDITAR DESCRIÇÃO</h2>
        <br>
        <div class="row container">
            <form class="col offset-s0 s12" method="POST" action="#">

                <div class="row">
                    <div class="center">
                        <div class="input-field col s12">
                            <input name="desc_usuario" id="desc_usuario" style="color:#FFF;" maxlenght="255" type="text" class="validate">
                            <label for="desc_usuario">Descrição (tamanho máximo 255 caracteres)</label>
                        </div>
                    </div>
                </div>

                <br>

                <div class="center">
                    <input type="submit" name="desc" value="Editar">
                    <br/>
                    <br/>
                </div>
                <br>

            </form>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>

        <?php

            if (isset($_POST['desc'])) {
                $descricao = $_POST['desc_usuario'];
                $sql_desc = ('update usuario set desc_usuario = "' . $descricao . '" where id_usuario = "' . $_SESSION['id_usuario'] . '";');
                $desc = mysqli_query($conexao, $sql_desc);
            
                
                $sql_verify = ('select * from usuario where id_usuario = "'.$_SESSION['id_usuario'].'";');
                $verify = mysqli_query($conexao, $sql_verify);
                while($verificar = mysqli_fetch_array($verify)){
                    if($verificar['desc_usuario']==$descricao){
                        $_SESSION['email'] = $verificar['email_usuario'];
                        $_SESSION['senha'] = $verificar['senha_usuario'];
                        $_SESSION['id_usuario'] = $verificar['id_usuario'];
                        $_SESSION['user'] = $verificar['nmuser_usuario'];
                        $_SESSION['tipo'] = $verificar['tipo_usuario'];
                        $_SESSION['desc'] = $verificar['desc_usuario'];
                        
                        header('Location:perfil_fotografo.php');
                    }else{
                        echo ("<script>window.alert('Ocorreu algum erro, desculpe');</script>");
                        header('Location:editardescricao.php');
                    }
                }
            }

            include 'includes/footer.php';
            include 'includes/script.php';
        ?>
    </body>

</html>
