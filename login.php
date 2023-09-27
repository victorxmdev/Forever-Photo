<?php 
	session_start();
    ob_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <?php 
			include 'includes/head.php'; 
			include 'includes/conexao.php' 
		?>
        <title>Login-- 4Ever Photo</title>
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
        <?php 
			include 'includes/menu.php'; 
		?>
        <h2 class="center white-text dinc">LOGIN</h2>
        <br>
        <div class="row container">
            <form class="col offset-s3 s6" method="POST" action="#">
                
                <div class="row">
                    <div class="center">
                        <div class="input-field col s12">
                            <input name="login_usuario" style="color:#FFF;" id="login_usuario" type="text" class="validate">
                            <label for="login_usuario">Nome de usuário ou E-Mail</label>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="input-field col s12">
                        <input name="senha_usuario" id="senha_usuario" style="color:#FFF;" type="password" class="validate">
                        <label for="senha_usuario">Senha</label>
                    </div>
                </div>
                

                <br>
                
                <div class="center">
                    <input type="submit" name="login" value="Entrar">
                    <br/>
                    <br/>   
                </div>
                <br>

                <div class="center white-text ">
                    Não é cadastrado? <a href="cadastro.php">Cadastre-se.</a>
                </div>
                <div class="center white-text ">
                    <a href="recuperarsenha.php">Esqueceu a senha?</a>
                </div>

            </form>
        </div>

        <br><br><br><br><br>
        <?php
            if (isset($_POST['login'])) {
                $user = $_POST['login_usuario'];
                $senha = sha1($_POST['senha_usuario']);
                $sql = ('select * from usuario where email_usuario="' . $user . '" or nmuser_usuario="' . $user . '" and senha_usuario = "'.$senha.'";');
                $resul = mysqli_query($conexao, $sql);
                if(mysqli_num_rows($resul)){
				
                    while($log = mysqli_fetch_array($resul)){
						$_SESSION['email'] = $log['email_usuario'];
						$_SESSION['senha'] = $senha;
						$_SESSION['id_usuario'] = $log['id_usuario'];
						$_SESSION['user'] = $log['nmuser_usuario'];
						$_SESSION['tipo'] = $log['tipo_usuario'];
						$_SESSION['desc'] = $log['desc_usuario'];
						$_SESSION['cidade'] = $log['cidade_usuario'];
						
						if($log['tipo_usuario']==1){
							header('location:./perfil_consumidor.php');
						}else if ($log['tipo_usuario']==2){ 
							
							$sql_planos = ('select * from planos where id_fotografo = '.$log['id_usuario'].';');
							$planos = mysqli_query($conexao, $sql_planos);
							if(mysqli_num_rows($planos)>0){
								header('location:./perfil_fotografo.php');
							}else{
								header('location:./planos.php');
							}
						}else if ($log['tipo_usuario']==3){
							header('location:./management.php');
						}else{
							echo ("<script>window.alert('Não há usuário cadastrado com essas características');</script>");
                        }
						echo('<script>location.reload()</script>');

                    }
			
                }else{
                    echo ("<script>window.alert('Não há usuário cadastrado com essas características');</script>");
                }
            }
        
            include 'includes/footer.php';
            include 'includes/script.php';
        ?>
    </body>

</html>
