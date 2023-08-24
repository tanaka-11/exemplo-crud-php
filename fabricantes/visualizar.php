<?php
// Importando as funções de manipulação.
require_once "../src/funcoes-fabricantes.php";

// Guardando o retorno dentro de uma variavel da função lerFabricantes.
$listaDeFabricantes = lerFabricantes($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fabricantes - Visualização</title>

    <link rel="stylesheet" href="../css/exemplo-crud-php.css">

</head>

<body>
    <h1>Fabricantes | SELECT</h1>
    <hr>
    <h2>Lendo e carregando todos os fabricantes.</h2>

    <div style="text-align: center;" class="center">
    <a href="../index.php">Cadastre novo fabricante</a>
    </div>
    

    <table>
        <caption>Lista de Fabricantes</caption>
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
        <a href="#">Editar</a>
        <a href="#">Excluir</a>
    </td>
    </tr>

<?php } ?>    
    </table>    
    
    <div style="text-align: center;" class="center">
    <a href="../index.php">Voltar</a>
    </div>

</body>
</html>