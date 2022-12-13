<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel='stylesheet' type='text/css' media='screen' href='form.css'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

  <link rel="apple-touch-icon" sizes="180x180" href="img/aaaaaa/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/aaaaaa/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/aaaaaa/favicon-16x16.png">
  <link rel="manifest" href="img/aaaaaa/site.webmanifest">
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Home</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='main.js'></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel='stylesheet' type='text/css' media='screen' href='form.css'>
</head>

<body>
        
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="brand"><img src="img/logo.png" height="100" width="100" /></a>
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Loja</a>

      <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contate-nos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="carrinho.php">Carrinho</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Departamentos
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">aaa</a></li>
                <li><a class="dropdown-item" href="#">bbbbbbbb</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">ccccccccccccccc</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Entre / Cadastre-se</a>
          
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
            </li>
          </form>

        </div>
      </div>
  </nav>

  <div class="container">
        <div class="detalhes row mt-50">
            <div class="col">
                <?php
                include 'conn.php';
                $id = $_GET['id'];
                $connection = DB::getInstance();
                $dados = $connection->query("SELECT * from produtos where id=$id");
                $dados->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($dados as $d) {
                ?>
                    <img src="<?php echo $d['imagem'] ?>" width="600" height="560">
            </div>
            <div class="col mt-5">
                <a><?php echo $d['nome'] ?><br></a>
                <a class="fonte">Estoque: <?php echo $d['estoque'] ?> unidades<br></a>
                <div class="mt-5">
                    <a>A partir de R$ <?php echo $d['valor'] ?></a>
                    <a class='mt-5'></a><br>
                </div>
                <a><form action='lib/addcar.php' method="POST"><button type=submit name='botao' id='botao' value='<?php echo $d['id']?>'class="btn btn-success p-2 d-flex justify-content-center">Adicionar ao carrinho</button></form></a>
            <?php } ?>
            </div>
            <div class="desc mt-2">
                <a class='align-center'>Especificações:</a><br>
                <a class='textod'><?php echo $d['descricao'] ?></a>
            </div>
        </div>
    </div>

 
</body>