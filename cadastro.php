<!DOCTYPE html>
<html>

    <head>
        <?php include 'includes/head.php'; include 'includes/conexao.php'; ?>
        <title>Cadastro -- 4Ever Photo</title>
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
        <h2 class="center white-text ">Cadastro</h2>
        <br>

        <div class="row container">
            <form class="col s12" method="POST" id="cadastrar" action=<?php htmlspecialchars($_SERVER[ "PHP_SELF"]) ?>>
                <div class="row">
                    <div class="input-field col s3">
                        <input name="nome_usuario" style="color:#FFF;" id="nome_usuario" type="text" pattern="^([A-Z]|[a-z]|[ ]|[ã]|[Ã]|[á]|[Á]|[õ]|[Õ]|[ó]|[Ó]|[é]|[É]|[ê]|[Ê]|[í]|[ç])+$" class="validate">
                        <label for="nome_usuario">Nome</label>
                    </div>

                    <div class="input-field col s3">
                        <input name="sobrenome_usuario" style="color:#FFF;" id="sobrenome_usuario" type="text" pattern="^([A-Z]|[a-z]|[ ]|[ã]|[Ã]|[á]|[Á]|[õ]|[Õ]|[ó]|[Ó]|[é]|[É]|[ê]|[Ê]|[í]|[ç])+$" class="validate">
                        <label for="sobrenome_usuario">Sobrenome</label>
                    </div>

                    <div class="input-field col s3">
                        <input name="nmuser_usuario" style="color:#FFF;" id="nmuser_usuario" type="text" class="validate">
                        <label for="nmuser_usuario">Nome de Usuário</label>
                    </div>

                    <div class="input-field col s3">
                        <input name="cpf_usuario" style="color:#FFF;" id="cpf_usuario" type="text" class="validate">
                        <label for="cpf_usuario">CPF</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s4">
                        <input name="rua_usuario" style="color:#FFF;" id="rua_usuario" type="text" class="validate">
                        <label for="rua_usuario">Endereço</label>
                    </div>

                    <div class="input-field col s4">
                        <input name="bairro_usuario" style="color:#FFF;" id="bairro_usuario" type="text" class="validate">
                        <label for="bairro_usuario">Bairro</label>
                    </div>


                    <div class="input-field col s1">
                        <input name="num_casa_usuario" style="color:#FFF;" onkeyup="somenteNumeros(this);" id="num_casa_usuario" type="text" class="validate">
                        <label for="num_casa_usuario">Número</label>
                    </div>

                    <div class="input-field col s3">
                        <input name="complemento_usuario" style="color:#FFF;" id="complemento_usuario" type="text" class="validate">
                        <label for="complemento_usuario">Complemento</label>
                    </div>

                </div>

                <div class="row">
                    
                    <div class="input-field col s6">
                        <select class="browser-default" name="uf_estado" id="estado">
                            <option value="">Escolha o estado</option>
                            <?php
                                $sql_estado = "SELECT * FROM estado ORDER BY uf_estado";
                                $estado = mysqli_query($conexao, $sql_estado);
                                while ($con = mysqli_fetch_assoc($estado)) {
                                    echo('<option data-id="'. $con['id_estado'].'" value="'.$con['uf_estado'].'">'.$con['uf_estado'].'</option>');
                                }
                            ?>
                        </select>
                    </div>

                    <div class="input-field col s6">
                        <select class="browser-default" name="cidade_usuario" id="cidade">
                            <option value="">Escolha a cidade</option>
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s5">
                        <input name="telefone_usuario" style="color:#FFF;" id="telefone_usuario" type="text" class="validate" pattern="\([0-9])+$">
                        <label for="telefone_usuario">Telefone</label>
                    </div>
                    <div class="input-field col s7">
                        <input name="email_usuario" style="color:#FFF;" id="email_usuario" type="email" class="validate">
                        <label for="email_usuario">Email</label>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input name="senha_usuario" id="senha_usuario" style="color:#FFF;" type="password" class="validate">
                        <label for="senha_usuario">Senha</label>
                    </div>

                    <div class="input-field col s6">
                        <input name="senha_usuario2" id="senha_usuario2" type="password" style="color:#FFF;" class="validate">
                        <label for="senha_usuario2">Repetir Senha</label>
                    </div>
                </div>

                <div class="row white-text">
                    Se cadastrar como
                    <select name="tipo_usuario" class="browser-default" name="tipo" id="tipo">
                        <option value="1">Consumidor</option>
                        <option value="2">Fotógrafo</option>
                    </select>
                </div>
                <div class="center">
                    <input id="cadastrar" name="cadastrar" value="Cadastrar" type="submit">
                </div>
            </form>
            <br>
        </div>
        <?php
            include 'includes/footer.php';
            include 'includes/script.php';
        ?>
        <script>
            $('form#cadastrar').on('submit', function(e) {
                e.preventDefault();
                var data = getFormData($(e.target));
                $.post('./api/cadastro.php', data, function(res) {
                    var dataJSON = JSON.parse(res);
                    if (dataJSON.register == true) {
                        Swal.fire({
                            title: "Cadastrado com sucesso!",
                            text: "A sua conta foi registrada",
                            type: "success"
                        }).then(() => window.location.href = "./pergunta.php")
                    } else {
                        Swal.fire({
                            title: "Desculpe, mas houve um erro!",
                            text: "Erro: " + dataJSON.message,
                            type: "error"
                        })
                    }
                })
            })

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

            $(document).ready(function() {
                $('select').formSelect();
            });

        </script>
    </body>

</html>
