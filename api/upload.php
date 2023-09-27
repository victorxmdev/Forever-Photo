<?php
// Conexão com o banco de dados
include ('../includes/conexao.php');
include ('../includes/authorization.php');

// Se o usuário clicou no botão cadastrar efetua as ações	
	
	if (isset($_POST['enviar'])){

		$extensao1= strtolower (substr($_FILES['imagem']['name'], -5));
		
		//criptografa o nome da imagem
		$imagem=md5(time()) . $extensao1;
		$diretorio1 = "../imagens/";
		move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio1.$imagem);

		$sql_inserirFoto=('insert into imagem (nome_imagem, id_usuario) values ("'.$imagem.'", "'.$_SESSION['id_usuario'].'");');
		mysqli_query($conexao, $sql_inserirFoto);
		header("location:../perfil_fotografo.php");

	}
?>