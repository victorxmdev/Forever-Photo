<!DOCTYPE html>
<html>

    <head>
        <?php include 'includes/head.php'; include 'includes/conexao.php'; include 'includes/authorization.php'; ?>
        <title>Excluir usuário -- 4Ever Photo</title>
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
        <h2 class="center white-text ">Tem certeza? Você perde sua conta</h2>
        <br>
        <div class="row container">
            <form class="col offset-s3 s6" method="POST" action="#">

                <div class="center">
                    <input type="submit" name="voltar" value="Não">
                    <input type="submit" name="excluir" value="Sim">
                </div>
            </form>
        </div>
        <?php
            if(isset($_POST['excluir'])){
                $sql_excluir_conta = 'DELETE FROM usuario WHERE id_usuario = '.$_SESSION['id_usuario'].';';
                $sql_excluir_imagens = 'SELECT * FROM imagem WHERE id_usuario = '.$_SESSION['id_usuario'].';';
                $excluir_imagem = mysqli_query ($conexao, $sql_excluir_imagens);
                $query="delete from imagem where id_usuario = '".$_SESSION['id_usuario']."'";// com essa query excluiremos o nome do arquivo em nosso banco de dados
				
                $query2="delete from cartao where id_usuario = '".$_SESSION['id_usuario']."'";// com essa query excluiremos o cartão se houver em nosso banco de dados
                $query3="delete from denuncias where id_usuario = '".$_SESSION['id_usuario']."'";// com essa query excluiremos as denúncias se houverem em nosso banco de dados
                $query4="delete from planos where id_usuario = '".$_SESSION['id_usuario']."'";// com essa query excluiremos os planos se houverem em nosso banco de dados
                $query5="delete from usuario_imagem where id_usuario = '".$_SESSION['id_usuario']."'";// com essa query excluiremos a foto de perfil em nosso banco de dados
				/* echo $query;
				echo $query2;
				echo $query3;
				echo $query4;
				echo $query5;
				die; */
                while($deletar_imgs = mysqli_fetch_array($excluir_imagem)){
                    unlink("./imagens/".$deletar_imgs['nome_imagem']);//não basta apenas excluirmos o arquivo no banco de dados, precisamos também excluir o arquivo físico na pasta
                }
                $excluir_conta = mysqli_query ($conexao, $sql_excluir_conta);
				$exclui = mysqli_query($conexao,$query);
                $exclui2 = mysqli_query($conexao,$query2);
                $exclui3 = mysqli_query($conexao,$query3);
                $exclui4 = mysqli_query($conexao,$query4);
                $exclui5 = mysqli_query($conexao,$query5);
                $sql_excluir_mensagens = 'SELECT * FROM chat WHERE id_consumidor = '.$_SESSION['id_usuario'].' OR id_fotografo = '.$_SESSION['id_usuario'].';';//excluir as conversas que esse usuario participou
                $excluir_mensagens = mysqli_query($conexao,$sql_excluir_mensagens);
                while($deletar_msgs = mysqli_fetch_array($excluir_mensagens)) {
                    $query6 = "delete from mensagens where id_chat = '".$deletar_msgs['id_chat']."'"; //excluir as mensagens que esse usuário enviou
                    $exclui6 = mysqli_query($conexao,$query5);
                }
                if($excluir_conta == true){
                    echo('<script>window.alert("Obrigado. Quando quiser retornar, será necessário criar uma nova conta. Eternize suas memórias");</script>');
                    echo('<script>window.location="sair.php";</script>');
                }else{
                    echo('<script>window.alert("Ocorreu um erro e sua conta não pode ser excluída. Pedimos perdão pelo transtorno.");</script>');
                }
                
            }
            if(isset($_POST['voltar'])){
                if($_SESSION['tipo']==1){
                    echo('<script>window.location="perfil_consumidor.php";</script>');
                }else if($_SESSION['tipo']==2){
                    echo('<script>window.location="perfil_fotografo.php";</script>');

                }
            }

        ?>
        <br><br><br><br><br>
        <?php include 'includes/footer.php';?>
    </body>
</html>
