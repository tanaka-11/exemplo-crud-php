<?php
require_once "../src/funcoes-fabricantes.php";

$listaDeFabricantes = lerFabricantes($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Produtos - Inserção</title>

    <link rel="stylesheet" href="../css/exemplo-crud-php.css">

</head>

<body>
    <h1>Produtos | INSERT</h1>

    <div class="center-inserir">
    <form action="#" method="post">
        <p>
            <label for="nome">Nome Produto:</label>
            <input type="text" name="nomeProduto" id="nomeProduto" required>
        </p>  

        <p>
            <label for="nome">Preço:</label>
            <input type="number" min="10" max="10000" step="0.01" name="preco" id="preco" required>
        </p>
        
        <p>
            <label for="nome">Estoque:</label>
            <input type="number" min="1" max="100" name="estoque" id="estoque" required>
        </p>

        <p>
            <label for="descricao">Descrição:</label> <br>
            <textarea name="descricao" id="descricao" cols="30" rows="3"></textarea>
        </p>
        
        <p>
            <label for="fabricante">Fabricante:</label>
            <br>
            <select name="fabricante" id="fabricante" required>
                <option value=""></option>

                <?php foreach ($listaDeFabricantes as $fabricante) { ?>
                <option value=""><?=$fabricante['nomeFabricante']?></option>
                <?php } ?>
                
            </select>
        </p>  

    <button type="submit" name="inserir">Enviar Produto</button>
    </form>
    </div>

    <p class="center"><a href="./visualizar.php">Voltar</a></p>

</body>
</html>    