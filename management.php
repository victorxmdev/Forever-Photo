<!DOCTYPE html>
<html>
    <head>
        <?php include 'includes/head.php'; include('includes/conexao.php'); include 'includes/authorization.php';?>
        <link href="css/table.css" type="text/css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>4Ever Photo</title>
        
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
        <br/><br/>
        <font color="white" >
            <h2 style="text-align: center; width: 100%;">    
                Usuários
            </h2>
        </font>
        

        <br/><br/>
        <div class="container">
            <form method="POST" action="#" class="col 12">
                <div class="row">
                    <div class="center">
                        <div class="input-field col s12">
                            <input name="nmuser" id="nmuser" style="color:#FFF;" maxlenght="255" placeholder="Pesquisar Usuário" type="text" class="validate">
                        </div>
                    </div>
                </div>

                <br>

                <div class="center">
                    <input type="submit" name="pesquisar" value="Pesquisar">
                    <input type="submit" name="voltar" value="Voltar">
                    <br/>
                    <br/>
                </div>                
            </form>
            <div class="card-panel teal #ffca28 amber lighten-1 z-depth-5"><h6>
                <?php
                    $select = "SELECT * FROM usuario WHERE tipo_usuario<>3 ORDER BY id_usuario";
                    
                    if(isset($_POST['pesquisar'])) $select = "SELECT * FROM usuario WHERE tipo_usuario<>3 AND nmuser_usuario = '".$_POST['nmuser']."' ORDER BY id_usuario";
                    if(isset($_POST['voltar'])) $select = "SELECT * FROM usuario WHERE tipo_usuario<>3 ORDER BY id_usuario";
                    $rs = mysqli_query($conexao, $select);
                    //Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($rs)

                    echo ('<table><tr><td>Nick do Usuário</td><td>E-mail do Usuário</td><td>Tipo do Usuário</td><td>Banir Usuário</td></tr>');

                    //Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while
                    while ($row=mysqli_fetch_array($rs)){
                        $nick = $row['nmuser_usuario'];
                        $email = $row['email_usuario'];
                        $tipo = $row['tipo_usuario'];
                        $id = $row['id_usuario'];
                        $tipo1='';
                        if($tipo=='1'){
                            $tipo1='Consumidor';
                        }
                        else{
                            $tipo1='Fotógrafo';
                        }

                    //Escreve cada linha da tabela
                    echo '<tr><td>'. utf8_encode($nick) . '</td><td>' . utf8_encode($email) . '</td><td>' . $tipo1 . '</td>';
                            
					echo('<td><a href="management.php?ex='.$id.'">Excluir Usuário</a></td></tr>');
                                           
                    }/*Fim do while*/

                    echo ('</table>'); /*fecha a tabela apos termino de impressão das linhas*/
					
					 if(isset($_GET['ex'])){
                        $ex=$_GET['ex'];
						$sql_excluir_conta = 'DELETE FROM usuario WHERE id_usuario = '.$ex.';';
						$sql_excluir_imagens = 'SELECT * FROM imagem WHERE id_usuario = '.$ex.';';
						$excluir_imagem = mysqli_query ($conexao, $sql_excluir_imagens);
						$query="delete from imagem where id_usuario = '".$ex."'";// com essa query excluiremos o nome do arquivo em nosso banco de dados
						
						$query2="delete from cartao where id_usuario = '".$ex."'";// com essa query excluiremos o cartão se houver em nosso banco de dados
						$query3="delete from denuncias where id_usuario = '".$ex."'";// com essa query excluiremos as denúncias se houverem em nosso banco de dados
						$query4="delete from planos where id_usuario = '".$ex."'";// com essa query excluiremos os planos se houverem em nosso banco de dados
						$query5="delete from usuario_imagem where id_usuario = '".$ex."'";// com essa query excluiremos a foto de perfil em nosso banco de dados
						while($deletar_imgs = mysqli_fetch_array($excluir_imagem)){
							unlink("./imagens/".$deletar_imgs['nome_imagem']);//não basta apenas excluirmos o arquivo no banco de dados, precisamos também excluir o arquivo físico na pasta
						}
						$excluir_conta = mysqli_query ($conexao, $sql_excluir_conta);
						$exclui = mysqli_query($conexao,$query);
						$exclui2 = mysqli_query($conexao,$query2);
						$exclui3 = mysqli_query($conexao,$query3);
						$exclui4 = mysqli_query($conexao,$query4);
						$exclui5 = mysqli_query($conexao,$query5);
						$sql_excluir_mensagens = 'SELECT * FROM chat WHERE id_consumidor = '.$ex.' OR id_fotografo = '.$ex.';';//selecionar as conversas que esse usuario participou
						$excluir_mensagens = mysqli_query($conexao,$sql_excluir_mensagens);
						while($deletar_msgs = mysqli_fetch_array($excluir_mensagens)) {
							$query6 = "delete from mensagens where id_chat = '".$deletar_msgs['id_chat']."'"; //excluir as mensagens que esse usuário enviou
							$exclui6 = mysqli_query($conexao,$query5);
						}
						if($excluir_conta == true){
							echo('<script>window.alert("Usuário excluído com sucesso");</script>');
							echo('<script>window.location="management.php";</script>');
						}else{
							echo('<script>window.alert("Ocorreu um erro e a conta não pode ser excluída. Pedimos perdão pelo transtorno.");</script>');
						}
					 }
                ?>
                </h6>
            </div>
        </div>
    </body>
</html>