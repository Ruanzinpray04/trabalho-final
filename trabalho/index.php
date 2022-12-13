<!DOCTYPE html>
<html>

<head>

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
            <?php
            session_start();
            if(isset($_SESSION) AND $_SESSION['user-nome']=='administrador'){
            echo("<li class='nav-item'>
              <a class='nav-link' href='inserir.php'>Inserir</a>
            </li>");
            }
            ?>
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
  
  
  
  <div id="carouselExampleControls" calss="container-fluid" class="carousel slide "  data-bs-ride="carousel"> 
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/ram.jpg"  height="350" width="300"  alt="..." > 
      </div>
      <div class="carousel-item">
        <img src="img/img1.jpg" height="350" width="300"  alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/monitor.jpg" height="350" width="300"  alt="...">
      </div>
      <div class="carousel-item">
        <img src="Img/rx550.jpg" height="350" width="300" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/water.jpg" height="350" width="300"  alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-5">
            <?php
            include 'conn.php';
            $connection = DB::getInstance();
            $dados = $connection->query("SELECT * from produtos");
            $dados->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($dados as $d) {
            ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?php echo $d['imagem']; ?>" width="350" height="300" class="card-img-top">
                        <div class="card-body bg-transparent mb-2">
                            <h5 class="card-text text-center"><?php echo $d['nome']; ?></h5>
                        </div>
                        <div class="card-footer bg-transparent">
                            <h5 class="card-text text-center border-0">R$ <?php echo $d['valor']; ?></h5>
                            <a class="btn btn-info p-2 d-flex justify-content-center"  id="botao" href="produtos.php?id=<?php echo $d['id'] ?>">Mais detalhes</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div><br>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>
<footer class="bg-dark text-center text-white">

  <div class="container p-4 pb-0">

    <section class="">
      <form action="">

        <div class="row d-flex justify-content-center">

          <div class="col-auto">
            <p class="pt-2">
              <strong>Inscreva-se</strong>
            </p>
          </div>

          <div class="col-md-5 col-12">

            <div class="form-outline form-white mb-4">
              <input type="email" id="form5Example29" class="form-control" />
              <label class="form-label" for="form5Example29">Email</label>
            </div>
          </div>


          <div class="col-auto">

            <button type="submit" class="btn btn-outline-light mb-4">
              Inscreva-se
            </button>
          </div>

        </div>

      </form>
    </section>

  </div>




</footer>
</html>