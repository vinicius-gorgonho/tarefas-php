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
}
