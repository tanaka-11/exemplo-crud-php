<?php
function formatarPreco(float $valor):string {
    $formatacao = number_format($valor, 2, ",", ".");
    return $formatacao;
}