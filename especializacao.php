
<!DOCTYPE html>
<html>

    <head>
        <?php include 'includes/authorization.php'; include 'includes/head.php'; include 'includes/conexao.php'; ?>
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
                padding: 1%;
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
        <h2 class="center white-text ">Especialização</h2>
        <br>
        <div class="row container">
            <form class="col offset-s3 s6" method="POST" action="#">
                <div class="row white-text">
                    <select name="especializacao_usuario" class="browser-default" name="especializacao" id="especializacao">
                        <option value="1">Retratos</option>
                        <option value="2">Comidas</option>
                        <option value="3">Animais</option>
                        <option value="4">Paisagens</option>
                        <option value="5">Eventos</option>
                    </select>
                </div>
                <div class="center">
                    <input type="submit" name="espec" value="Enviar">
                    <br/>
                    <br/>   
                </div>
            </form>
            <?php
                if(isset($_POST['espec'])){
                    $sql_espec = ('UPDATE usuario SET especializacao_usuario = '.$_POST['especializacao_usuario'].' WHERE nmuser_usuario = "'.$_SESSION['user'].'";');
                    $pergunta = mysqli_query($conexao, $sql_pergunta);
                    if($pergunta == true) {
                        echo ("<script>window.alert('Cadastrado com sucesso!');</script>");
                        echo('<script>window.location = "planos.php";</script>');
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