<?php
if(isset ($_POST['inserir']) ){
    $nomeFabricante = filter_input(INPUT_POST, "nomeFabricante", FILTER_SANITIZE_SPECIAL_CHARS);
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Fabricantes - Inserção</title>

    <link rel="stylesheet" href="../css/exemplo-crud-php.css">

</head>

<body>
    <h1>Fabricantes | INSERT</h1>
    <hr>

    <div>
    <form action="#" method="post">
        <p>
            <label for="nomeFabricante">Nome do Fabricante:</label>
            <br>
            <input type="text" name="nomeFabricante" id="nomeFabricante" required>
        </p>

    <button type="submit" name="inserir">Enviar Fabricante</button>

    </form>
    </div>

    <p class="center"><a href="../index.php">Voltar</a></p>
</body>

</html>