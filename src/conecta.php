<?php
/* SCRIPT de conexão ao servidor do Banco de Dados (database) */

// Parâmetros
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "vendas";

/* Configurações de conexão API/Driver utilizando PDO (PHP Data Object)*/

// Instância/Objeto PDO para conexão
$conexao = new PDO(
    "mysql:host=$servidor;dbname=$banco;charset=utf8"
);