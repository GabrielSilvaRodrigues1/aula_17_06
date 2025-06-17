<?php

namespace Fatec\Mvc\Models\Repository;

use Fatec\Mvc\Config\Connection;
use Fatec\Mvc\Models\Entity\Aluno;
use PDO;

class AlunoRepository{
    public $conn;

    public function __construct()
    {
        // instância da classe connection
        $this->conn = (new Connection())->getConnection();
    }

    public function save(Aluno $aluno)
    {
        $query = "INSERT INTO aluno (nome,genero) VALUES(:nome, :genero)";

        $nome = $aluno->getNome();
        $genero = $aluno->getGenero();

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":genero", $genero);

        $stmt->execute();
    }

    public function findAll()
    {
        $query = "SELECT * FROM aluno";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByID($id)
    {
        $query = "SELECT * FROM aluno WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(Aluno $aluno)
    {
        $query = "UPDATE aluno SET nome = :nome, genero = :genero WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $nome = $aluno->getNome();
        $genero = $aluno->getGenero();
        $id = $aluno->getId();

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":genero", $genero);
        $stmt->bindParam(":id", $id);

        $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM aluno WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}
