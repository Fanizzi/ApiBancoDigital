<?php

use App\Controller\ChavePixController;
use App\Controller\CorrentistaController;
use App\Controller\ContaController;
use App\Controller\TransacaoController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri)
{
    case '/exportar':
        $return_var = NULL;
        $output = NULL;
        $command = 'C:/"Program Files"/MySQL/"MySQL Server 8.0"/bin/mysqldump -uroot -petecjau -P3307 -hlocalhost db_bancodigital > C:/Dev/file.sql';
        exec($command, $output, $exit_code);

        var_dump($exit_code);

        echo "deu certo.";
    break;

    case '/correntista/salvar':
        CorrentistaController::save();
    break;

    case '/correntista/entrar':
        CorrentistaController::entrar();
    break;

    case '/conta/abrir':
        ContaController::abrir();
    break;

    case '/conta/fechar':
        ContaController::fechar();
    break;

    case '/conta/extrato':
        ContaController::extrato();
    break;

    case '/pix/chave/listar':
        ChavePixController::listar();
    break;

    case '/pix/chave/salvar':
        ChavePixController::salvar();
    break;

    case '/pix/chave/remover':
        ChavePixController::remover();
    break;

    case '/transacao/pix/receber':
        TransacaoController::receberPix();
    break;

    case '/transacao/pix/enviar':
        TransacaoController::enviarPix();
    break;

    default:
        header('HTTP/1.0 403 Forbidden');
    break;
}