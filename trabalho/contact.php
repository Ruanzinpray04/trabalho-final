<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link type="text/css" href="frontend/style.css" rel="stylesheet"/>
  <title>Cardapio RU</title>
</head>

<body class="container-fluid ">
  <div> <center> <img src="img/ivan99.jpg" height="400" width="400"  alt="..."> </center> </div>
  <form class="container w-25 p-3" method="post" align="center" action="form.php" id="contact-form">
    <h1 style="text-align: center;">Contato</h1>
    <div class="form-outline mb-4">
    <label class="form-label" for="form2Example1">Email</label>
      <input type="email" name="Body" placeholder="Ex: aaaa@gmail.com" class="form-control" />
    </div>


    <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Nome</label>
      <input type="text" name="assunto" placeholder="Ruan "class="form-control" />
    </div>

    <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Mensagem</label>
      <input type="text" name="mensagem" placeholder="fasfdsfdfdsdfsfdsfsdfsfdsfsdf "class="form-control" />
    </div>


    <div class="row mb-4">
      <div class="col d-flex justify-content-center">
      </div>



      <button type="submit" name="login" class="btn btn-success btn-block mb-4">Enviar</button>

  </form>

</body>

</html>