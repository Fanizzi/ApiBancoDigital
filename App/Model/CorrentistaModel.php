<?php

namespace App\Model;

use App\DAO\CorrentistaDAO;
use Exception;

class CorrentistaModel extends Model
{
    public $id, $nome, $cpf, $data_nasc, $senha;

    public function save() : ?CorrentistaModel
    {
        return (new CorrentistaDAO())->save($this);     
    }

    public function getByCpfAndSenha($cpf, $senha) : CorrentistaModel
    {      
        return (new CorrentistaDAO())->selectByCpfAndSenha($cpf, $senha);
    }
}