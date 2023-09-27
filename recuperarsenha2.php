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
			if(isset($_POST['recuperar'])){
                $sql_verificar = 'select * from usuario where nmuser_usuario = "'.$_POST['login_usuario'].'" OR email_usuario= "'.$_POST['login_usuario'].'";';
                $verificar = mysqli_query($conexao, $sql_verificar);
                if(mysqli_num_rows($verificar)==true){
                    
        ?>
        <?php
			$sql_perguntar = 'SELECT * FROM usuario WHERE nmuser_usuario = "'.$_POST['login_usuario'].'" OR email_usuario = "'.$_POST['login_usuario'].'";';
			$perguntar = mysqli_query ($conexao, $sql_perguntar);
			$ask = mysqli_fetch_array ($perguntar);
		?>
		<h2 class="center white-text ">
			<?php
                if($ask['pergunta_usuario']==1){
					echo('Qual é o nome do seu animal de estimação?');
				}else if($ask['pergunta_usuario']==2){
					echo('Qual é sua comida preferida?');
				}else if($ask['pergunta_usuario']==3){
					echo('Qual é sua cor preferida?');
				}else if($ask['pergunta_usuario']==4){
					echo('Qual é seu filme preferido?');
				}else if($ask['pergunta_usuario']==5){
					echo('Qual é sua série preferida?');
				}else if($ask['pergunta_usuario']==0){
                    echo('<script>window.alert("Voce não cadastrou nenhuma pergunta.");</script>');
                    echo('<script>window.location = "login.php";</script>');
                } 
                                ?>    
		</h2>
        <br>
        <div class="row container">
            
            <form class="col offset-s3 s6" method="POST" action="recuperarsenha3.php">
                
                <div class="row">
                    <div class="center">
                        <div class="input-field col s12">
                            <input style="color:white;" name="login_usuario" id="login_usuario" style="color:#FFF;" type="hidden" value="<?php echo($_POST['login_usuario']);?>" readonly class="validate">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="center">
                        <div class="input-field col s12">
                            <input style="color:white;" name="resposta_usuario" id="resposta_usuario" type="text" class="validate">
                        </div>
                    </div>
                </div>
                
                <div class="center">
                    <input type="submit" name="retrieve" value="Entrar">
                    <br/>
                    <br/>   
                </div>
                <br>

            </form>
			<?php
				}else{
					echo ("<script>window.alert('Não existe usuário cadastrado com essas características');</script>");
					echo('<script>window.location = "login.php";</script>');                    
				}
            }
            ?>
        </div>

        <br><br><br><br><br>
        <?php include 'includes/footer.php' ?>
    </body>
</html>