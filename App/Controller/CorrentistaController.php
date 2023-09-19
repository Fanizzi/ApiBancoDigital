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
 
            $data = json_decode(file_get_contents('php://input'));

            $model = new CorrentistaModel();

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

    public static function entrar()
    {
        try
        {

            $data = json_decode(file_get_contents('php://input'));

            $model = new CorrentistaModel();

            parent::getResponseAsJSON($model->getByCpfAndSenha($data->Cpf, $data->Senha)); 

        } catch(Exception $e) {
            
            parent::LogError($e);
            parent::getExceptionAsJSON($e);
        }  

    }
}