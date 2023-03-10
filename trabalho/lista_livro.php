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
      $sql = "SELECT livros.id, livros.nome as nome, autor, preco, imagem FROM livros" ;
      $resultado = mysqli_query($conexao, $sql);
     
      while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>$row[nome]</td>";
        echo "<td>$row[autor]</td>";
        echo "<td>R$$row[preco],00</td>";
        echo "<td><img src='upload/$row[imagem]' alt='upload/$row[imagem].jpg'></td>";
        echo "<td><a href='edita-livro.php/?id=$row[id]'><span class='material-icons'>edit</span></a></td>";
        echo "<td><a href='apaga_livro.php/?id=$row[id]'><span class='material-icons'>delete</span></td>";
        echo "</tr>";
      }
    
      $sql2 = "SELECT estudante_professor FROM estudante_professor" ;
      $resultado2 = mysqli_query($conexao, $sql2);

        echo "<select name='estudante_professor'>";
        while ($row = mysqli_fetch_assoc($resultado2)) {
          echo "<option value='$row[estudante_professor]'>$row[estudante_professor]</option>";
        }
        echo "<select>";
      
      ?>
    </tbody>
  </table>
  <p>Deseja fazer logout? Clique aqui! <a class="logout
