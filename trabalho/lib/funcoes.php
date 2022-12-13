<?php
require "conn.php";
class Funcoes
{
    private $id = "";
    private $iduser = "";
    private $IdProd = "";
    private $idcat = '';
    private $nome = '';
    private $valor = '';
    private $descricao = '';
    private $imagem = '';
    private $estoque = '';
    private $vt = '';

    function __toString()
    {
        return json_encode([
            "id" => $this->id,
            "iduser" => $this->iduser,
            "IdProd" => $this->IdProd,
            "idcat" => $this->idcat,
            "nome" => $this->nome,
            "valor" => $this->valor,
            "descricao" => $this->descricao,
            "imagem" => $this->imagem,
            "estoque" => $this->estoque,
            "vt" => $this->vt
        ]);
    }

    function setid($v)
    {
        $this->id = $v;
    }
    function setestoque($v)
    {
        $this->estoque = $v;
    }
    function setimagem($v)
    {
        $this->imagem = $v;
    }
    function setdescricao($v)
    {
        $this->descricao = $v;
    }
    function setvalor($v)
    {
        $this->valor = $v;
    }
    function setnome($v)
    {
        $this->nome = $v;
    }
    function setidcat($v)
    {
        $this->idcat = $v;
    }
    function setIdUser($v)
    {
        $this->iduser = $v;
    }
    function setIdProd($v)
    {
        $this->IdProd = $v;
    }
    function setPrevisao($v)
    {
        $this->previsao = $v;
    }
    function setConclusao($v)
    {
        $this->conclusao = $v;
    }
    function setvt($v)
    {
        $this->vt = $v;
    }

    function addcar()
    {
        $connection = DB::getInstance();
        try {

            $consulta = $connection->prepare("START TRANSACTION;");
            $consulta->execute();
            $consulta = $connection->prepare("INSERT INTO carrinho VALUES (:id, :iduser, :idprod)");
            $consulta->execute([
                ':id' => $this->id,
                ':iduser' => $this->iduser,
                ':idprod' => $this->IdProd
            ]);
            $consulta = $connection->prepare("COMMIT;");
            $consulta->execute();
            header('Location: ../index.php');
        } catch (Exception $e) {
            $consulta = $connection->prepare("ROLLBACK;");
            $consulta->execute();
            die($e->getMessage());
        }
    }

    function delcar()
    {
        $connection = DB::getInstance();
        try {
            $consulta = $connection->prepare("START TRANSACTION;");
            $consulta->execute();
            $consulta = $connection->prepare("DELETE FROM carrinho WHERE id_user=:iduser and id_prod = :idprod LIMIT 1;");
            $consulta->execute([
                ':idprod' => $this->idprod,
                ':iduser' => $this->iduser
            ]);
            $consulta = $connection->prepare("COMMIT;");
            $consulta->execute();
            header('Location: ../carrinho.php');
        } catch (Exception $e) {
            $consulta = $connection->prepare("ROLLBACK;");
            $consulta->execute();
            die($e->getMessage());
        }
    }

    function addprod()
    {
        $connection = DB::getInstance();
        try {

            $consulta = $connection->prepare("START TRANSACTION;");
            $consulta->execute();
            $consulta = $connection->prepare("INSERT INTO produtos VALUES (:id, :idcat, :nome, :valor, :descricao, :imagem, :estoque)");
            $consulta->execute([
                ':id' => $this->id,
                ':idcat' => $this->idcat,
                ':nome' => $this->nome,
                ':valor' => $this->valor,
                ':descricao' => $this->descricao,
                ':imagem' => $this->imagem,
                ':estoque' => $this->estoque
            ]);
            $consulta = $connection->prepare("COMMIT;");
            $consulta->execute();
            header('Location: ../admin.php');
        } catch (Exception $e) {
            $consulta = $connection->prepare("ROLLBACK;");
            $consulta->execute();
            die($e->getMessage());
        }
    }

    function addpedido()
    {
        $connection = DB::getInstance();
        try {
            $consulta = $connection->prepare("START TRANSACTION;");
            $consulta->execute();

            $consulta = $connection->prepare("SELECT ID_PROD, COUNT(id_prod) as quantidade FROM carrinho WHERE id_user=:iduser GROUP BY ID_PROD;");
            $dados = $consulta->execute([
                ':iduser' => $this->iduser
            ]);
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $dados = $consulta->fetchall();
            foreach ($dados as $dado) {
                $q = $dado['quantidade'];
                $p = $dado['ID_PROD'];
                $consulta = $connection->prepare("UPDATE produtos SET estoque=estoque-$q WHERE id=$p");
                $consulta->execute();
            }
            $data = date('Y-m-d');
            $consulta = $connection->prepare("INSERT INTO pedidos VALUES (null, :iduser, '$data', :vt)");
            $consulta->execute([
                ':iduser' => $this->iduser,
                ':vt' => $this->vt
            ]);

            $consulta = $connection->prepare("DELETE FROM carrinho WHERE id_user=:iduser");
            $consulta->execute([
                ':iduser' => $this->iduser
            ]);

            $consulta = $connection->prepare("COMMIT;");
            $consulta->execute();
            header('Location: ../index.php');
        } catch (Exception $e) {
            $consulta = $connection->prepare("ROLLBACK;");
            $consulta->execute();
            die($e->getMessage());
        }
    }
}

function delcar()
{
    $connection = DB::getInstance();
    try {
        $consulta = $connection->prepare("START TRANSACTION;");
        $consulta->execute();
        $consulta = $connection->prepare("DELETE FROM carrinho WHERE id_user=:iduser and id_prod = :idprod LIMIT 1;");
        $consulta->execute([
            ':idprod' => $this->idprod,
            ':iduser' => $this->iduser
        ]);
        $consulta = $connection->prepare("COMMIT;");
        $consulta->execute();
        header('Location: ../carrinho.php');
    } catch (Exception $e) {
        $consulta = $connection->prepare("ROLLBACK;");
        $consulta->execute();
        die($e->getMessage());
    }
}