<?php

$conexao = mysqli_connect("localhost", "root");

if (!$conexao) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "CREATE DATABASE banco_livros";
if (mysqli_query($conexao, $sql)) {
    echo "Banco de dados criado!";
} else {
    echo "Erro: " . mysqli_error($conexao);
}
mysqli_close($conexao);
?>