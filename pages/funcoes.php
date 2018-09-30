<?php
include_once 'conexao.php';

function buscar($nome, $tabela){
    if ($tabela ==='personagem'){
        $campo = 'name';
    } else {
        $campo = 'title';
    }

    $sql = "SELECT * FROM '$tabela' WHERE '$campo' = '$nome'";
    /*$result = $conn->query($sql);
    if ($result->num_rows > 0) {

    }*/

}