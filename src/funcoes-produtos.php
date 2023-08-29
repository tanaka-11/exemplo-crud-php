<?php
require_once "conecta.php";

function lerProdutos(PDO $conexao):array {
    $sql = "SELECT 
    produtos.id, 
    produtos.nomeProduto,
    produtos.preco,
    produtos.estoque,
    fabricantes.nomeFabricante
    FROM produtos INNER JOIN fabricantes
    ON produtos.fabricante_id = fabricantes.id 
    ORDER BY id";

    try {
        $consulta = $conexao -> prepare($sql);
        $consulta -> execute();
        $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar produtos: ".$erro->getMessage());
    }
    return $resultado;
}