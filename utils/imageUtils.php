<?php
    function isUploadOk($imageFileType){
        $message = [];
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["imagem"]["tmp_name"]);
        if ($check !== false) {
            array_push($message, "File is an image - " . $check["mime"] . ".");
            $uploadOk = true;
        } else {
            array_push($message, "File is not an image.");
            $uploadOk = false;
        }

        // Check file size
        if ($_FILES["imagem"]["size"] > 5000000) {
            array_push($message, "Sorry, your file is too large.");
            $uploadOk = false;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            array_push($message, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            $uploadOk = false;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo json_encode(["messages" => $message]);
            // if everything is ok, try to upload file
        }

        return array("ok" => $uploadOk, "message" => $message);
    }

    function checkIfImageExists($conexao){
        $query = getImage($conexao);
        $count = mysqli_num_rows($query);
        return $count === 1 ? true : false;
    }

    function changeImage($conexao, $image){
        $imageExist = checkIfImageExists($conexao);
        if ($imageExist)
            return alterImage($conexao, $image);

        return uploadImage($conexao, $image);
    }


    function getImage($conexao){
        $user = "SELECT * FROM usuario_imagem where id_usuario=" . $_SESSION['id_usuario'] . ";";
        return mysqli_query($conexao, $user);
    }

    function alterImage($conexao, $image){
        $user = "UPDATE usuario_imagem SET nome_imagem = '$image' where id_usuario = " . $_SESSION['id_usuario'] . ';';
        $updated = mysqli_query($conexao, $user);
        return $updated;
    }

    function uploadImage($conexao, $image){
        $user = "INSERT INTO usuario_imagem(id_usuario, nome_imagem) values(" . $_SESSION['id_usuario'] . ", '$image');";
        $insert = mysqli_query($conexao, $user);
        return $insert;
    }
?>