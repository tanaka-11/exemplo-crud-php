<?php
function formatarPreco($preco):string {
    $formatar = number_format($preco, 2, ",", ".");
    return $formatar;
}