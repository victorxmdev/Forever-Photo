<?php //autorizar uso da página, conectar com o banco e criar a conexao com o denunciado
    include 'includes/authorization.php';
    include 'includes/conexao.php';
    if(isset($_GET['denunciado'])){
        $id = $_GET['denunciado'];
    }
?>
<html>
    <head>
        <?php include 'includes/head.php';//conexoes padrão para o design da página?>
        <link rel="stylesheet" type="text/css" href="css/stylechat.css"/>
        <title> Mensagens de <?php echo $_GET['user'] ?> -- 4EverPhoto</title>
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
        <div class="row container offset-s2 ">
            <div style="overflow:auto;background-color:#ffca28;height:500px;" class="superior">
                <?php //seletor e exibidor de mensagens
                    
                    $sql_exibir=('SELECT * FROM mensagem WHERE id_emissor_mensagem ='.$id.' ORDER BY id_mensagem;');
                    $exibir = mysqli_query ($conexao, $sql_exibir);
                    while($con=mysqli_fetch_array($exibir)){
                        $data_timestamp = strtotime($con['data_mensagem']);
                        $data_br = date("d/m/Y", $data_timestamp);
                        echo("<h5>".$con['emissor_mensagem'].": [".$data_br."-".$con['hora_mensagem']."] ".$con['conteudo_mensagem'].'</h5>');
                    }
                ?>
            </div><br/>
            <div class="col offset-s1 s11 ">
                <?php 
                    $sql_usuario = "SELECT * FROM usuario WHERE id_usuario = '".$id."';";
                    $usuario = mysqli_query($conexao, $sql_usuario);
                    while ($con = mysqli_fetch_array($usuario)){
                        if($con['tipo_usuario']==2) echo('<td><a class="waves-effect waves-light btn-large #ffca28 amber lighten-1 black-text" href="perfil_fotografo_publico.php?id='.$con['id_usuario'].'">Ver perfil</a></td>'); 
                    }
                ?>
                <a class="waves-effect waves-light btn-large #ffca28 amber alighten-1 black-text" href="adm_denuncia.php">Voltar</a>
            </div>
        </div>
    </body>
</html>