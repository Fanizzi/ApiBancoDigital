<?php

namespace App\Model;

use App\DAO\TransacaoDAO;
use Exception;

class TransacaoModel extends Model
{
    public $id, $data_transacao, $valor;

    public function save()
    {
        if($this->id == null)
            (new TransacaoDAO())->insert($this);
        else
            (new TransacaoDAO())->update($this);
    }

    public function getAllRows()
    {
        $this->rows = (new TransacaoDAO())->select();
    }

    public function delete ()
    {
        (new TransacaoDAO())->delete($this->id);
    }
}
