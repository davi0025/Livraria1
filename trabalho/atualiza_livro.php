<?php
include 'conecta.php';

if(isset($_POST['nome']))
{
    $sql = "SELECT imagem FROM livros where id = $_GET[id]";
    $imagem = mysqli_fetch_assoc(mysqli_query($conexao, $sql));

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $autor= mysqli_real_escape_string($conexao, trim($_POST['autor']));
    $preco = mysqli_real_escape_string($conexao, trim($_POST['preco']));

    $arquivo = $_FILES['imagem'];
    $extensao = strtolower(substr($arquivo['name'], -4)); 
    $novo_nome = md5(time()) . $extensao; 
    $diretorio = "upload/".$novo_nome ; 

    $sql = "UPDATE livros SET nome='$nome',autor='$autor',
        preco='$preco', imagem='$novo_nome' WHERE id='$_GET[id]'";
    
    if (mysqli_query($conexao, $sql)) {
        move_uploaded_file($arquivo['tmp_name'], $diretorio);
        unlink("upload/".$imagem['imagem']);
        echo"<script>
                alert('Os dados do livro foram atualizados!');
                window.location.href='../lista_livro.php';
            </script>";
    } else {
       echo"<script>
                alert('Erro ao atualizar os dados do livro!');
                window.location.href='../'edita-livro.php/?id=$_GET[id]';
            </script>";
    }
    mysqli_close($conexao);

}

?>
