<!DOCTYPE html>
<html lang="en">
<head>
  <title>Listagem de Livros</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    body {
      background-color: #F5F5F5;
      font-family: Arial, sans-serif;
    }
    
    .container {
      margin-top: 30px;
      margin-bottom: 30px;
    }
    
    h2 {
      color: #333;
    }
    
    table {
      border-collapse: collapse;
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
    }
    
    th, td {
      text-align: left;
      padding: 12px;
    }
    
    th {
      background-color: #333;
      color: #fff;
    }
    
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    
    a {
      text-decoration: none;
    }
    
    .material-icons {
      font-size: 18px;
      vertical-align: middle;
      margin-right: 5px;
    }
    
    img {
      max-width: 100%;
      height: auto;
    }
    
    p {
      margin-top: 20px;
    }
    
    a.logout {
      color: #f44336;
    }
  </style>
</head>

<body>

<div class="container">

  <a href='cadastrar-livro.html'>
    <span class="material-icons">
    add_box</span> 
    Adicionar um novo livro
  </a>
</div>

<div class="container">
  <br>
  <h2>Listagem dos livros cadastrados</h2>
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>Nome do livro</th>
        <th>Autor</th>
        <th>Preço</th>
        <th>Imagem do livro</th>
        <th>Editar</th>
        <th>Apagar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include 'conecta.php';

      $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
      $autor = mysqli_real_escape_string($conexao, trim($_POST['autor']));
      $preco = mysqli_real_escape_string($conexao, trim($_POST['preco']));
      $imagem = mysqli_fetch_assoc(mysqli_query($conexao, $sql));


      $arquivo = $_FILES['imagem']; 
      $novo_nome = md5(time()) . $extensao; 
      $diretorio = "upload/".$novo_nome ; 

      $sql = "INSERT INTO livros (nome, autor, preco, imagem) VALUES ('$nome', '$autor', '$preco', '$novo_nome')";
     
      if (mysqli_query($conexao, $sql)) {
        move_uploaded_file($arquivo['tmp_name'], $diretorio);
        unlink("upload/".$imagem['imagem']);
        echo "<script>
                alert('Inserido!');
                window.location.href='lista_livro.php';
            </script>";
      } else {
          echo "<script>
                  alert('Não Inserido!');
                  window.location.href='lista_livro.php';
              </script>";
      }
    
      ?>
    </tbody>
  </table>
  <p>Deseja fazer logout? Clique aqui! <a class="logout
