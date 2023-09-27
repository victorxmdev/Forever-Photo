<?php
    include 'includes/authorization.php';
    include 'includes/conexao.php';
    date_default_timezone_set('America/Sao_Paulo');
    if(isset($_GET['id'])&&isset($_GET['user'])){
        $id = $_GET['id'];
        $user = $_GET['user'];
		if($_SESSION['tipo']==1) $sql_verificar_chat = ('SELECT * FROM chat WHERE id_consumidor ='.$_SESSION['id_usuario'].' and id_fotografo = '.$id.';');
		if($_SESSION['tipo']==2) $sql_verificar_chat = ('SELECT * FROM chat WHERE id_consumidor ='.$id.' and id_fotografo = '.$_SESSION['id_usuario'].';');
        $verificar_chat = mysqli_query($conexao, $sql_verificar_chat);
		$data_chat = date('Y-m-d');
        if(mysqli_num_rows($verificar_chat)==0){
            $sql_criar_chat = ('INSERT INTO chat (id_consumidor, id_fotografo, nome_consumidor, nome_fotografo, data_chat) VALUES ('.$_SESSION['id_usuario'].','.$id.',"'.$_SESSION['user'].'","'.$user.'","'.$data_chat.'");');
            $criar_chat = mysqli_query($conexao, $sql_criar_chat);
            $chat=mysqli_insert_id($conexao);

        }else{
            $chat=mysqli_fetch_array($verificar_chat);
			 $chat=$chat['id_chat'];
        }
    }
?>
<html>
    <head>
        <?php include 'includes/head.php';?>
        <link rel="stylesheet" type="text/css" href="css/stylechat.css"/>
        <?php echo '<title> Chat com'.$_GET['user'].' -- 4EverPhoto</title>'?>
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
                <?php
                    $sql_exibir=('SELECT * FROM mensagem WHERE id_chat ='.$chat.' ORDER BY id_mensagem;');
                    $exibir = mysqli_query ($conexao, $sql_exibir);
                    while($con=mysqli_fetch_array($exibir)){
                        $data_timestamp = strtotime($con['data_mensagem']);
                        $data_br = date("d/m/Y", $data_timestamp);
                        echo("<h5>".$con['emissor_mensagem'].": [".$data_br."-".$con['hora_mensagem']."] ".$con['conteudo_mensagem'].'</h5>');
                    }
                ?>
            </div><br/>
            <div class="col offset-s1 s11 ">
                <form action="#" class="col s12" method="POST">
                    <div class="row">
                        <div class="input-field col s9">
                            <input type="text" name="msg" style="color:white;" placeholder="Mensagens" required/>
                        </div>
                    
                        <div class="input-field col s3">
                            <input class="waves-effect waves-light btn-large #ffca28 amber lighten-1 black-text" type="submit" name="enviar" value="Enviar"/>
                        </div>
                    </div>
                </form>
                <?php if($_SESSION['tipo']==1){ ?>
                    <a class="waves-effect waves-light btn-large #ffca28 amber lighten-1 black-text" href="perfil_fotografo_publico.php?id=<?php echo $id;?>">Ver perfil</a>
                    <a class="waves-effect waves-light btn-large #ffca28 amber alighten-1 black-text" href="perfil_consumidor.php">Voltar</a>
                    <a class="waves-effect waves-light btn-large #ffca28 amber lighten-1 black-text" href="denuncia.php?id=<?php echo $id;?>">Denunciar</a>
                <?php } else if($_SESSION['tipo']==2){ ?>
                    <a class="waves-effect waves-light btn-large #ffca28 amber alighten-1 black-text" href="perfil_fotografo.php">Voltar</a>
                    <a class="waves-effect waves-light btn-large #ffca28 amber lighten-1 black-text" href="denuncia.php?id=<?php echo $id;?>">Denunciar</a>
                <?php }
                    if(isset($_POST['enviar'])){
                        $mensagem = $_POST['msg'];
                        date_default_timezone_set('America/Sao_Paulo');
                        $date = date('Y-m-d');
                        $hour = date('H:i:s');

                        $sql_enviar = ('INSERT INTO mensagem (id_emissor_mensagem, emissor_mensagem, conteudo_mensagem, data_mensagem, hora_mensagem, id_chat, tipo_emissor) VALUES ("'.$_SESSION['id_usuario'].'", "'.$_SESSION['user'].'","'.$mensagem.'","'.$date.'","'.$hour.'","'.$chat.'","'.$_SESSION['tipo'].'");');
                        $enviar = mysqli_query($conexao, $sql_enviar);
                        header('Location:chat.php?id='.$id.'&&user='.$user);
                    }
                ?>

            </div>
        </div>
    </body>
</html>