<?php
include 'conecta.php';

$sql = "CREATE TABLE livros (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    autor VARCHAR(30),
    preco VARCHAR(5),
    imagem VARCHAR(255)
    )";
   
if (mysqli_query($conexao, $sql)) {
    echo "Tabela criada com sucesso! <br>";
} else {
    echo "Erro ao criar a tabela: " . mysqli_error($conexao) . "<br>";
}

?>