<?php

namespace App\Controller;

use App\Model\ChavePixModel;
use Exception;

class ChavePixController extends Controller
{
    public static function salvar() : void
    {
        try
        {
            $data = json_decode(file_get_contents('php://input'));

            $model = new ChavePixModel();

            // Copiando os valores de $data para $model dinamicamente

            foreach (get_object_vars($data) as $key => $value)
            {
                $prop_letra_minuscula = strtolower($key);

                $model->$prop_letra_minuscula = $value;
            }

            parent::getResponseAsJSON($model->save());
        } catch(Exception $e) {

            parent::LogError($e);
            parent::getExceptionAsJSON($e);
        }
    }

    public static function listar() : void
    {
        try 
        {
            $data = json_decode(file_get_contents('php://input'));

            $model = new ChavePixModel;

            // Salvando o novo correntista e definindo a saída.

            parent::getResponseAsJSON($model->getAllRows($data->id_correntista));
        }
        catch (Exception $e)
        {
            parent::LogError($e);
            parent::getExceptionAsJSON($e);
        }
    }

    public static function remover() : void
    {
        try
        {
            $data = json_decode(file_get_contents('php://input'));

            $model = new ChavePixModel();

            // Copiando osvalores de $data para $model dinamicamente

            foreach (get_object_vars($data) as $key =>$value)
            {
                $prop_letra_minuscula = strtolower($key);

                $model->$prop_letra_minuscula = $value;
            }

            parent::getResponseAsJSON($model->save());
        }
        catch(Exception $e)
        {
            parent::LogError($e);
            parent::getExceptionAsJSON($e);
        }
    }
}