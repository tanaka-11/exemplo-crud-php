<?php
require_once "../src/funcoes-fabricantes.php";
require_once "../src/funcoes-produtos.php";

$listaDeFabricantes = lerFabricantes($conexao);

if(isset($_POST['inserir'])){
    // Passamos entre as aspas o valor de dentro do "name" dos input.
    $nomeProduto = filter_input(INPUT_POST, "nomeProduto", FILTER_SANITIZE_SPECIAL_CHARS);

    $fabricanteID = filter_input(INPUT_POST, "fabricante", FILTER_SANITIZE_NUMBER_INT);

    $preco = filter_input(INPUT_POST, "preco", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    $estoque = filter_input(INPUT_POST, "estoque", FILTER_SANITIZE_NUMBER_INT);

    $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);

    inserirProduto($conexao, $nomeProduto, $fabricanteID, $preco, $estoque, $descricao);

    header("location:visualizar.php?status=sucesso");
}

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
                <option value="<?=$fabricante['id']?>"><?=$fabricante['nomeFabricante']?></option>
                <?php } ?>
                
            </select>
        </p>  

    <button type="submit" name="inserir">Enviar Produto</button>
    </form>
    </div>

    <p class="center"><a href="./visualizar.php">Voltar</a></p>

</body>
</html>    