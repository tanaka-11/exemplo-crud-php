<?php
function formatarPreco(float $valor):string {
    $formatacao = number_format($valor, 2, ",", ".");
    return "R$ ".$formatacao;
}

function contagemTotal(float $valor, int $qntd):string{
    $total = $valor * $qntd;
    return formatarPreco($total);
    // Codigo SQL - ( Total: contagemTotal($produto['preco'], $produto['estoque'] )
}