<?php
require_once "conecta.php";

function lerProdutos(PDO $conexao):array {
    $sql = "SELECT 
    produtos.id, 
    produtos.nomeProduto,
    produtos.preco,
    produtos.estoque,
    fabricantes.nomeFabricante,
    -- Adicionado diretamente na função a multiplicação entre eles para aparecer o total.
    (produtos.preco * produtos.estoque) as total
    FROM produtos INNER JOIN fabricantes
    ON produtos.fabricante_id = fabricantes.id 
    ORDER BY nomeProduto";

    try {
        $consulta = $conexao -> prepare($sql);
        $consulta -> execute();
        $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar produtos: ".$erro->getMessage());
    }
    return $resultado;
}

function inserirProduto(PDO $conexao, 
string $nomeProduto, 
int $fabricanteID, 
float $preco, 
int $estoque, 
string $descricao):void {
    $sql = "INSERT INTO produtos ";
}
