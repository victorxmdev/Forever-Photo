<?php
    include 'conexao.php';
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'includes/header_index.php'; ?>
        <?php include 'includes/head.php'; ?>
        <title>4Ever Photo</title>
    </head>

    <body class="#424242 grey darken-3">
        <?php include 'includes/menu.php'; ?>

        <h2 class="white-text center">Sobre Nós</h2>

        <div class="container dinl">
            <font size="3" color="#ffffff">
                <b>
                    <br><br><br>
                    Atualmente no Brasil, é perceptível a busca por fotógrafos em diversas áreas, se diversificando entre projetos sociais, casamentos,festas e até mesmo no ramo jornalístico, como mostram as pesquisas nos sites Fotografia Mais e Photo Album Universal.
                    Em vista da versatilidade do ramo fotográfico, o país possui uma alta demanda de profissionais presentes no mercado, que atualmente encontra-se parcialmente saturado, porém com determinado conhecimento prévio, portfólio e divulgação é possível se destacar no ramo. 
                    <br><br>
                    Atualmente muitos profissionais se dedicam em publicar seu portfólio em redes sociais em busca de maior divulgação, porém a finalidade de uma rede social não é 
                    necessariamente de divulgação de trabalho, por mais que auxilie o crescimento do profissional. Essa dificuldade é encontrada pois a rede social possui diversos 
                    públicos-alvo e nem sempre são pessoas interessadas em fotografias.
                    <br><br>
                    O projeto proposto é focado em uma plataforma que permite a interação de um fotógrafo e um cliente interessado no serviço prestado pelo profissional. É uma 
                    plataforma online que se encaixaria no perfil de uma rede social, porém permite a contratação do fotógrafo, possuindo uma visão mais profissional em relação à um 
                    site de divulgação.
                </b>
            </font>
            
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.slider').slider({
        full_width: true
                });
            });

        </script>


        <?php 
            include 'includes/footer.php';
        ?>

    </body>

</html>
