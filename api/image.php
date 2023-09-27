<?php
    include '../includes/conexao.php';
    include '../utils/imageUtils.php';
    include './authorize.php';

    isUserAuthorize();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $response = [];
        $target_dir = "../uploads/";
        if (empty($_FILES)) {
            http_response_code(400);
            echo json_encode(["message" => "Insira o campo 'imagem'"]);
            die;
        }
        $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = isUploadOk($imageFileType);

        if ($uploadOk['ok']) {
            if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
                $name = uniqid("image-" . rand()) . "." . $imageFileType;
                $nameDir =  $target_dir . $name;
                $renamed = rename($target_file, $nameDir);
                if ($renamed) {
                    $uploaded = changeImage($conexao, $name);
                    if($uploaded){
                        array_push($response, $name);
                        echo json_encode($response[0]);
                        die;
                    }
                    array_push($response, "falha ao inserir/editar imagem no banco, erro:
                    ] " . mysqli_error($conexao) );
                    echo json_encode(["message" => $response]);
                } else {
                    http_response_code(400);
                    array_push($response, "The file has not been uploaded");
                    echo json_encode(["message" => $response]);
                }
            } else {
                http_response_code(400);
                array_push($response, "The file doesn't upload");
                echo json_encode(["message" => $response]);
            }
        } else {
            echo json_encode(["message" => $uploadOk["message"]]);
        }
    }

    // PEGAR FOTO
    if ($_SERVER['REQUEST_METHOD'] === "GET") { 
        $userImage = getImage($conexao);
        while($con = mysqli_fetch_array($userImage))
            echo json_encode(["image" => $con['nome_imagem']]);
    }

    // EDITAR FOTO
    if ($_SERVER['REQUEST_METHOD'] === "PUT" || $_SERVER['REQUEST_METHOD'] === "PATCH") { }
?>