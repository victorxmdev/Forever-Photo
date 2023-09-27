<?php
	include './includes/conexao.php';
	
	// Seleciona todos os campos
	    $query = "select * from imagem where id_usuario = ".$_GET['id'];
		$listar = mysqli_query($conexao,$query);
	// Exibe as informações de cada usuário
		while ($dados = mysqli_fetch_array($listar)) {
	// Exibimos a imagem
		?>
		 <a class="carousel-item"><img src="./../imagens/<?php echo $dados["nome_imagem"]?>"></a>
	<?php
	   }
?>