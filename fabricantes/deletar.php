<?php
require_once "../src/funcoes-fabricantes.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$dadosDoFabricante = lerUmFabricante($conexao, $id);

if(isset($_POST['deletar'])){
    deletarFabricante($conexao, $id);
    header("location:visualizar.php?status=sucesso");
 } ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Fabricantes - Exclusão</title>

    <link rel="stylesheet" href="../css/exemplo-crud-php.css">

</head>

<body>
    <h1>Fabricantes | DELETE</h1>
 <hr>

    <h2>Tem certeza que deseja excluir o fabricante abaixo?</h2>
    <div class="center-inserir">
    <form action="#" method="post">
        <input type="hidden" name="id" value="<?=$dadosDoFabricante['id']?>">

        <p>
            <label for="nomeFabricante">Nome do Fabricante:</label>
            <br>
            <input value="<?=$dadosDoFabricante['nomeFabricante']?>" type="text" name="nomeFabricante" id="nomeFabricante" disabled>
        </p>

    <button type="submit" name="deletar">Deletar Fabricante</button>

    </form>
    </div>

    <p class="center"><a href="./visualizar.php">Voltar</a></p>

</body>

</html>