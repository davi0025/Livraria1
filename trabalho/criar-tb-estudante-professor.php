<?php
include 'conecta.php';

$sql = "CREATE TABLE estudante_professor (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    estudante_professor VARCHAR(30) NOT NULL,
    )";
   
if (mysqli_query($conexao, $sql)) {
    echo "Tabela criada com sucesso! <br>";

    $sql2 = "INSERT INTO estudante_professor values (
        'estudante', 'professor'
        )";
        if (mysqli_query($conexao, $sql)) {
            echo "Tabela criada com sucesso! <br>";
        }
} else {
    echo "Erro ao criar a tabela: " . mysqli_error($conexao) . "<br>";
}

?>