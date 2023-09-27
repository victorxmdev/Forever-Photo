<?php	
	include '../includes/conexao.php';
	if(isset($_GET['nome_imagem'])){
        $query="delete from imagem where nome_imagem = '".$_GET['nome_imagem']."'";// com essa query excluiremos o nome do arquivo em nosso banco de dados
        unlink("../imagens/".$_GET['nome_imagem']);//não basta apenas excluirmos o arquivo no banco de dados, precisamos também excluir o arquivo físico na pasta
        $exclui = mysqli_query($conexao,$query);
        if($exclui){?>
            <script>
                alert('O arquivo foi excluido');
                location.href='../perfil_fotografo.php';
            </script>
        <?php
        }else{?>
            <script>
                alert('Desculpe, ocorreu um erro');die;
                location.href='../perfil_fotografo.php';
            </script>
        <?php		
        }
    }
?>