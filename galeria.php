<?php
    include 'includes/authorization.php';
?>
<!DOCTYPE html>
<html>

    <head>
        <?php include 'includes/head.php'; include 'includes/conexao.php'; ?>
        <link rel="stylesheet" href="css/galeria.css">
        <title>4Ever Photo</title>
        <style>
            .pagination li a.actual {
                background-color: #212121 !important;
                pointer-events: none;
                color: #FFF!important;
            }
            .input-field label {
                color: white;
            }
            
            .input-field input[type=text]:focus + label {
                color: #000;
            }
            
            .input-field input[type=text]:focus {
                border-bottom: 1px solid #000;
                box-shadow: 0 1px 0 0 #000;
            }

            .choose {
                color: #FFF!important;
            }

            .center input[type=submit] {
                color: #fff;
                background: black;
                border: none;
                padding: 1%;
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

            .input-field select {
                background-color: #212121;
                color: white;
                border: none;
            }

            .input-field select:hover {
                background-color: #212121;
                color: white;
                border: none;
            }

            .input-field option {
                background-color: white;
                color: black;
            }

            .white-text select{
                background-color: #212121;
                color: white;
                border: none;
            }

            .white-text select:hover {
                background-color: #212121;
                color: white;
                border: none;
            }
            .white-text option {
                background-color: white;
                color: black;
            }
        </style>
    </head>

    <body class="#424242 grey darken-3">
        <?php include 'includes/menu.php';?>
        <h2 class="center white-text ">Fotógrafos</h2>
        <br>
        <div class="row container">

            
            <form class="col s12" method="GET" id="pesquisar" action="#">
                <div class="row">
                    <div class="center">
                        <div class="input-field col s6">
                            <input name="nmuser" style="color:#FFF;" id="nmuser" type="text" class="validate">
                            <label for="nmuser">Nome de usuário</label>
                        </div>
                        <div class="input-field col s6">
                            <select name="especializacao" class="browser-default" name="seletor" id="especializacao">
                                <option value="0">Qualquer</option>
                                <option value="1">Retratos</option>
                                <option value="2">Comidas</option>
                                <option value="3">Animais</option>
                                <option value="4">Paisagens</option>
                                <option value="5">Eventos</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--<div class="center">
                            <input type="submit" name="pesquisa" value="Entrar">
                            <br/>
                            <br/>   
                        </div>
                    </div>
                </div>
            </form>
            <form class="col s12" method="GET" id="pesquisar2" action="#">-->
                <div class="row">

                    <div class="input-field col s6">
                        <select class="browser-default" name="uf_estado" id="estado">
                            <?php
                                $sql_estado = "SELECT * FROM estado ORDER BY uf_estado";
                                $estado = mysqli_query($conexao, $sql_estado);
                                echo('<option data-id="" value="">Escolha um estado</option>');

                                while ($con = mysqli_fetch_assoc($estado)) {
                                    echo('<option data-id="'. $con['id_estado'].'" value="'.$con['uf_estado'].'">'.$con['uf_estado'].'</option>');
                                }
                            ?>
                        </select>
                    </div>

                    <div class="input-field col s6">
                        <select class="browser-default" name="cidade" id="cidade">
                            <option value="">Escolha uma cidade</option>
                        </select>
                    </div>

                </div>
                
                <div class="center">
                    <input type="submit" name="pesquisa" value="Entrar">
                    <br/>
                    <br/>   
                </div>
            </form>
        </div>
        <div class="row container">
            <?php include 'includes/example/gallery.php'; ?>
        </div>
        <br><br>

        <div class="center">
            <ul class="pagination">
                <?php            
                if(isset($_GET['page']) && isset($_GET['size'])){
                    $page = $_GET['page'];
                    $size = $_GET['size'];
                    $pageCount = ceil($count / $size);
                    if($page == 1){
                        for($mb = 1; $mb <= $PER_PAGE_DEFAULT; $mb++ ){
                            ?>
                            <li class="waves-effect #ffca28 amber lighten-1"><a class="<?php if($mb == 1) echo "actual" ?>" href="galeria.php?page=<?php echo $mb;?>&size=<?php echo $SIZE_DEFAULT; ?>"><?php echo $mb; ?></a></li>
                            <?php
                        }
                    }
                    else if($page == $pageCount){
                        for($mb = ($page -  $PER_PAGE_DEFAULT) <= 1 ? 1 :($page -  $PER_PAGE_DEFAULT); $page >= $mb; $mb++){
                            ?>
                            <li class="waves-effect #ffca28 amber lighten-1>"><a class="<?php if($mb == $page) echo "actual" ?>" href="galeria.php?page=<?php echo $mb;?>&size=<?php echo $SIZE_DEFAULT; ?>"><?php echo $mb; ?></a></li>
                            <?php
                        }
                    }else{
                        $prev2 = ($page -  $PER_PAGE_DEFAULT) <= 1 ? 1 : ($page -  $PER_PAGE_DEFAULT);
                        $next2 = ($page +  $PER_PAGE_DEFAULT) >= $pageCount ? $pageCount : ($page +  $PER_PAGE_DEFAULT);
                        for($prev2; $prev2 <= $next2; $prev2++){
                            ?>
                            <li class="waves-effect #ffca28 amber lighten-1 "><a class="<?php if($page == $prev2) echo "actual" ?>" href="galeria.php?page=<?php echo $prev2;?>&size=<?php echo $SIZE_DEFAULT; ?>"><?php echo $prev2; ?></a></li>
                            <?php
                        }
                    }
                }else{
                    $page = floor($count / $SIZE_DEFAULT); // pageNumber
                    if($page <= 1){
                        ?>
                        <li class="waves-effect #ffca28 amber lighten-1 "><a class="actual" href="#!">1</a></li>
                        <?php
                    }else{
                        for($mb = 1; $mb <= $PER_PAGE_DEFAULT; $mb++ ){
                            ?>
                            <li class="waves-effect #ffca28 amber lighten-1 "><a class="<?php if($mb == 1) echo "actual" ?>" href="galeria.php?page=<?php echo $mb;?>&size=<?php echo $SIZE_DEFAULT; ?>"><?php echo $mb; ?></a></li>
                            <?php
                        }
                    }
                }
                ?>
            </ul>
        </div>
        <br><br><br><br>
        <?php
            include 'includes/footer.php';
            include 'includes/script.php';
        ?>
        <script>

            $('#estado').on('change', function(e) {
                var $cidadesOption = (id, cidade) => `<option value="${id}">${cidade}</option>`;
                var target = e.currentTarget;
                var $groupOptions = $(new DocumentFragment());
                var $selectCity = $('#cidade');
                var id = $(target).find(':selected').data('id')
                
                $.get('./api/cidade.php', {
                    id: id
                }, function(datas) {
                    var dataJson = JSON.parse(datas);
                    $selectCity.children().remove();
                    $selectCity.prepend("<option value=''>Escolha a cidade</option>");
                    dataJson.forEach(data => {
                        $($groupOptions).append($cidadesOption(data.nome_cidade, data.nome_cidade));
                    });
                    $selectCity.append($groupOptions);
                    $('select').formSelect();
                })
            })
        </script>
        <!--JavaScript at end of body for optimized loading-->

    </body>

</html>
