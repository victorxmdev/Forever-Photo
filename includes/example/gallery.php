<?php
    include 'includes/conexao.php';
    $totalSql = "SELECT * FROM usuario WHERE tipo_usuario=2;";
    $total = mysqli_query($conexao, $totalSql);
    $count = mysqli_num_rows($total);
    $SIZE_DEFAULT = 5;
    $OFFSET_DEFAULT = 0;
    $PER_PAGE_DEFAULT = 5;
    if (isset($_GET['page']) && isset($_GET['size'])) {
        $offset = ($_GET['page'] - 1 ) * $_GET['size'];
        $fotografos = "SELECT * FROM usuario WHERE tipo_usuario=2 AND cidade_usuario = '".$_SESSION['cidade']."' LIMIT " . $_GET['size'] . " OFFSET " . $offset . ";";
    } else {
        $fotografos = "SELECT * FROM usuario WHERE tipo_usuario=2 AND cidade_usuario = '".$_SESSION['cidade']."' LIMIT $SIZE_DEFAULT OFFSET $OFFSET_DEFAULT;";
    }

    if(isset($_GET['pesquisa'])){
        $fotografos = "SELECT * FROM `usuario` WHERE tipo_usuario=2 AND nmuser_usuario = '".$_GET['nmuser']."' OR uf_usuario = '".$_GET['uf_estado']."' AND cidade_usuario = '".$_GET['cidade']."' OR especializacao_usuario = '".$_GET['especializacao']."';";
    }
    $query = mysqli_query($conexao, $fotografos);

    while ($con = mysqli_fetch_array($query)) {
        $imageResul = "SELECT nome_imagem FROM usuario_imagem where id_usuario=" . $con['id_usuario'] . ";";

        $queryImage = mysqli_query($conexao, $imageResul);
        while ($userImagem = mysqli_fetch_array($queryImage)) $imagem = $userImagem['nome_imagem'];
        if ($con['tipo_usuario'] == 2){
?>
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img width="300" height="225" src="./uploads/<?php echo $imagem ?>">
                        <span class="card-title dinl" style="font-weight: bold;"><?php echo $con['nmuser_usuario'] ?></span>
                    </div>
                    <div class="card-action #ffca28 amber lighten-1 dinc" style="font-size: 16px;">
                        <a href="./perfil_fotografo_publico.php?id=<?php echo $con['id_usuario'] ?>" class="black-text">Ver o perfil</a>
                    </div>
                </div>
            </div>
<?php
        }
    }
?>