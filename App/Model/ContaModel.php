<?php

namespace App\Model;

use App\DAO\ContaDAO;
use Exception;

class ContaModel extends Model
{
    public $id, $tipo, $saldo, $limite, $numero, $senha, $id_correntista;
    
    public function save()
    {
        if($this->id == null)
            (new ContaDAO())->insert($this);
        else
            (new ContaDAO())->update($this);
    }

    public function getAllRows()
    {
        $this->rows = (new ContaDAO())->select();
    }

    public function delete()
    {
        (new ContaDAO())->delete($this->id);
    }
}