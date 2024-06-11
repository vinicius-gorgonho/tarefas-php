<?php
require("conexao.php");

class TarefaDAO
{

    public function salvar($tarefa)
    {
        try {
            $conexao = new Conexao();
            $connection = $conexao->getConnection();

            $stmt = $connection->prepare("INSERT INTO tarefa (titulo, descricao) VALUES (:titulo, :descricao)");

            $stmt->bindParam(':titulo', $tarefa->getTitulo());
            $stmt->bindParam(':descricao', $tarefa->getDescricao());

            $stmt->execute();
            return "Tarefa Cadastrada com sucesso.";
        } catch (PDOException $error) {
            return $error->getMessage();
        }
    }


    public function getTodos()
    {
        try {
            $conexao = new Conexao();
            $connection = $conexao->getConnection();
            $sql = "SELECT * FROM tarefa";
            $stmt = $connection->prepare($sql);

            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $error) {
            return $error->getMessage();
        }
    }
    public function getPorId($id)
    {
        try {
            $conexao = new Conexao();
            $connection = $conexao->getConnection();
            $sql = "SELECT * FROM tarefa WHERE id = :id";

            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch();

            return $result;
        } catch (PDOException $error) {
            return $error->getMessage();
        }
    }

    public function editar($tarefa)
    {
        try {
            $conexao = new Conexao();
            $connection = $conexao->getConnection();
            $sql = "UPDATE tarefa SET  
              titulo = :titulo, 
              descricao = :descricao WHERE id = :id";
            $stmt = $connection->prepare($sql);

            $stmt->bindParam(':titulo', $tarefa->getTitulo());
            $stmt->bindParam(':descricao', $tarefa->getDescricao());
            $stmt->bindParam(':id', $tarefa->getId());
            $stmt->execute();

            return "Tarefa editada com sucesso.";
        } catch (PDOException $error) {
            return $error->getMessage();
        }
    }

    public function excluir($id)
    {
        try {
            $conexao = new Conexao();
            $connection = $conexao->getConnection();
            $sql = "DELETE from tarefa WHERE id = :id";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return "Tarefa excluída com sucesso.";
        } catch (PDOException $error) {
            return $error->getMessage();
        }
    }
}
