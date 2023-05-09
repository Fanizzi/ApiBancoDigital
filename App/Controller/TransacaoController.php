<?php

namespace App\Controller;

use App\Model\TransacaoModel;
use Exception;

class TransacaoController extends Controller
{
    public static function save() : void
    {
        try
        {
            $json_obj = json_decode(file_get_contents('php://input'));

            $model = new TransacaoModel();
            $model->id = $json_obj->Id;
            $model->data_transacao = $json_obj->Data_transacao;
            $model->valor = $json_obj->Valor;

            $model->save();
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }
}