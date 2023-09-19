<?php

namespace App\DAO;

use App\Model\ContaModel;

class ContaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select()
    {
        $sql = "SELECT * FROM Conta";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function insert(ContaModel $m) : bool
    {
        $sql = "INSERT INTO Conta (tipo, saldo, limite, id_correntista)
                VALUES (?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->tipo);
        $stmt->bindValue(2, $m->saldo);
        $stmt->bindValue(3, $m->limite);
        $stmt->bindValue(4, $m->id_correntista);

        return $stmt->execute();
    }

    public function update(ContaModel $m) : bool
    {
        $sql = "UPDATE Conta SET tipo=?, saldo=?, limite=?, id_correntista WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->tipo);
        $stmt->bindValue(2, $m->saldo);
        $stmt->bindValue(3, $m->limite);
        $stmt->bindValue(4, $m->id_correntista);

        return $stmt->execute();
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM Conta WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }

    public function selectContasById(int $id)
    {
        $sql = "SELECT * FROM Conta WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
}