<!DOCTYPE html>
<html>
	<head>
        <?php include 'includes/header_index.php';include 'includes/head.php'; ?>
        <title>4Ever Photo</title>
        <style>
            .indicator-item.active{
                background-color: #000!important;
            }
            .card-panel{
                min-height: 100%!important;
            }
            .equalItems{
                display: flex;
            }
            .imgHover:hover{
                animation: jump 3s infinite;
                border: none;
            }
            
            @keyframes jump{
                0%, 50%, 100%{
                    transform: translateY(0)
                }
                
                25%, 75%{
                    transform: translateY(-10px);
                }
            }
        </style>
	</head>

    <body class="#424242 grey darken-3">
        <?php include 'includes/menu.php';?>

        <div class="slider">
            <ul class="slides">
                <li>
                    <img src="img/slide1.jpg"> 
                    <div class="caption center-align">
                        <h2>Eternize suas memórias.</h2>
                        <h3>Sempre que precisar, um fotógrafo estará disponível para você.</h3>
                    </div>
                </li>
                <li>
                    <img src="img/slide2.jpg"> 
                    <div class="caption center-align">
                        <h2>Capture qualquer ocasião.</h2>
                        <h3>Seja para um casamento, uma festa, ou até fotos da natureza.</h3>
                    </div>
                </li>
                <li>
                    <img src="img/slide3.jpg"> 
                    <div class="caption center-align">
                        <h2>Para você, fotógrafo.</h2>
                        <h3>Cadastre-se e encontre as mais diversas opções de trabalho.</h3>
                    </div>
                </li>
            </ul>
        </div>


        <div class="row equalItems dinm">
            <div class="col s12 m4">
                <div class="card-panel #ffd740 amber accent-2">
                    <div class="center">
                        <i class="material-icons large">chat</i><br>
                    </div>
                    <span class="black-text center"><h4>Converse diretamente com fotógrafos pelo chat</h4></span>
                </div>
            </div>
            
            <div class="col s12 m4">
                <div class="card-panel #ffd740 amber accent-2">
                    <div class="center">
                        <i class="material-icons large">supervisor_account</i><br>
                    </div>
                    <span class="black-text center"><h4>Algum problema? Converse com nossa equipe</h4></span>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card-panel #ffd740 amber accent-2">
                    <div class="center">
                        <i class="material-icons large">payment</i><br>
                    </div>
                    <span class="black-text center"><h4>Valores a contratar com o serviço escolhido</h4></span>
                </div>
            </div>			
        </div>

        <h4 class="white-text center dinm">Nossos planos para fotógrafos</h4>
    
        <div class="container">
            <div class="row">
                <br><br>
                <div class="col s3 m3 imgHover">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/Bronze_card.jpg">
                        </div>
                        <div class="card-content" style="background-color: #212121;">
                            <p class="white-text">Plano Bronze</p>
                        </div>
                        <div class="card-action" id="card" style="background-color: #212121;">  
                            <label for="card">
                                <a class="waves-effect waves-light" href="login.php">Ver mais</a>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col s3 m3 imgHover" >
                    <div class="card">
                        <div class="card-image">
                            <img src="img/Silver_card.jpg">
                        </div>
                        <div class="card-content" style="background-color: #212121;">
                            <p class="white-text">Plano Silver</p>
                        </div>
                        <div class="card-action" id="card" style="background-color: #212121;">  
                            <label for="card">
                                <a class="waves-effect waves-light" href="login.php">Ver mais</a>
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="col s3 m3 imgHover" >
                    <div class="card">
                        <div class="card-image">
                            <img src="img/Gold_card.jpg">
                        </div>
                        <div class="card-content" style="background-color: #212121;">
                            <p class="white-text">Plano Gold</p>
                        </div>
                        <div class="card-action" id="card" style="background-color: #212121;">  
                            <label for="card">
                                <a class="waves-effect waves-light" href="login.php">Ver mais</a>
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="col s3 m3 imgHover">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/Platinum_card.jpg">
                        </div>
                        <div class="card-content" style="background-color: #212121;">
                            <p class="white-text">Plano Platinum</p>
                        </div>
                        <div class="card-action" id="card" style="background-color: #212121;">  
                            <label for="card">
                                <a class="waves-effect waves-light" href="login.php">Ver mais</a>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            
            
            <div class="row">
                <?php 

                include 'includes/conexao.php';

                $sql_pesquisar_fotografo = 'SELECT id_fotografo, COUNT(*) AS matches FROM chat GROUP BY id_fotografo ORDER BY matches DESC LIMIT 1';
                $pesquisar_fotografo = mysqli_query ($conexao, $sql_pesquisar_fotografo);
                while ($fotografo = mysqli_fetch_array($pesquisar_fotografo)){
                    $sql_pesquisar_usuario = 'SELECT * FROM usuario WHERE id_usuario = '.$fotografo['id_fotografo'].';';
                    $pesquisar_usuario = mysqli_query($conexao,$sql_pesquisar_usuario);
                    while ($con = mysqli_fetch_array($pesquisar_usuario)){
                        $sqlFotoPerfil = "SELECT nome_imagem FROM usuario_imagem WHERE id_usuario = ". $fotografo['id_fotografo'].";";
                        $query = mysqli_query($conexao, $sqlFotoPerfil);
                        while ($perfil = mysqli_fetch_array($query)) $image = $perfil['nome_imagem'];
                        echo('<h2 class="white-text center">Fotógrafo do Mês: '.$con['nmuser_usuario'].'</h2>');
                        ?>
                        <div class="container">
                            <div class="left"><img class="circle z-depth-5" src="./uploads/<?php echo $image; ?>" width="300px" height="300px"></div><br>
                        </div>
                        <div class="row">
                            <div class="col s6 ">
                                <div class="card-panel teal #ffca28 amber lighten-1 z-depth-5">
                                    <span class="" style="font-size:30px;"><?php echo $con['desc_usuario'];?></span>
                                </div>
                            </div>
                        </div>
                        <div class="zoom center-align">
                                <?php
                    }
                    // Seleciona todos os campos
                    $query = "select * from imagem where id_usuario = ".$fotografo['id_fotografo']. " limit 3;";
                    $listar = mysqli_query($conexao,$query);
                    // Exibe as informações de cada usuário
                    while ($dados = mysqli_fetch_array($listar)) {
                    // Exibimos a imagem 
                        ?>
                        <a style="align:center; box-shadow: 1px 1px 2px 1px #000;" data-id="<?php echo $dados['nome_imagem']; ?>" class="carousel-item"><img height="180px" width="300px" src="./imagens/<?php echo $dados["nome_imagem"]?>"></a>
                        <?php
                    }
                }
            ?>
                </div>

            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.slider').slider({full_width: true});
            });
            $('.carousel.carousel-slider').carousel({full_width: false});

        </script>


        <?php 
            include 'includes/footer.php';
        ?>
    </body>
	
</html>


