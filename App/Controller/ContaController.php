<?php

namespace App\Controller;

use App\Model\ContaModel;
use App\Model\CorrentistaModel;
use Exception;

class ContaController extends Controller
{
    public static function save() : void
    {
        try
        {
            $json_obj = json_decode(file_get_contents('php://input'));

            $model = new ContaModel();
            $model->id = $json_obj->Id;
            $model->tipo = $json_obj->Tipo;
            $model->saldo = $json_obj->Saldo;
            $model->limite = $json_obj->Limite;
            $model->numero = $json_obj->Numero;
            $model->senha = $json_obj->Senha;
            $model->id_correntista = $json_obj->Id_Correntista;

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
            $model = new ContaModel();

            $q = json_encode(file_get_contents('php://input'));

            $model->getAllRows($q);

            parent::getExceptionAsJSON($model->rows);
        }
        catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function receber() : void
    {
        try
        {
            $model = new ContaModel();

            $model->getAllRows();
    
            parent::getResponseAsJSON($model->rows);
        }
        catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
        
    }


    public static function extrato() : void
    {

    }

    public static function getConta() : void
    {
        try
        {
            $model = new ContaModel();
            $model->getAllRows();
            parent::getResponseAsJSON($model->rows);
        }
        catch(Exception $e)
        {
           parent::getExceptionAsJSON($e); 
        }
    }
}