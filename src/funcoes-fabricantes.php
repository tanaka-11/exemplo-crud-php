<?php
// Importando o script de conexão via require_once onde ele garante que a importação seja feita somente 1 vez.
require_once "conecta.php";

// Função para o SELECT na página visualizar.php
function lerFabricantes(PDO $conexao){
    // 1º Escrevendo o comando SQL.
    $sql = "SELECT * FROM fabricantes ORDER BY nomeFabricante";

    // 2º Preparando o comando SQL com o prepare() guardando-o numa variavel.
    $consulta = $conexao->prepare($sql); 

    // 3º Executando o comando SQL no banco de dados.
    $consulta->execute();

    // 4º Retornando resultados com o método fetchAll() onde ele vai buscar todos os dados da consulta como um array associativo.
    $resultado = $consulta->fetchALL(PDO::FETCH_ASSOC);
    return $resultado;
}

// Teste
$dados = lerFabricantes($conexao);
var_dump($dados);