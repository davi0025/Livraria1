<?php
include 'conecta.php';

$sql = "CREATE TABLE usuario (
    id INT (5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR (30) NOT NULL,
    email VARCHAR (50) NOT NULL,
    senha VARCHAR (100) NOT NULL
    )";
    

if (mysqli_query($conexao, $sql)) {
    echo "Tabela  criada com sucesso!";
} else {
    echo "Erro ao criar a tabela: " . mysqli_error($conexao) . "<br>";
}

?>