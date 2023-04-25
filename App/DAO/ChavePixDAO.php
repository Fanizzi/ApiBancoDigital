<?php

namespace App\DAO;

use App\Model\ChavePixModel;

class ChavePixDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select()
    {
        $sql = "SELECT * FROM Chave_Pix";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function insert(ChavePixModel $p) : bool
    {
        $sql = "INSERT INTO Chave_Pix (chave, tipo, id_conta)
                VALUES (?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $p->chave,);
        $stmt->bindValue(2, $p->tipo);
        $stmt->bindValue(3, $p->id_conta);

        return $stmt->execute();
    }

    public function update(ChavePixModel $p) : bool
    {
        $sql = "UPDATE Chave_Pix SET chave=?, tipo=?, id_conta=? WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $p->chave,);
        $stmt->bindValue(2, $p->tipo);
        $stmt->bindValue(3, $p->id_conta);

        return $stmt->execute();
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM Chave_Pix WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}