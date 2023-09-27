<!DOCTYPE html>
<html>
    <head>
        <?php include 'includes/head.php'; include('includes/conexao.php'); include 'includes/authorization.php';?>
        <link href="css/table.css" type="text/css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Denúncias -- 4Ever Photo</title>
    </head>

    <body class="#424242 grey darken-3">
        <?php include 'includes/menu.php'; ?>
        <br/><br/>
        <font color="white" >
            <h2 style="text-align: center; width: 100%;">    
                Denuncias
            </h2>
        </font>
        <br/><br/>
        <div class="container">
            
            <div class="card-panel teal #ffca28 amber lighten-1 z-depth-5"><h6>
                
                <?php
                    $select = "SELECT * FROM denuncias;";

                    $rs = mysqli_query($conexao, $select);
                    //$rs = mysql_query ($conexao, $select); 
                    //Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($rs)

                    echo ('<table><tr><td>Denunciado</td><td>Denuncia</td><td>Data da Denuncia</td><td>Ver perfil</td><td>Ver mensagens</td><td>Excluir Denuncia</td></tr>');

                    //Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while
                    while ($row=mysqli_fetch_array($rs)){
						$data_timestamp = strtotime($row['data_denuncia']);
                        $data_br = date("d/m/Y", $data_timestamp);
                        $sql_usuario = "SELECT * FROM usuario WHERE id_usuario = '".$row['id_usuario']."';";
                        $usuario = mysqli_query($conexao, $sql_usuario);
                        while ($con = mysqli_fetch_array($usuario)){
                            echo '<tr><td>'. $con['nmuser_usuario'] . '</td><td>'. $row['texto_denuncia'] . '</td><td>' . $data_br . '</td>';
                            if($con['tipo_usuario']==2) echo('<td><a class="waves-effect waves-light btn-large #ffca28 amber lighten-1 black-text" href="perfil_fotografo_publico.php?id='.$con['id_usuario'].'">Ver perfil</a></td>');
                            if($con['tipo_usuario']==1) echo('<td></td>');
                            echo('<td><a class="waves-effect waves-light btn-large #ffca28 amber alighten-1 black-text" href="adm_chat.php?denunciado='.$con['id_usuario'].'&&user='. $con['nmuser_usuario'] .'">Verificar</a></td>');
                            echo('<td><a class="waves-effect waves-light btn-large #ffca28 amber alighten-1 black-text" href="adm_denuncia.php?ex='.$row['id_denuncia'].'">Excluir </a></td></tr>');
                        }
                        
                                           
                    }/*Fim do while*/

                    echo ('</table>'); /*fecha a tabela apos termino de impressão das linhas*/
					
					if(isset($_GET['ex'])){
						$ex=$_GET['ex'];
						$sql_delete=('delete from denuncias where id_denuncia='.$ex.';');
						$excluir=mysqli_query($conexao, $sql_delete);                    
						echo('<script>window.alert("Denuncia excluida com sucesso!");window.location="adm_denuncia.php";</script>');
					}
                ?>
                </h6>
            </div>
        </div>
    </body>
</html>