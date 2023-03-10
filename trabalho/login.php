<?php
session_Start();
if (isset($_SESSION['usuario'])){
    echo "<script>
    alert('Usuário já logado!');
    window.location.href='cadastrar-livro.html';
    </script>";

}else{


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>

<body>
    

  <div class="container">
  
    <h1>Olá, seja muito bem vindo ao UseLivros!  </h1>
    <p> Esse espaço é destinado para pessoas que querem vender seus livros novos, usados ou seminovos! Faça login para entrar e, 
        caso não seja cadastrado, clique aqui! <a href="cadastro.html">CADASTRO</a> </p>
     
  <h2>Login</h2>
    <form action="validar.php" method="POST">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" id="senha" name="senha" required>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
    </form>

  </div>

</body>

</html>
<?php
}
?>

