<!DOCTYPE html>
<html>

    <head>
        <?php include 'includes/head.php'; include 'includes/conexao.php' ?>
        <title>Recuperar Senha-- 4Ever Photo</title>
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
        <?php include 'includes/menu.php'; 
            if(isset($_POST['retrieve'])){
                $sql_verificar = 'select * from usuario where nmuser_usuario = "'.$_POST['login_usuario'].'";';
                $verificar = mysqli_query($conexao, $sql_verificar);
                while($verificacao = mysqli_fetch_array($verificar)){
                    if($verificacao['resposta_usuario'] == $_POST['resposta_usuario']){
                        
                    
        
        ?>
        <h2 class="center white-text ">Senha Nova</h2>
        <br>
        <div class="row container">
            <form class="col offset-s3 s6" method="POST" action="#">
                <div class="row">
                    <div class="center">
                        <div class="input-field col s12">
                            <input name="login_usuario" id="login_usuario" type="hidden" value="<?php echo($_POST['login_usuario']);?>" readonly class="validate">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="center">
                        <div class="input-field col s12">
                            <input name="senha_usuario" style="color:#FFF;" id="senha_usuario" type="password" class="validate">
                        </div>
                    </div>
                </div>
                <div class="center">
                    <input type="submit" name="newpassword" value="Entrar">
                    <br/>
                    <br/>   
                </div>
            </form>
            <?php
                    }else{
                        echo ("<script>window.alert('Responda a pergunta corretamente.');</script>");
                        echo('<script>window.location = "login.php";</script>');
                    }
                }
            }
                if(isset($_POST['newpassword'])){
                    $sql_newpassword = 'UPDATE usuario SET senha_usuario = "'.sha1($_POST['senha_usuario']).'" WHERE nmuser_usuario = "'.$_POST['login_usuario'].'" OR email_usuario="'.$_POST['login_usuario'].'";';
                    $newpassword = mysqli_query($conexao, $sql_newpassword);
                    if($newpassword == true) {
                        echo ("<script>window.alert('Sua senha foi resetada com sucesso!');</script>");
                        echo('<script>window.location = "login.php";</script>');
                    }else{
                        echo ("<script>window.alert('Ocorreu algum erro, desculpe');</script>");
                        echo('<script>window.location = "recuperarsenha.php";</script>');
                    }
                }
            
            ?>
        </div>

        <br><br><br><br><br>
        <?php include 'includes/footer.php' ?>
    </body>
</html>