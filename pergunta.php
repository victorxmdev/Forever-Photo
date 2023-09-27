
<!DOCTYPE html>
<html>

    <head>
        <?php session_start(); include 'includes/head.php'; include 'includes/conexao.php'; ?>
        <title>Pergunta de Recuperação-- 4Ever Photo</title>
        <style>
            .input-field label {
                color: white;
            }
            
            .input-field input[type=text]:focus + label {
                color: #000;
            }
            
            .input-field input[type=text]:focus {
                border-bottom: 1px solid #000;
                box-shadow: 0 1px 0 0 #000;
            }

            .choose {
                color: #FFF!important;
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

            .input-field select {
                background-color: #212121;
                color: white;
                border: none;
            }

            .input-field select:hover {
                background-color: #212121;
                color: white;
                border: none;
            }

            .input-field option {
                background-color: white;
                color: black;
            }

            .white-text select{
                background-color: #212121;
                color: white;
                border: none;
            }

            .white-text select:hover {
                background-color: #212121;
                color: white;
                border: none;
            }
            .white-text option {
                background-color: white;
                color: black;
            }

        </style>

    </head>
    
    <body class="#424242 grey darken-3">
        <?php include 'includes/menu.php'; ?>
        <h2 class="center white-text ">Pergunta de recuperação opcional</h2>
        <br>
        <div class="row container">
            <form class="col offset-s3 s6" method="POST" action="#">
                <div class="row white-text">
                    <select name="pergunta_usuario" class="browser-default" name="pergunta" id="pergunta">
                        <option value="0"></option>
                        <option value="1">Qual é o nome do seu animal de estimação?</option>
                        <option value="2">Qual é sua comida preferida?</option>
                        <option value="3">Qual é sua cor preferida?</option>
                        <option value="4">Qual é seu filme preferido?</option>
                        <option value="5">Qual é sua série preferida?</option>
                    </select>
                </div>
                <div class="input-field col s12">
                    <input name="resposta_usuario" style="color:#FFF;" id="resposta_usuario" type="text" class="validate">
                </div>
                <div class="center">
                    <input type="submit" name="pergunta" value="Enviar">
                    <br/>
                    <br/>   
                </div>
            </form>
            <?php
                if(isset($_POST['pergunta'])){
                    $sql_pergunta = ('UPDATE usuario SET pergunta_usuario = '.$_POST['pergunta_usuario'].', resposta_usuario = "'.$_POST['resposta_usuario'].'" WHERE nmuser_usuario = "'.$_SESSION['user'].'";');
                    $_SESSION['user']="";
                    $pergunta = mysqli_query($conexao, $sql_pergunta);
                    if($pergunta == true) {
                        echo ("<script>window.alert('Cadastrado com sucesso!');</script>");
                        echo('<script>window.location = "login.php";</script>');
                    }else{
                        echo ("<script>window.alert('Ocorreu algum erro, desculpe');</script>");
                        echo('<script>window.location = "pergunta.php";</script>');
                    }
                }
            ?>
        </div>

        <br><br><br><br><br>
    </body>
</html>