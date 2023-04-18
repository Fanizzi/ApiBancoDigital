<?php

namespace App\Controller;

use App\Model\CorrentistaModel;
use Exception;

class CorrentistaController extends Controller
{
    public static function save() : void
    {
        try
        {
            $json_obj = json_decode(file_get_contents('php://input'));

            $model = new CorrentistaModel();
            $model->id = $json_obj->Id;
            $model->nome = $json_obj->Nome;
            $model->data_nasc = $json_obj->Data_Nasc;

            $model->save();
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function entrar() : void
    {
        
    }

    public static function getCorrentista() : void
    {
        try{
            $model = new CorrentistaModel();
            $model->getAllRows();
            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }
}