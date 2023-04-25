<?php

namespace App\Model;

use App\DAO\ChavePixDAO;
use Exception;

class ChavePixModel extends Model
{
    public $id, $tipo, $chave, $id_conta;

    public function save()
    {
        if($this->id == null)
            (new ChavePixDAO())->insert($this);
        else
            (new ChavePixDAO())->update($this);
    }

    public function getAllRows()
    {
        $this->rows = (new ChavePixDAO())->select();
    }

    public function delete()
    {
        (new ChavePixDAO())->delete($this->id);
    }
}