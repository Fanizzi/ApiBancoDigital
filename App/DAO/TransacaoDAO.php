<?php

namespace App\DAO;

use App\Model\TransacaoModel;

class TransacaoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();        
    }

    public function select()
    {
        $sql = "SELECT * FROM Transacao";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function insert(TransacaoModel $t) : bool
    {
        $sql = "INSERT INTO Transacao (data_transacao, valor)
                VALUES (?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $t->data_transacao);
        $stmt->bindValue(2, $t->valor);

        return $stmt->execute();
    }

    public function update(TransacaoModel $t) : bool
    {
        $sql = "UPDATE Transacao SET data_transacao=?, valor=? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $t->data_transacao);
        $stmt->bindValue(2, $t->valor);

        return $stmt->execute();
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM Transacao WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}