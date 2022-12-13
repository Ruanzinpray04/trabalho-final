<?php
$nome        = $_POST['nome'];
$categoria   = $_POST['categoria'];
$descricao   = $_POST['descricao'];
$valor       = $_POST['valor'];
$estoque     = $_POST['estoque'];

include 'conn.php';
$arquivo_nome ="";
if(isset($_FILES["FOTOA"])){
    $arquivo = $_FILES["FOTOA"]["name"];

    $pasta_dir = "img/";

    $arquivo_nome = $pasta_dir . $arquivo;

        move_uploaded_file($_FILES["FOTOA"]['tmp_name'], $arquivo_nome);
}
$strcon = mysqli_connect('localhost','root','', 'db') or die('Erro ao conectar ao banco de dados');
$sql = "INSERT INTO produtos (nome, id_categoria, descricao, valor, imagem, estoque) VALUES ('$nome', '$categoria', '$descricao', '$valor', '$arquivo_nome', '$estoque')"; 
mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro" . mysqli_error($strcon));

mysqli_close($strcon);

?>

