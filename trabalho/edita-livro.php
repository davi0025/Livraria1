<?php 
session_start();
if(!isset($_SESSION['usuario'])){
        echo "<script>
        alert('Você não está logado, para editar um livro faça login ou cadastre-se!');
        window.location.href='login.php';
        </script>";
    }else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edição de Livros</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        h3 {
            margin-bottom: 30px;
        }
        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        input[type="file"] {
            padding-top: 5px;
        }
    </style>
</head>

<body>
    <?php

    if (isset($_GET['id'])) {
        include 'conecta.php';
        $sql = "SELECT id, nome, autor, preco, imagem FROM livros where id = $_GET[id]";
        $livro = mysqli_fetch_assoc(mysqli_query($conexao, $sql));
    }
    else{
    echo"<script>
                alert('Não foi passado nenhum id,é necessário criar!');
                window.location.href='../cadastrar_livro.php';
            </script>";
        }
    ?>
    <div class="container">
        <h3>Edição dos dados do livro</h3>
        <?php
        echo "<form method='POST' action='../atualiza_livro.php/?id=$livro[id]' enctype='multipart/form-data'>";
        ?>
            <div class="form-group">
                <label for="pwd">Nome:</label>
                <?php
                echo "<input type='text' class='form-control' name='nome' value='$livro[nome]' required>";
                ?>
            </div>
            <div class="form-group">
                <label for="pwd">Autor:</label>
                <?php
                echo "<input type='text' class='form-control' name='autor' value='$livro[autor]' required>";
                ?>         
            </div>
            <div class="form-group">
                <label for="pwd">Preço:</label>
                <?php
                echo "<input type='number' class='form-control' name='preco' value='$livro[preco]' required>";
                ?>
            </div>

            <div class="form-group">
                <label for="pwd">Imagem:</label>
                <input type="file" class="form-control" name="imagem" required>
            </div>
            <input class='btn btn-secondary' type="reset" value="Limpar">
            <input class='btn btn-primary' type="submit" name="submit" value="Enviar">
        </form>

    </div>
</body>

</html>
<?php
    }
?>
