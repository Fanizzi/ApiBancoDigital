<?php

namespace App\Model;

use App\DAO\CorrentistaDAO;
use Exception;

class CorrentistaModel extends Model
{
    public $id, $nome, $cpf, $data_nasc, $senha;

    public function getAll()
    {
        try {
            $dao = new CorrentistaDAO();

            $this->rows = $dao->selectCorrentistas();
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }
}