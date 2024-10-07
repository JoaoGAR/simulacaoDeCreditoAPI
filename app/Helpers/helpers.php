<?php

if (! function_exists('limpaCPF')) {
    function limpaCPF(string $cpf)
    {
        return preg_replace('/[^0-9]/', '', $cpf);
    }
}