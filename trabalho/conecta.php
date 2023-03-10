<?php
// Create connection
$conexao = mysqli_connect("localhost", "root", "", "banco_livros");
// Check connection
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

?>