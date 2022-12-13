<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo '<script type="text/javascript">';
    echo 'alert("Login necessário");';
    echo 'window.location.href = "login.php";';
    echo '</script>';
    exit;
}
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="style4.css" rel="stylesheet" type="text/css" />
    <script src="script.js" type="text/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="images/guia.png">
</head>

<body class="fundo">
   

    <div class="tabela2 container container-fluid position-static">
        <table id='finaliza' class='table rounded mt-50 bg-light'>
            <thead>
                <tr>
                    <th scope='col'>Produto</th>
                    <th scope='col'>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'lib/conn.php';
                $userid = $_SESSION['user_id'];
                $connection = DB::getInstance();
                $dados = $connection->query("SELECT produtos.nome, produtos.valor, carrinho.id_prod FROM produtos INNER JOIN carrinho ON carrinho.id_prod = produtos.id WHERE id_user=$userid");
                $dados->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($dados as $d) {
                ?>
                    <tr>
                        <td class="align-middle"><?php echo $d['nome']; ?></td>
                        <td>R$<?php echo $d['valor']; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <?php
                    $dados2 = $connection->query("SELECT SUM(produtos.valor) as preco FROM produtos INNER JOIN carrinho ON carrinho.id_prod = produtos.id WHERE id_user=$userid");
                    $dados2->setFetchMode(PDO::FETCH_ASSOC);
                    $dadosf = $dados2->fetchAll();
                    foreach ($dadosf as $valor) {
                    ?>
                        <th scope="">Total mais frete(R$30): R$<?php echo round($valor['preco']+30 , 2); ?>
                            <form action='index.php' method="POST" onchange="myFunction();">
                            <input type='hidden' value='<?php echo $valor['preco']+30; ?>' name='vt'>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="paga" name="paga" value="1">
                                    <label class="form-check-label" for="boleto">Pix</label><br>
                                </div>
                                <button type='submit' name='ff' id='ff' class='btn p-1 btn-success'>Comprar</button>

                            </form>
                        </th>
                    <?php } ?>
                </tr>
            </tfoot>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </div>
</body>

</html>
