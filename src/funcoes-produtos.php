<?php
require_once "conecta.php";

function lerProdutos(PDO $conexao):array {
    $sql = "SELECT nomeProduto, preco, estoque FROM produtos ORDER BY id";

    try {
        $consulta = $conexao -> prepare($sql);
        $consulta -> execute();
        $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar produtos: ".$erro->getMessage());
    }
    return $resultado;
}