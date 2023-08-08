<?php

namespace App\DAO;

use App\Model\ChavePixModel;
use PDO;

class ChavePixDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(ChavePixModel $model) : ?ChavePixModel
    {
        return ($model->id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(ChavePixModel $model) : ?ChavePixModel
    {
        $sql = "INSERT INTO Chave_Pix (chave, tipo, id_conta)
                VALUES (?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->chave,);
        $stmt->bindValue(2, $model->tipo);
        $stmt->bindValue(3, $model->id_conta);

        return $stmt->execute();
        
        $model->id = $this->conexao->lastInsertId();

        return $model;
    }

    public function update(ChavePixModel $model) : ?ChavePixModel
    {
        $sql = "UPDATE Chave_Pix SET chave=?, tipo=?, id_conta=? WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->chave,);
        $stmt->bindValue(2, $model->tipo);
        $stmt->bindValue(3, $model->id_conta);
        $stmt->bindValue(4, $model->id);

        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;
    }

    public function select(int $id_correntista)
    {
        $sql = "SELECT cp.* FROM Chave_Pix cp
                JOIN conta c ON (c.id_conta = cp.id_conta)
                WHERE c.id_correntista = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_correntista);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function delete(ChavePixModel $model) : bool
    {
        $sql = "DELETE FROM Chave_Pix WHERE id = ? AND id_conta=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->id);
        $stmt->bindValue(1, $model->id_conta);
        return $stmt->execute();
    }
}