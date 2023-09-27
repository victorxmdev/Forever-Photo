
<!DOCTYPE html>
<html>

    <head>
        <?php include 'includes/head.php'; include 'includes/authorization.php'; include 'includes/conexao.php'; include 'includes/script.php'?>
        <title>Cadastrar Cartão de Crédito -- 4Ever Photo</title>
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
        <h2 class="center white-text ">Cadastrar cartão de crédito</h2>
        <h6 class="center white-text ">Aviso: cadastrar esse cartão apagará qualquer outro cartão cadastrado por essa conta</h6>
        <br>
        <div class="row container">
			<?php
				$sql_cartao = 'SELECT * FROM cartao WHERE id_usuario = '.$_SESSION['id_usuario'].';';
				$cartao = mysqli_query($conexao, $sql_cartao);
				$formulario = mysqli_fetch_array ($cartao);
			?>
				<form class="col offset-s3 s6" method="POST" action="#">
					<div class="input-field col s12">
						<input name="nome" style="color:#FFF;" required placeholder="Nome do Titular" value=<?php echo '"'.$formulario['nome_cartao'].'"'; ?> id="nome" type="text" class="validate">
					</div>
					<div class="input-field col s12">
						<input name="numero" style="color:#FFF;" required placeholder="Número do cartão" value=<?php echo '"'.$formulario['num_cartao'].'"'; ?> id="numero" maxlenght="16" type="text" class="validate">
					</div>
					<div class="input-field col s6">
						<input name="cvv" style="color:#FFF;" placeholder="CVV" value=<?php echo '"'.$formulario['cvv_cartao'].'"'; ?> id="cvv" maxlenght="3" type="text" class="validate">
					</div>
                    <div class="input-field col s6">
                    <input name="data_val" style="color:#FFF;" placeholder="Data de validade" id="data_val" type="text" class="validate">
                    </div>
                    <div class="center">
						<input type="submit" name="cartao" value="Enviar">
						<br/>
						<br/>   
					</div>
				</form>
				<?php
                $plano = $_GET['plano'];
                if(isset($_POST['cartao'])){
                    $sql_verificar_cartao = 'SELECT * FROM cartao WHERE id_usuario = '.$_SESSION['id_usuario'].';';
                    $verificar_cartao = mysqli_query($conexao, $sql_verificar_cartao);
                    
                    if (mysqli_num_rows ($verificar_cartao)==0) {
                        $numero=$_POST['numero'];
                        $numero = trim($numero);
                        $numero = str_replace(".", "", $numero);
                        
                        $data_val=$_POST['data_val'];
                        $data_val = trim($data_val);
                        $data_val = str_replace("/", "", $data_val);
                    
                        $sql_cadastrar_cartao = 'INSERT INTO cartao (id_usuario, nome_cartao, cvv_cartao, num_cartao, data_val) VALUES ('.$_SESSION['id_usuario'].', "'.$_POST['nome'].'", "'.$_POST['cvv'].'", "'.$numero.'", "'.$data_val.'")';
                    
                    }else{
                        $numero=$_POST['numero'];
                        $numero = trim($numero);
                        $numero = str_replace(".", "", $numero);
                        
                        $data_val=$_POST['data_val'];
                        $data_val = trim($data_val);
                        $data_val = str_replace("/", "", $data_val);
                        
                        $sql_cadastrar_cartao = 'UPDATE cartao SET nome_cartao = "'.$_POST['nome'].'", cvv_cartao = "'.$_POST['cvv'].'", num_cartao = "'.$numero.'", data_val= "'.$data_val.'" WHERE id_usuario = '.$_SESSION['id_usuario'].';';
                        
                    }  
                    $cadastrar_cartao = mysqli_query($conexao, $sql_cadastrar_cartao);
                    if ($cadastrar_cartao==true) echo ('<script>window.location = "./api/cadastrarplano.php?plano='.$plano.'";</script>');
                    if ($cadastrar_cartao==false) echo ('<script>window.alert ("Desculpe, ocorreu algo errado. Tente novamente mais tarde.");</script>');
                }
            ?>
        </div>
        
        <br><br><br><br><br>
        <script>
            $(document).ready(function(){
                $("#numero").mask("0000.0000.0000.0000")
                $("#cvv").mask("000")
                $("#data_val").mask("00/00")
            })
        </script>
    </body>
</html>