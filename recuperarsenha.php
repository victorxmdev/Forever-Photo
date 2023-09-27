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
        <?php include 'includes/menu.php'; ?>
        <h2 class="center white-text ">E-mail ou nome de usuário</h2>
        <br>
        <div class="row container">
            <form class="col offset-s3 s6" method="POST" action="recuperarsenha2.php">
                
                <div class="row">
                    <div class="center">
                        <div class="input-field col s12">
                            <input name="login_usuario" style="color:#FFF;" id="login_usuario" type="text" class="validate">
                        </div>
                    </div>
                </div>
                
                <div class="center">
                    <input type="submit" name="recuperar" value="Entrar">
                    <br/>
                    <br/>   
                </div>
                <br>

            </form>
        </div>

        <br><br><br><br><br>
        <?php include 'includes/footer.php';?>
    </body>
</html>
