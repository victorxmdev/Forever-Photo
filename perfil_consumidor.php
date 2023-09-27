<?php
    include 'includes/authorization.php';
    if($_SESSION['tipo']!=1) header('Location:sair.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <?php include 'includes/head.php'; ?>
        <title>4Ever Photo</title>
    </head>

    <body class="#424242 grey darken-3">
        <?php include 'includes/menu.php'; ?>
        
        <h2 class="center white-text "><?php $_SESSION['user'] ?></h2>
        <br>

        <div class="container">
            <div class="center"><img id="profilePicture" class="circle z-depth-5" width="300px" height="300px"></div><br>
        </div>
        <div class="row">
            <div class="center">
                <label for="imageInput">
                    <a id="editBtn" class="waves-eff ect waves-light btn-large #ffca28 amber lighten-1 black-text">Editar foto</a>
                    <input type="file" id="imageInput" style="display: none;">
                </label>
            </div>
            
        </div>
        
        <br><br>
        <div class="container">
            <h2 class="white-text center">Informações Pessoais</h2>
            <div class="card-panel teal #ffca28 amber lighten-1 z-depth-5"><h6>
                <table>
                    <thead>
                        <tr>
                            <th>Dado</th>  
                            <th>Informação</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                            $sql_info=('SELECT * FROM usuario WHERE id_usuario = '.$_SESSION['id_usuario'].';');
                            $info = mysqli_query($conexao, $sql_info);
                            while($edit=mysqli_fetch_array($info)){
                                if($edit['pergunta_usuario']==1){
                                    $pergunta = 'Qual é o nome do seu animal de estimação?';
                                }else if($edit['pergunta_usuario']==2){
                                    $pergunta = 'Qual é sua comida preferida?';
                                }else if($edit['pergunta_usuario']==3){
                                    $pergunta = 'Qual é sua cor preferida?';
                                }else if($edit['pergunta_usuario']==4){
                                    $pergunta = 'Qual é seu filme preferido?';
                                }else if($edit['pergunta_usuario']==5){
                                    $pergunta = 'Qual é sua série preferida?';
                                }else if($edit['pergunta_usuario']==0){
                                    $pergunta = '';
                                }
                                echo '<tr><td>Nome de Usuário</td><td>'.$edit['nmuser_usuario'].'</td><td><a href="editar.php?nmuser='. $edit['nmuser_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr> <td>E-mail</td><td>'.$edit['email_usuario'] .'</td><td></td></tr>
                                <tr><td>Nome completo</td><td>'.$edit['nome_usuario'].' '.$edit['sobrenome_usuario'].'</td><td></td></tr>
                                <tr><td>Telefone</td><td>'.$edit['telefone_usuario'].'</td><td><a href="editar.php?telefone='. $edit['telefone_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>Rua</td><td>'.$edit['rua_usuario'].'</td><td><a href="editar.php?rua='. $edit['rua_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>Número</td><td>'.$edit['num_casa_usuario'].'</td><td><a href="editar.php?numero='. $edit['num_casa_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>Complemento</td><td>'.$edit['complemento_usuario'].'</td><td><a href="editar.php?complemento='. $edit['complemento_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>Bairro</td><td>'.$edit['bairro_usuario'].'</td><td><a href="editar.php?bairro='. $edit['bairro_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>Cidade</td><td>'.$edit['cidade_usuario'].'</td><td><a href="editar.php?cidade='. $edit['cidade_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>Estado</td><td>'.$edit['uf_usuario'].'</td><td><a href="editar.php?estado='. $edit['uf_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>CPF</td><td>'.$edit['cpf_usuario'].'</td><td><a href="editar.php?cpf='. $edit['cpf_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>Pergunta de recuperação</td><td>'.$pergunta.'</td><td><a href="editar.php?pergunta='. $edit['pergunta_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>Resposta</td><td>'.$edit['resposta_usuario'].'</td><td><a href="editar.php?resposta='. $edit['resposta_usuario'].'"><b>Editar</b></a></td></tr>';
                            }
                        ?>
                    </tbody>
                </table>
                </h6>
            </div>
        </div>
          <br><br>
        <div class="container">
            <h2 class="white-text center">Serviços contratados</h2>
            <div class="card-panel teal #ffca28 amber lighten-1 z-depth-5"><h6>
                <table>
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Fotógrafo</th>
                            <th>Conversar</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            $sql_chats=('SELECT * FROM chat WHERE id_consumidor = '.$_SESSION['id_usuario'].';');
                            $chats = mysqli_query($conexao, $sql_chats);
                            while($con=mysqli_fetch_array($chats)){
								$data_timestamp = strtotime($con['data_chat']);
								$data_br = date("d/m/Y", $data_timestamp);
                                echo('<tr><td>'.$data_br.'</td><td>'.$con['nome_fotografo'].'</td><td><a href="chat.php?id='.$con['id_fotografo'].'&&user='. utf8_encode($con['nome_fotografo']).'" class="waves-eff ect waves-light btn-large #ffca28 amber lighten-1 black-text">Conversar</a></td></tr>');
                            }
                        ?>
                    </tbody>
                </table>
                </h6>
            </div>
        </div>
        
        <br><br>
        <?php
            include 'includes/footer.php';
            include 'includes/script.php';
            include 'includes/image_profile.php';
        ?>
    </body>
    
</html>