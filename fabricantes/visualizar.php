<?php
// Importando as funções de manipulação.
require_once "../src/funcoes-fabricantes.php";

// Guardando o retorno dentro de uma variavel da função lerFabricantes.
$listaDeFabricantes = lerFabricantes($conexao);

// Contando quantos fabricantes tem no total
$quantidade = count($listaDeFabricantes);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fabricantes - Visualização</title>

    <link rel="stylesheet" href="../css/exemplo-crud-php.css">

    <script>

    </script>

</head>

<body>
    <h1>Fabricantes | SELECT</h1>
    <hr>
   
    <div class="center">
    <p><a href="inserir.php">Cadastre novo fabricante</a></p>
    </div>

<!-- Feedback para o usuário indicando que o processo deu certo -->

<?php 
if(isset($_GET["status"]) && $_GET["status"] === "sucesso"){ ?>
    <div id="mensagem-sucesso" class="mensagem-fabricante">
    <h3 id="mensagem-sucesso" class="center">A tabela de fabricantes foi modificada com sucesso!</h3>
    <button id="botao-sucesso" onclick="esconderMensagem()">Clique aqui para voltar.</button>
    </div>
<?php } ?>


    <table>
        <caption>
            <b>Lista de Fabricantes</b>
        </caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do Fabricante</th>
            <th>Operações</th>
        </tr>
    </thead>

<?php foreach($listaDeFabricantes as $listaDeFabricante) {  ?>
    
    <tr>
    <td><?=$listaDeFabricante['id']?></td>
    <td><?=$listaDeFabricante['nomeFabricante']?></td>
    <td>
        <a href="atualizar.php?id=<?=$listaDeFabricante['id']?>">Editar</a>

        <a class="excluir" href="deletar.php?id=<?=$listaDeFabricante['id']?>">Excluir</a>
    </td>
    </tr>

<?php } ?>    
    </table>    
    
    <div class="center">
    <p><a href="../index.php">Voltar</a></p>
    </div>

    <script src="../js/confirma-exclusao.js"></script>
    <script src="../js/esconder-mensagem.js"></script>

</body>
</html>