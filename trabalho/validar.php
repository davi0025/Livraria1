<?php
include 'conecta.php';

    if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));


    $sql = "SELECT senha, nome from usuario where email = '{$email}'";

    $retorno = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($retorno);
    
    if (mysqli_num_rows($retorno) == 1) {
        if (password_verify($senha, $dados['senha'])) {
            session_start();
            $_SESSION['usuario']= $dados['nome'];
            echo "<script>
                    alert('Login realizado!');
                    window.location.href='cadastrar-livro.html'
                </script>";
               
        } else {
            echo "<script>
                    alert('Senha incorreta!');
                    window.location.href='login.php'
                </script>";
        }
    } else {
        echo "<script>
                alert('Email não encontrado!');
                window.location.href='login.php'
            </script>";
    }
}


?>