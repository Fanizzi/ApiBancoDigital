<?php

use App\Controller\CorrentistaController;
use App\Controller\ContaController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri)
{
    case '/correntista/salvar':
        CorrentistaController::save();
    break;

    case '/correntista/entrar':
        CorrentistaController::entrar();
    break;

    case '/conta/pix/enviar':
        ContaController::enviar();
    break;

    case '/conta/pix/receber':
        ContaController::receber();
    break;

    case '/conta/extrato':
        ContaController::extrato();
    break;
}