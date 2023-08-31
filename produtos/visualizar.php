<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-utilitarias.php";

$listaDeProdutos = lerProdutos($conexao);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produtos - Visualização</title>

    <link rel="stylesheet" href="../css/exemplo-crud-php.css">

</head>
<body>
    <h1>Produtos | SELECT</h1>

    <div class="center">
    <p><a href="inserir.php">Cadastre novo produto</a></p>
    </div>

    <div class="produtos">
<?php foreach($listaDeProdutos as $produto){?>
    <article class="produto">

    <div class="fontProduto">
        <p><b>Nome do Produto : </b><?=$produto['nomeProduto']?></p>

        <p><b>Fabricante : </b><?=$produto['nomeFabricante']?></p>

        <p><b>Preço: </b><?=formatarPreco($produto['preco'])?></p>

        <p><b>Estoque : </b><?=$produto['estoque']?></p> 

        <p><b>Total em estoque : </b><?=formatarPreco($produto['total'])?></p>
    </div>

        <br>

        <p>
            <a class="editarProduto" href="atualizar.php?id=<?=$produto['id']?>">Editar</a> |
            <a class="excluir excluirProduto" href="deletar.php?id=<?=$produto['id']?>" >Excluir</a>
        </p>
        
    </article>
<?php } ?>
    </div>   

    <div class="center">
    <p><a href="../index.php">Voltar</a></p>
    </div>

    <script src="../js/confirma-exclusao.js"></script>
    <script src="../js/esconder-mensagem.js"></script>

</body>
</html>