<?php

namespace App\Controller;

use App\Model\ChavePixModel;
use Exception;

class ChavePixController extends Controller
{
    public static function save() : void
    {
        try
        {
            $json_obj = json_decode(file_get_contents('php://input'));

            $model = new ChavePixModel();
            $model->id = $json_obj->Id;
            $model->chave = $json_obj->Chave;
            $model->tipo = $json_obj->Tipo;
            $model->id_conta = $json_obj->Id_conta;

            $model->save();
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function enviar() : void
    {
        try 
        {
            $model = new ChavePixModel();

            $q = json_encode(file_get_contents('php://input'));

            $model->getAllRows($q);

            parent::getExceptionAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function receber() : void
    {
        try
        {
            $model = new ChavePixModel();

            $model->getAllRows();

            parent::getResponseAsJSON($model->rows);
        }
        catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }
}