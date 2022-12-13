

<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='tsylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="brand"><img src="img/logo.png" height="50" width="50" /></a>
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Loja</a>
            
            <div class="container">
                
          <button  class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> <a href="index.php"> </a>
          </button>
        
        </div>
      </nav>
      </html>



</head>




<body class="container-fluid ">
    
<?php
session_start();
include('conn.php');
if (isset($_POST['registrar'])) {
  $connection = DB::getInstance();
  $nome = $_POST['nome'];
  $categoria = $_POST['categoria'];
  $descricao = $_POST['descricao'];
  $valor = $_POST['valor'];
  $imagem = $_POST['imagem'];
  $estoque = $_POST['estoque'];
  $query = $connection->prepare("SELECT * FROM produtos WHERE nome=:nome");
  $query->bindParam("nome", $nome, PDO::PARAM_STR);
  $query->execute();
  if ($query->rowCount() > 0) {
    echo '<p class="alert alert-warning text-center error">nome já resgistrado!</p>';
  }
  if ($query->rowCount() == 0) {
    $query = $connection->prepare("INSERT INTO produtos(id,nome,id_categoria,descricao,valor,imagem,estoque) VALUES (null,:nome,:categoria,:descricao,:valor,:imagem,:estoque)");
    $query->bindParam("nome", $nome, PDO::PARAM_STR);
    $query->bindParam("categoria", $categoria, PDO::PARAM_STR);
    $query->bindParam("descricao", $descricao, PDO::PARAM_STR);
    $query->bindParam("valor", $valor, PDO::PARAM_INT);
    $query->bindParam("imagem", $imagem, PDO::PARAM_STR);
    $query->bindParam("estoque", $estoque, PDO::PARAM_INT);
    $result = $query->execute();
    if ($result) {
      echo '<p class="alert alert-info text-center success">Registrado com sucesso!</p>';
    } else {
      echo '<p class="alert alert-warning text-center error">Algo deu errado!</p>';
    }
  }
}
?>

  <h1 style="text-align: center;">Registrar Item</h1>


  <form class="container w-25 p-3" method="post" name="signup-form" enctype="multipart/form-data" action="inseririmg.php">

    <div class="form-outline mb-4">
    <label class="form-label" for="form2Example1">Nome</label>
      <input type="text" name="nome" class="form-control" />
    </div>
    <div class="form-outline mb-4">
    <label class="form-label" for="form2Example1">categoria</label>
      <input type="text" name="categoria" class="form-control" />
    </div>

    <div class="form-outline mb-4">
      <label class="form-label" for="form2Example1">descricao</label>
      <input type="text" name="descricao" class="form-control" />
    </div>

    <div class="form-outline mb-4">
      <label class="form-label" for="form2Example1">valor</label>
      <input type="number" name="valor" class="form-control" />
    </div>

    <div class="form-outline mb-4">
        <label for='FOTOA'>Selecione uma imagem:</label>
        <input name="FOTOA" id='FOTOA'type="file"/>
        <br>
    </div>

  <div class="form-outline mb-4">
      <label class="form-label" for="form2Example2">estoque</label>
      <input type="number" name="estoque" class="form-control" />
    </div>
    <div class="row mb-4">
      <div class="col d-flex justify-content-center">
      </div>

      <button class="btn btn-success btn-block mb-4" type="submit" name="registrar" value="registrar" >Register</button>

    
  </form>


</body>

</html>