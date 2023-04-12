<?php

namespace App\Controller;

use App\Model\CorrentistaModel;
use Exception;

class Controller extends Controller
{
    public static function getCorrentista() : void
    {
        try{
            $model = new CorrentistaModel();
            $model->getAll();
            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }
}