<style>
    nav .nav-wrapper {
        position: relative;
        margin-top: -1.5%;
    }

</style>
<nav class="#212121 grey darken-4">
    <div class="nav-wrapper container">
        <a href="#" class="brand-logo center"> <img src="img/logo.png" width="65px" height="65px"></a>
        <div id="nav-wrapper" class="nav-wrapper">
            <ul class="left">
                <?php
                    if (isset($_SESSION['tipo'])) {
                        switch($_SESSION['tipo']){
                            case 1:
                                ?>
                                <li><a class="waves-effect" href="perfil_consumidor.php">Meu perfil</a></li>
                                <li><a class="waves-effect" href="galeria.php">Galeria</a></li>
                                <?php
                                break;
                            case 2:
                                ?>
                                <li><a class="waves-effect" href="perfil_fotografo.php">Meu perfil</a></li>
                                <li><a class="waves-effect" href="planos.php">Planos</a></li>
                                <?php
                                break;
                            case 3:
                                ?>
                                <li><a class="waves-effect" href="management.php">Usuários</a></li>
                                <li><a class="waves-effect" href="adm_denuncia.php">Denúncias</a></li>
                                <?php
                                break;
                            default:
                                echo '<li><a class="waves-effect" href="index.php">Home</a></li>';
                            break;
                        }
                     } else {
                        ?>
                            <li><a class="waves-effect" href="index.php">Home</a></li>
                            <?php }  ?>
            </ul>
            <ul class="right">
                <?php
                    if (isset($_SESSION['tipo'])) {
                        switch($_SESSION['tipo']){
                            case 1:
                                ?>
                                <li><a class="waves-effect" href="sair.php">Sair</a></li>
                                <li><a class="waves-effect" href="excluir.php">Excluir</a></li>
                                <?php
                                break;
                            case 2:
                                ?>
                                <li><a class="waves-effect" href="sair.php">Sair</a></li>
                                <li><a class="waves-effect" href="excluir.php">Excluir</a></li>
                                <?php
                                break;
                            case 3:
                                ?>
                                <li><a class="waves-effect" href="sair.php">Sair</a></li>
                                <?php
                                break;
                            default:
                                ?>
                                <li><a class="waves-effect" href="login.php">Login</a></li>
                                <?php
                                break;
                        }
                     } else {
                        ?>
                            <li><a class="waves-effect" href="login.php">Login</a></li>
                            <?php } ?>
            </ul>
        </div>
    </div>
</nav>
