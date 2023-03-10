<?php
include 'conecta.php';
session_start();
if(!isset($_SESSION['usuario'])){
    echo "<script>
    alert('Você não está logado, para apagar um livro faça login ou cadastre-se!');
    window.location.href='login.php';
    </script>";
}else {
if (isset($_GET['id'])) {
    $sql = "SELECT imagem FROM livros where id = $_GET[id]";
    $imagem = mysqli_fetch_assoc(mysqli_query($conexao, $sql));

    $sql = "Delete FROM livros WHERE id='$_GET[id]'";
    if (mysqli_query($conexao, $sql)) {
        unlink("upload/".$imagem['imagem']);
        echo "<script>
                alert('Os dados do livro foram apagados!');
                window.location.href='../lista_livro.php';
            </script>";
    } else {
        echo "<script>
                alert('Erro ao apagar dados do livro!');
                window.location.href='../lista_livro.php';
            </script>";
    }
}
    mysqli_close($conexao);
}

?>