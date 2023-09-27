<?php
    include 'includes/authorization.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Planos</title>
        <?php include 'includes/head.php'?>
        <!-- CSS-->
        <link href="css/prism.css" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
            html,
            body,
            .block {
                height: 100%;
            }
            nav ul li a:hover,
            nav ul li a.active {
                background-color: rgba(0, 0, 0, .1);
            }  
            .card-panel {
                font-size: 32px;
            }  
            a .circle {
                margin-top: 25px;
            }
        </style>
            <?php include 'includes/head.php'?>
    </head>
    <body class="##212121 grey darken-4">
            <div id="master" class="block #b2ebf2 cyan lighten-4">
                <nav class="pushpin-demo-nav" data-target="master">
                    <div class="nav-wrapper #80deea cyan lighten-3">
                        <div class="container">
                            <a class="brand-logo center">Plano Mestre</a>
                        </div>
                    </div>
                </nav>
                <div class="container">
                    <div class="left">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <img id="PlatinumPlan" class="z-depth-2" src="img/Platinum_card.jpg" width="400px" height="400px">
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 m6">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="card-panel #0097a7 cyan darken-2 white-text din">
                            <span class="">Plano topo de linha, para quem quer aproveitar ao máximo da plataforma, desfrutando de até 5GB em fotos em resolução de até 4K, custando apenas R$49,99 ao ano.
                        </span>
                        </div>
                        <a href="./cartao.php?plano=1" class="waves-effect waves-light btn-large #ffd600 cyan lighten-3 white-text ">Assinar</a>
                    </div>
                </div>
            </div>
            <div id="master" class="block #fff176 yellow lighten-2">
                <nav class="pushpin-demo-nav" data-target="master">
                    <div class="nav-wrapper #ffeb3b yellow">
                        <div class="container">
                            <a class="brand-logo center">Plano Pro</a>
                        </div>
                    </div>
                </nav>
                <div class="container">
                    <div class="left">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <img id="PlatinumPlan" class="z-depth-2" src="img/Gold_card.jpg" width="400px" height="400px">
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 m6">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="card-panel #ffd600 yellow accent-4 white-text din">
                            <span class="">Plano avançado, para quem busca algo acima da média, mas não quer gastar muito, com divulgações em até 1GB em resoluções de até 1080p, custando apenas R$29,99 ao ano.
                        </span>
                        </div>
                        <a href="./cartao.php?plano=2" class="waves-effect waves-light btn-large #ffd600 yellow accent-4 white-text ">Assinar</a>
                    </div>
                </div>
            </div>
            <div id="master" class="block #757575 grey darken-1">
                <nav class="pushpin-demo-nav" data-target="master">
                    <div class="nav-wrapper #616161 grey darken-2">
                        <div class="container">
                            <a class="brand-logo center">Plano Amador</a>
                        </div>
                    </div>
                </nav>
                <div class="container">
                    <div class="left">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <img id="PlatinumPlan" class="z-depth-2" src="img/Silver_card.jpg" width="400px" height="400px">
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 m6">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="card-panel #424242 grey darken-3 white-text din">
                            <span class="">Plano custo benefício, para quem quer um plano bom com um preço bom, com divulgações de até 500MB em resoluções de até 720p, custando apenas R$19,99 ao ano.
                        </span>
                        </div>
                        <a href="./cartao.php?plano=3" class="waves-effect waves-light btn-large #424242 grey darken-3 white-text ">Assinar</a>
                    </div>
                </div>
            </div>
            <div id="master" class="block #8d6e63 brown lighten-1">
                <nav class="pushpin-demo-nav" data-target="master">
                    <div class="nav-wrapper #795548 brown">
                        <div class="container">
                            <a class="brand-logo center">Plano Amador</a>
                        </div>
                    </div>
                </nav>
                <div class="container">
                    <div class="left">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <img id="PlatinumPlan" class="z-depth-2" src="img/BRONZE_card.jpg" width="400px" height="400px">
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 m6">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="card-panel #6d4c41 brown darken-1 white-text din">
                            <span class="">Plano grátis experimental durante 30 dias, com divulgações de até 50MB em resoluções de até 480p, pagando apenas R$9,99 ao ano.
                        </span>
                        </div>
                        <a href="./cartao.php?plano=4" class="waves-effect waves-light btn-large #6d4c41 brown darken-1 white-text ">Assinar</a>
                    </div>
                </div>
            </div>
            <?php
                include 'includes/footer.php';
            ?>
                <!--  Scripts-->
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script>
                if (!window.jQuery) {
                    document.write('<script src="bin/jquery-3.2.1.min.js"><\/script>');
                }
                

            </script>
            <script src="js/jquery.timeago.min.js"></script>
            <script src="js/prism.js"></script>
            <script src="js/lunr.min.js"></script>
            <script src="js/search.js"></script>
            <script src="js/materialize.js"></script>
            <script src="js/init.js"></script>

        </body>

    </html>
