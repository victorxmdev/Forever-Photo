
<?php
    include 'includes/authorization.php';
?>
<!DOCTYPE html>
<html>

    <head>
        <?php include 'includes/head.php'; ?>
        <title><?php echo $_SESSION['user'] ?>-- 4Ever Photo</title>
        <style>
        
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
            input[type=file]:hover {
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
        <h2 class="center white-text "><?php echo $_SESSION['user'] ?></h2>
        <br>
        
        <div class="container">
            <div class="left"><img id="profilePicture" class="circle z-depth-5" width="300px" height="300px">
                <div class="center">
                    <label for="imageInput">
                        <a id="editBtn" class="waves-eff ect waves-light btn-large #ffca28 amber lighten-1 black-text">Editar foto</a>
                        <input type="file" id="imageInput" style="display: none;">
                    </label>
                </div>
            </div>
            <br />
        </div>
        <div class="row">
            <div class="col s6 ">
                <div class="card-panel teal #ffca28 amber lighten-1 z-depth-5">
                    <span class="dinl" style="font-size:30px;"><?php echo $_SESSION['desc'];?>
                    </span>
                </div>
                <label>
                    <a href="./editardescricao.php" class="waves-eff ect waves-light btn-large #ffca28 amber lighten-1 black-text" style="position:float; float:right">Editar descrição</a>
                </label>
            </div>
        </div>
        <br><br><br><br><br><br>
        <h2 class="white-text center">Enviar fotos</h2>
        <div class="container">
            <div class="carousel carousel-slider">
                <?php include './api/profile.php'?>
            </div>
        </div>
        <br/>
        <form action="api/upload.php" method="POST" enctype="multipart/form-data" >
            <div style="display: flex; justify-content: center;">
             <input type="file" id="imagemUsuario" name="imagem" required class="upload" style="display: none;"accept="image/png, image/jpg, image/jpeg"><br /><br />
                <label for="imagemUsuario" style="margin: 0 10px">
                    <a class="waves-effect waves-light btn-large #ffca28 amber lighten-1 black-text">Adicionar</a>
                </label>
                <button id="deleteBtn" style="margin: 0 10px" class="waves-effect waves-light btn-large #ffca28 amber lighten-1 black-text">Excluir</button>
                <input type="submit" style="display: none;" id="enviarImagem" name="enviar" value="Enviar imagem" />
            </div>
        </form>
        <br/>
        <br><br><br><br>
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
                                if($edit['especializacao_usuario']==0) $especializacao = 'Nenhuma';
                                if($edit['especializacao_usuario']==1) $especializacao = 'Retratos';
                                if($edit['especializacao_usuario']==2) $especializacao = 'Comidas';
                                if($edit['especializacao_usuario']==3) $especializacao = 'Animais';
                                if($edit['especializacao_usuario']==4) $especializacao = 'Paisagens';
                                if($edit['especializacao_usuario']==5) $especializacao = 'Eventos';
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
                                <tr><td>Especialização</td><td>'.$especializacao.'</td><td><a href="editar.php?telefone='. $especializacao.'"><b>Editar</b></a></td></tr>
                                <tr><td>Rua</td><td>'.$edit['rua_usuario'].'</td><td><a href="editar.php?rua='. $edit['rua_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>Número</td><td>'.$edit['num_casa_usuario'].'</td><td><a href="editar.php?numero='. $edit['num_casa_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>Complemento</td><td>'.$edit['complemento_usuario'].'</td><td><a href="editar.php?complemento='. $edit['complemento_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>Bairro</td><td>'.$edit['bairro_usuario'].'</td><td><a href="editar.php?bairro='. $edit['bairro_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>Cidade</td><td>'.$edit['cidade_usuario'].'</td><td><a href="editar.php?cidade='. $edit['cidade_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>Estado</td><td>'.$edit['uf_usuario'].'</td><td><a href="editar.php?estado='. $edit['uf_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>Pergunta</td><td>'.$pergunta.'</td><td><a href="editar.php?pergunta='. $edit['pergunta_usuario'].'"><b>Editar</b></a></td></tr>
                                <tr><td>Resposta</td><td>'.$edit['resposta_usuario'].'</td><td><a href="editar.php?resposta='. $edit['resposta_usuario'].'"><b>Editar</b></a></td></tr>';
                            }
                        ?>
                    </tbody>
                </table>
                </h6>
            </div>
        </div>
        <div class="container">
            <h2 class="white-text center">Fatura</h2>
            <div class="card-panel teal #ffca28 amber lighten-1 z-depth-5"><h6>
                <table>
                    <thead>
                        <tr>
                            <th>Dado</th>  
                            <th>Informação</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                            $sql_cartao=('SELECT * FROM `cartao` WHERE id_usuario = '.$_SESSION['id_usuario'].';');
                            $sql_plano=('SELECT * FROM `planos` WHERE id_fotografo = '.$_SESSION['id_usuario'].';');
                            $cartao = mysqli_query($conexao, $sql_cartao);
                            $plano = mysqli_query($conexao, $sql_plano);
                            while($card=mysqli_fetch_array($cartao)){
                                
                                echo '<tr><td>Cartão</td><td>'.$card['num_cartao'].'</td></tr>';
                                echo '<tr><td>Titular</td><td>'.$card['nome_cartao'].'</td></tr>';
                            }
                            while($plan=mysqli_fetch_array($plano)){
                                $preco = $plan['preco_plano'] - 0.01;
                                if($plan['tipo_plano']==1) echo '<tr><td>Plano</td><td>PLANO PLATINUM</td></tr>';
                                if($plan['tipo_plano']==2) echo '<tr><td>Plano</td><td>PLANO OURO</td></tr>';
                                if($plan['tipo_plano']==3) echo '<tr><td>Plano</td><td>PLANO PRATA</td></tr>';
                                if($plan['tipo_plano']==4) echo '<tr><td>Plano</td><td>PLANO BRONZE</td></tr>';
                                echo '<tr><td>Valor</td><td>'.$preco.'</td></tr>';
                            }
                        ?>
                    </tbody>
                </table>
                </h6>
            </div>
        </div>
          <br><br><br><br>
      <div class="container">
            <h2 class="white-text center">Serviços contratados</h2>
            <div class="card-panel teal #ffca28 amber lighten-1 z-depth-5"><h6>
                <table>
                    <thead>
                        <tr>
                            <th>Data</th>  
                            <th>Contratante</th>
                            <th>Conversar</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            $sql_chats=('SELECT * FROM chat WHERE id_fotografo = '.$_SESSION['id_usuario'].';');
                            $chats = mysqli_query($conexao, $sql_chats);
                            while($con=mysqli_fetch_array($chats)){
								$data_timestamp = strtotime($con['data_chat']);
								$data_br = date("d/m/Y", $data_timestamp);
                                echo('<tr><td>'.$data_br.'</td><td>'. utf8_encode($con['nome_consumidor']).'</td><td><a href="chat.php?id='.$con['id_consumidor'].'&&user='.$con['nome_consumidor'].'" class="waves-eff ect waves-light btn-large #ffca28 amber lighten-1 black-text">Conversar</a></td></tr>');
                            }
                        ?>
                    </tbody>
                </table>
                </h6>
            </div>
        </div>
        <?php
            include 'includes/footer.php';
            include 'includes/script.php';
            include 'includes/image_profile.php';
        ?>
        <script>
            $('#imagemUsuario').on('change', function(){
                var value = $(this).val();
                if(value != ""){
                    $('#enviarImagem').click();
                }
            })
            $('#deleteBtn').on('click', function(){
                var nome = $('.carousel-item.active').data('id');
                window.location.href = "api/exclui.php?nome_imagem=" + nome;
            })
            $('.carousel.carousel-slider').carousel({full_width: false});
        </script>
    </body>
</html>