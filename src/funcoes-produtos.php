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



function inserirProduto(PDO $conexao, string $nomeProduto, int $fabricanteID, float $preco, int $estoque, string $descricao):void {
    $sql = "INSERT INTO produtos (nomeProduto, fabricante_id ,preco, estoque, descricao) 
    VALUES (:nomeProduto, :fabricanteID, :preco, :estoque, :descricao)";
    try {
        $consulta = $conexao -> prepare($sql);

        $consulta -> bindValue(":nomeProduto", $nomeProduto, PDO::PARAM_STR);

        $consulta -> bindValue(":fabricanteID", $fabricanteID, PDO::PARAM_INT);
        
        // Utilizamos o parametro de string por ser mais abrangente e não existir um PARAM_FLOAT para numeros quebrados.
        $consulta -> bindValue(":preco", $preco, PDO::PARAM_STR);

        $consulta -> bindValue(":estoque", $estoque, PDO::PARAM_INT);

        $consulta -> bindValue(":descricao", $descricao, PDO::PARAM_STR);

        $consulta -> execute();
    } catch (Exception $erro) {
        die("Erro ao inserir produto: ".$erro->getMessage());
    }
}



function lerUmProduto(PDO $conexao, int $idProduto):array {
    $sql = "SELECT * FROM produtos WHERE id = :id";
    try {
        $consulta = $conexao -> prepare($sql);
        $consulta -> bindValue(":id", $idProduto, PDO::PARAM_INT);
        $consulta -> execute();
        $resultado = $consulta -> fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar dados do produto. Tente Novamente".$erro->getMessage());
    }
    return $resultado;
} 



function atualizarProduto(PDO $conexao, int $produtoID, string $nomeProduto, float $preco, int $estoque, string $descricao, int $fabricanteID):void {

};