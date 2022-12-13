<?php
require "funcoes.php";
session_start();
try {
    $s = new Funcoes();
    $s->setIdprod($_POST['botao']);
    $s->setIdUser($_SESSION['user_id']);
    json_encode($s);
    $s->addcar();
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}