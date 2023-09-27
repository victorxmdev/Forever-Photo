<?php
    include '../includes/conexao.php';

    function utf8ize($d) {
        if (is_array($d)) {
            foreach ($d as $k => $v) {
                $d[$k] = utf8ize($v);
            }
        } else if (is_string ($d)) {
            return utf8_encode($d);
        }
        return $d;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {        
        $id = $_GET['id'];
        $arr = [];
        $sql_cidade = "SELECT * FROM cidade WHERE estado_cidade=$id ORDER BY nome_cidade ;";
        $cidade = mysqli_query($conexao, $sql_cidade);
        while($con = mysqli_fetch_assoc($cidade)){
            array_push($arr, $con);
        }

        echo(json_encode(utf8ize($arr)));
    }
?>