<?php

namespace App\DAO;

use App\Model\CorrentistaModel;

class CorrentistaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select()
    {
        $sql = "SELECT * FROM Correntista";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function insert(CorrentistaModel $m) : bool
    {
        $sql = "INSERT INTO Correntista (nome, cpf, data_nasc, senha) 
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->nome);
        $stmt->bindValue(2, $m->cpf);
        $stmt->bindValue(3, $m->data_nasc);
        $stmt->bindValue(4, $m->senha);

        return $stmt->execute();
    }

    public function update(CorrentistaModel $m) : bool
    {
        $sql = "UPDATE Correntista SET nome=?, cpf=?, data_nasc=?, senha=? WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->nome);
        $stmt->bindValue(2, $m->cpf);
        $stmt->bindValue(3, $m->data_nasc);
        $stmt->bindValue(4, $m->senha);

        return $stmt->execute();
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM Correntista WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}