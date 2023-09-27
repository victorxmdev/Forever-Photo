<?php
    if(!isset($_GET['id'])){
        header('Location:sair.php');
    }
    date_default_timezone_set('America/Sao_Paulo');
	$data = date('Y-m-d');
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html>

    <head>
        <?php include 'includes/head.php'; include 'includes/conexao.php'; include 'includes/authorization.php'; ?>
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
        <?php include 'includes/menu.php'; ?>
        <h2 class="center white-text ">Denunciar usuário</h2>
        <br>
        <div class="row container">
            <form class="col offset-s3 s6" method="POST" action="#">
                
                <div class="row">
                    <div class="center">
                        <div class="input-field col s12">
                            <input name="denuncia" style="color:white;" id="denuncia" type="text" required class="validate"/>
                        </div>
                    </div>
                </div>
                
                <div class="center">
                    <input type="submit" name="denunciar" value="Entrar">
                    <br/>
                    <br/>
                </div>
                <br>

            </form>
            <?php
                if(isset($_POST['denunciar'])){
                    $sql_denuncia = ('INSERT INTO denuncias (data_denuncia, texto_denuncia, id_usuario) VALUES ("'.$data.'", "'.$_POST['denuncia'].'", '.$id.');');
                    $denuncia = mysqli_query($conexao, $sql_denuncia);
                    if($denuncia == true) {
                        echo ("<script>window.alert('Pedimos perdão pelo transtorno e garantimos que seu problema logo será resolvido');</script>");
                        if($_SESSION['tipo']==1) echo('<script>window.location = "perfil_consumidor.php";</script>');
                        if($_SESSION['tipo']==2) echo('<script>window.location = "perfil_fotografo.php";</script>');
                    }else{
                        echo ("<script>window.alert('Ocorreu algum erro, desculpe');</script>");
                        echo('<script>window.location = "pergunta.php";</script>');
                    }
                }
            ?>
        </div>

        <br><br><br><br><br>
        <?php include 'includes/footer.php';
        ?>
    </body>
</html>
