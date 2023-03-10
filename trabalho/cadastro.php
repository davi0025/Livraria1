<?php
include 'conecta.php';
if (isset($_POST['nome'])) {
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

    $sql = "SELECT senha from usuario where email = '{$email}'";
    
    $retorno = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($retorno) > 0) {
        echo "<script>
                alert('Já existe um cadastro com este email!');
                window.location.href='login.php';
            </script>";
    } else {
        $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha_criptografada')";

        if (mysqli_query($conexao, $sql)) {
            session_start();
            $_SESSION['usuario'] = $nome;
            echo "<script>
                    alert('Cadastro realizado!');
                    window.location.href='cadastrar-livro.html';
                </script>";
        } else {
            echo "<script>
                    alert('Erro ao realizar o cadastro!');
                    window.location.href='cadastro.html';
                </script>";
        }
    }
}

?>