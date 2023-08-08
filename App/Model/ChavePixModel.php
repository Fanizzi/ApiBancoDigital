<?php

namespace App\Model;

use App\DAO\ChavePixDAO;

class ChavePixModel extends Model
{
    public $id, $tipo, $chave, $id_conta;

    public function save() : ?ChavePixModel
    {
        return (new ChavePixDAO())->save($this);
    }

    public function getAllRows(int $id_correntista) : array
    {
        return (new ChavePixDAO())->SELECT($id_correntista);
    }

    public function remove() : bool
    {
        return (new ChavePixDAO())->delete($this);
    }
}