<?php
// Importando o script de conexão via require_once onde ele garante que a importação seja feita somente 1 vez.
require_once "conecta.php";

// Função para o SELECT na página visualizar.php
function lerFabricantes(PDO $conexao){
    // 1º Escrevendo o comando SQL.
    $sql = "SELECT * FROM fabricantes ORDER BY nomeFabricante";

    try {
        // 2º Preparando o comando SQL com o prepare() guardando-o numa variavel.
        $consulta = $conexao->prepare($sql); 

        // 3º Executando o comando SQL no banco de dados.
        $consulta->execute();

        // 4º Retornando resultados com o método fetchAll() onde ele vai buscar todos os dados da consulta como um array associativo.
        $resultado = $consulta->fetchALL(PDO::FETCH_ASSOC);
        
    } catch(Exception $erro) {
        die("Falha na conexão do servidor: ".$erro->getMessage());
    }
    
    return $resultado;
} 




// Função para adicionar fabricantes na página inserir.php
function inserirFabricantes(PDO $conexao, string $nomeFabricante){
    $sql = "INSERT INTO fabricantes(nomeFabricante) VALUES(:nome)";
    // VALUES(:qlqrcoisa) -> Indica um "named parameter" (Parâmetro nomeado)

    try {
        $consulta = $conexao -> prepare($sql);
        
        // bindValue -> Vincular valor no named parameter (:nomeFabricante), passando onde está o valor ($nomeFabricante) e seu tipo de dado (PDO::PARAM_STR) guardando tudo na variavel ($consulta).
        $consulta -> bindValue(":nome", $nomeFabricante, PDO::PARAM_STR);

        $consulta -> execute();

    } catch (Exception $erro) {
        die("Erro ao adicionar fabricante. Tente Novamente".$erro->getMessage());
    }
}

// Função para atualizar dados de fabricantes na página atualizar.php
function lerUmFabricante(PDO $conexao, INT $idFabricante){
    $sql = "SELECT * FROM fabricantes WHERE id = :id";
    try {
        $consulta = $conexao -> prepare($sql);
        $consulta -> bindValue(":id", $idFabricante, PDO::PARAM_INT);
        $consulta -> execute();
        $resultado = $consulta -> fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao atualizar fabricante. Tente Novamente".$erro->getMessage());
    }
    return $resultado;
}