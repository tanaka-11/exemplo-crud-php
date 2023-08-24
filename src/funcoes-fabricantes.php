<?php
// Importando o script de conexão via require_once onde ele garante que a importação é feita somente 1 vez.
require_once "conecta.php";

// Função para o SELECT na página visualizar.php
function lerFabricantes(PDO $conexao){
    $sql = "SELECT * FROM fabricantes ORDER BY nome";
    $conexao->prepare($sql); 
}