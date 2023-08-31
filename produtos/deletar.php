<?php
require_once "../src/funcoes-produtos.php";
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


deletarProduto($conexao, $id);
header("location:visualizar.php?status=sucesso");