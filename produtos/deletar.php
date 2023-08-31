<?php
require_once "../src/funcoes-produtos.php";
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$dadosDoProduto = lerUmProduto($conexao, $id);

require_once "../src/funcoes-fabricantes.php";
$idFabricante = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$listaDeFabricantes = lerFabricantes($conexao);

if(isset($_POST['deletar'])){
    deletarProduto($conexao, $id);
    header("location:visualizar.php?status=sucesso");
 } ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Produtos - Exclusão</title>

    <link rel="stylesheet" href="../css/exemplo-crud-php.css">

</head>

<body>
    <h1>Produtos | DELETE</h1>
    <h2>Tem certeza que deseja excluir o produto abaixo?</h2>
    <div class="center-inserir">
    <form action="#" method="post">
        <input type="hidden" name="id" value="<?=$dadosDoPorduto['id']?>">
        <p>
            <label for="nome">Nome Produto:</label>
            <input type="text" name="nomeProduto" id="nomeProduto" value="<?=$dadosDoProduto['nomeProduto']?>" disabled>
        </p>  

        <p>
            <label for="nome">Preço:</label>
            <input type="number" min="10" max="10000" step="0.01" name="preco" id="preco" value="<?=$dadosDoProduto['preco']?>" disabled>
        </p>
        
        <p>
            <label for="nome">Estoque:</label>
            <input type="number" min="1" max="100" name="estoque" id="estoque" value="<?=$dadosDoProduto['estoque']?>" disabled>
        </p>

        <p>
            <label for="descricao">Descrição:</label> <br>
            <textarea name="descricao" id="descricao" cols="30" rows="3" disabled><?=$dadosDoProduto['descricao']?></textarea>
        </p>
        
        <p>
            <label for="fabricante">Fabricante:</label>
            
            <select name="fabricante" id="fabricante" disabled>
    <?php foreach($listaDeFabricantes as $fabricante) {?>
            <option <?php if($dadosDoProduto['fabricante_id'] === $fabricante['id']) echo " selected ";?> 
            value="<?=$fabricante['id']?>"><?=$fabricante['nomeFabricante']?></option>    
    <?php } ?>
            </select>
        </p> 

    <button type="submit" name="deletar" class="deletar">Deletar Produto</button>
    

    <p class="center"><a href="./visualizar.php">Voltar</a></p>

</body>

</html>