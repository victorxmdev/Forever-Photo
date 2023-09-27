<!DOCTYPE html>
<html>

    <head>
        <?php include 'includes/head.php'; include 'includes/conexao.php'; include 'includes/authorization.php' ?>
        <title>Editar -- 4Ever Photo</title>
        <style>
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
        
        <?php include 'includes/menu.php';
            $sql_info=('SELECT * FROM usuario WHERE id_usuario = '.$_SESSION['id_usuario'].';');
            $info = mysqli_query($conexao, $sql_info);
            while($edit=mysqli_fetch_array($info)){
        ?>
            <h2 class="center white-text ">Editar</h2>
            <br>

            <div class="row container">
                <form class="col s12" method="POST" id="edit" action="#">
                    <div class="row">
                        <input required style="color:white;" type="hidden" id="tipo" data-tipo="<?php echo $edit['tipo_usuario'] ?>">
                        <div class="input-field col s4">
                            <input required style="color:white;" name="telefone_usuario" id="telefone_usuario" value="<?php echo $edit["telefone_usuario"]?>" type="text" class="validate">
                            <label for="telefone_usuario">Telefone</label>
                        </div>
                        
                        <div class="input-field col s4">
                            <input required style="color:white;" name="senha_usuario" id="senha_usuario" type="password" class="validate">
                            <label for="senha_usuario">Senha</label>
                        </div>

                        <div class="input-field col s4">
                            <input required style="color:white;" name="senha_usuario2" id="senha_usuario2" type="password" class="validate">
                            <label for="senha_usuario2">Repetir Senha</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s4">
                            <input required style="color:white;" name="rua_usuario" id="rua_usuario" type="text" value="<?php echo $edit["rua_usuario"]?>" class="validate">
                            <label for="rua_usuario">Endereço</label>
                        </div>

                        <div class="input-field col s4">
                            <input required style="color:white;" name="bairro_usuario" id="bairro_usuario" type="text" value="<?php echo $edit["bairro_usuario"]?>" class="validate">
                            <label for="bairro_usuario">Bairro</label>
                        </div>


                        <div class="input-field col s1">
                            <input required style="color:white;" name="num_casa_usuario" id="num_casa_usuario" type="text" value="<?php echo $edit["num_casa_usuario"]?>" class="validate">
                            <label for="num_casa_usuario">Número</label>
                        </div>

                        <div class="input-field col s3">
                            <input style="color:white;" name="complemento_usuario" id="complemento_usuario" type="text" value="<?php echo $edit["complemento_usuario"]?>" class="validate">
                            <label for="complemento_usuario">Complemento</label>
                        </div>

                    </div>
                    <?php 
                        if($_SESSION['tipo']==2){
                    ?>
                    <div class="row">
                    
                        <div class="input-field col s12">
                            <select required name="especializacao_usuario" class="browser-default" name="especializacao" id="especializacao">
                                <option value="0">Nenhuma</option>
                                <option value="1">Retratos</option>
                                <option value="2">Comidas</option>
                                <option value="3">Animais</option>
                                <option value="4">Paisagens</option>
                                <option value="5">Eventos</option>
                            </select>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                    <div class="row white-text">
                        <div class="input-field col s6">
                            <select name="pergunta_usuario" required class="browser-default" name="pergunta" id="pergunta">
                                <option value="<?php echo $edit['pergunta_usuario'];?>"><?php if($edit['pergunta_usuario']==1){
                                        echo('Qual é o nome do seu animal de estimação?');
                                    }else if($edit['pergunta_usuario']==2){
                                        echo('Qual é sua comida preferida?');
                                    }else if($edit['pergunta_usuario']==3){
                                        echo('Qual é sua cor preferida?');
                                    }else if($edit['pergunta_usuario']==4){
                                        echo('Qual é seu filme preferido?');
                                    }else if($edit['pergunta_usuario']==5){
                                        echo('Qual é sua série preferida?');
                                    }?>
                                </option>
                                <option value="1">Qual é o nome do seu animal de estimação?</option>
                                <option value="2">Qual é sua comida preferida?</option>
                                <option value="3">Qual é sua cor preferida?</option>
                                <option value="4">Qual é seu filme preferido?</option>
                                <option value="5">Qual é sua série preferida?</option>
                            </select>
                        </div>
                        <div class="input-field col s6">
                            <input style="color:white;" name="resposta_usuario" id="resposta_usuario" type="text" value="<?php echo $edit["resposta_usuario"]?>" class="validate">
                            <label for="resposta_usuario">Resposta</label>
                        </div>
                    </div>
                    <div class="row">

                        <div class="input-field col s6">
                            <select required class="browser-default" name="uf_estado" id="estado">
                                <?php
                                    $sql_estado = "SELECT * FROM estado ORDER BY uf_estado";
                                    $estado = mysqli_query($conexao, $sql_estado);
	                                echo '<option value="'.$edit["uf_usuario"].'">'.$edit["uf_usuario"].'</option>';

                                    while ($con = mysqli_fetch_assoc($estado)) {
                                        echo('<option data-id="'. $con['id_estado'].'" value="'.$con['uf_estado'].'">'.$con['uf_estado'].'</option>');
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="input-field col s6">
                            <select required class="browser-default" name="cidade_usuario" id="cidade">
                                <option value="<?php echo $edit['cidade_usuario']; ?>"><?php echo $edit['cidade_usuario']; ?></option>
                            </select>
                        </div>

                    </div>

                    <div class="center">
                        <input id="editar" name="editar" value="Editar" type="submit">
                    </div>
                </form>
                <br>
            </div>
            <?php
            }
            include 'includes/footer.php';
            include 'includes/script.php';
        ?>
        <script>
            $('form#edit').on('submit', function(e) {
                e.preventDefault();
                var data = getFormData($(e.target));
                $.post('./api/editar.php', data, function(booleano) {
                    if (booleano) {
                        Swal.fire({
                            title: "Editado com sucesso!",
                            text: "A sua conta foi editada",
                            type: "success"
                        }).then(() => {
                            var tipo = $('#tipo').data('tipo');
                            if(tipo == 1) window.location.href = "./perfil_consumidor.php";  
                            else window.location.href= "./perfil_fotografo.php";
                        })
                    } else {    
                        Swal.fire({
                            title: "Desculpe, mas houve um erro!",
                            text: ":c",
                            type: "error"
                        })
                    }
                });
            })

            $('#estado').on('change', function(e) {
                var $cidadesOption = (nome, cidade) => `<option value="${nome}">${cidade}</option>`;
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

            $(document).ready(function() {
                $('select').formSelect();
            });

        </script>
    </body>

</html>

