<?php
    include 'includes/authorization.php';
?>
<!DOCTYPE html>
<html>

    <head>
        <?php include 'includes/head.php';
        include 'includes/conexao.php'; ?>
        <title>4Ever Photo</title>
        <style>
            .card-panel {
                font-size: 38px;
            }

            .circle {
                margin-top: 25px;
            }
        </style>
    </head>

    <body class="#424242 grey darken-3">
        <?php include 'includes/menu.php';
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $fotografoSql = "SELECT * FROM usuario WHERE id_usuario= $id AND tipo_usuario=2";
                $fotografoQuery = mysqli_query($conexao, $fotografoSql);
                if (mysqli_num_rows($fotografoQuery) != 0) {
                    while($con = mysqli_fetch_array($fotografoQuery))
                        $fotografo = $con;
                    $id = $_GET['id'];
                    $user = $con['nmuser_usuario'];
                    $sqlFotoPerfil = "SELECT nome_imagem FROM usuario_imagem WHERE id_usuario = $id";
                    $query = mysqli_query($conexao, $sqlFotoPerfil);
                    while ($con = mysqli_fetch_array($query))
                        $image = $con['nome_imagem'];
                } else {
                    header("location:javascript://history.go(-1)");
                }
            }
        ?>
        <h2 class="center white-text "><?php echo $fotografo['nmuser_usuario']?></h2>
        <br>

        <div class="container">
            <div class="left"><img class="circle z-depth-5" src="./uploads/<?php echo $image; ?>" width="300px" height="300px"></div><br>
        </div>
        <div class="row" style="margin-top:1%">
            <div class="col s6 ">
                <div class="card-panel teal #ffca28 amber lighten-1 z-depth-5">
                    <span class="dinl" style="font-size:30px;"><?php echo $fotografo['desc_usuario'];?></span>
                </div>
            </div>
        </div>
		<div class="container row">
            <h2 class="white-text center">Portfólio</h2>
            <div class="carousel carousel-slider">
                <?php
                    include './api/profile_public.php';
                ?>
            </div>
        </div>        
		<div class="container">
            <h2 class="white-text center">Informações Pessoais</h2>
            <div class="card-panel teal #ffca28 amber lighten-1 z-depth-5" style="height:400px;"><h6>
                <table>
                    <thead>
                        <tr>
                            <th>Dado</th>  
                            <th>Informação</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                            $sql_info=('SELECT * FROM usuario WHERE id_usuario = '.$_GET['id'].';');
                            $info = mysqli_query($conexao, $sql_info);
                            while($edit=mysqli_fetch_array($info)){
                                if($edit['especializacao_usuario']==0) $especializacao = 'Nenhuma';
                                if($edit['especializacao_usuario']==1) $especializacao = 'Retratos';
                                if($edit['especializacao_usuario']==2) $especializacao = 'Comidas';
                                if($edit['especializacao_usuario']==3) $especializacao = 'Animais';
                                if($edit['especializacao_usuario']==4) $especializacao = 'Paisagens';
                                if($edit['especializacao_usuario']==5) $especializacao = 'Eventos';
                                echo '<tr><td>Nome de Usuário</td><td>'.$edit['nmuser_usuario'].'</td></tr>
                                <tr><td>Nome completo</td><td>'.$edit['nome_usuario'].' '.$edit['sobrenome_usuario'].'</td></tr>
                                <tr><td>Especialização</td><td>'.$especializacao.'</td></tr>
                                <tr><td>Cidade</td><td>'.$edit['cidade_usuario'].'</td></tr>
                                <tr><td>Estado</td><td>'.$edit['uf_usuario'].'</td></tr>';
								}
                        ?>
                    </tbody>
                </table>
                </h6>
            </div>
        </div>
        
          <br><br><br><br>
        <div class="center">
            <?php 
                if($_SESSION['tipo']==1){
                    echo '<a class="waves-effect waves-light btn-large #ffca28 amber lighten-1 black-text" href="chat.php?id='.$id.'&&user='.$fotografo['nmuser_usuario'].'">Conversar</a>&nbsp';
                    echo '<a class="waves-effect waves-light btn-large #ffca28 amber lighten-1 black-text" href="denuncia.php?id='.$id.'">Denunciar</a>';
                }
            ?>

        </div> 
        <br>
            <?php
                if($_SESSION['tipo']==1){
                    include 'includes/paypal.php';
                }
        ?>
        <br><br><br><br><br><br>
        <div class="container row">
            <?php
				$query = "select * from imagem where id_usuario = ".$_SESSION['id_usuario'];
				$listar = mysqli_query($conexao,$query);
				// Exibe as informações de cada usuário
				while ($dados = mysqli_fetch_array($listar)) {
					echo '<img width="25%" src="imagens/'.$dados["nome_imagem"]?>" />
					<?php
				}
			?>            
        </div>

        <br><br><br><br>

        <?php
        
            include  'includes/footer.php';
            include 'includes/script.php';
        ?>        
        <script>
            $('.carousel.carousel-slider').carousel({full_width: false});
        </script>
    </body>

</html>