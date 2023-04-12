<?php

namespace App\DAO;

class CorrentistaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectCorrentistas()
    {
        $sql = "SELECT * FROM Correntista";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectCorrentistaById(int $id)
    {
        $sql = "SELECT * FROM Correntista WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
}