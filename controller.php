<?php
require("tarefa.php");
require("tarefa_dao.php");
session_start();



if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['method'])) {

    $method = $_GET['method'];
    if (method_exists('TarefaController', $method)) {
        $tarefaController = new TarefaController();
        $tarefaController->$method($_GET);
    } else {
        echo 'Metodo incorreto';
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['method'])) {
    $method = $_POST['method'];
    if (method_exists('TarefaController', $method)) {
        var_dump($method);
        $tarefaController = new TarefaController();
        $tarefaController->$method($_POST);
    } else {
        echo 'Metodo incorreto';
    }
}


class  TarefaController
{
    public function index()
    {
        $_SESSION['msg'] = "";
        header('location: index.php');
    }

    public function listar_tarefa()
    {
        $_SESSION['msg'] = "";
        header('location: listar_tarefas.php');
    }
    public function nova_tarefa()
    {
        $_SESSION['msg'] = "";
        header('location: nova_tarefa.php');
    }

    public function salvar()
    {
        $titulo = filter_input(INPUT_POST, 'titulo');
        $descricao = filter_input(INPUT_POST, 'descricao');

        $tarefa  = new Tarefa();
        $tarefa->setTitulo($titulo);
        $tarefa->setDescricao($descricao);

        $tarefaDAO = new TarefaDAO();
        $msg = $tarefaDAO->salvar($tarefa);
        $_SESSION['msg'] = $msg;
        header("location: nova_tarefa.php");
    }
    public function getTodos()
    {
        $tarefaDAO = new TarefaDAO();
        return $tarefaDAO->getTodos();
    }

    public function iniciar_editar()
    {
        $_SESSION['editar_id'] = $_GET['id'];
        header('location: editar_tarefa.php');
    }
    public function getPorId($id)
    {
        $tarefaDAO = new TarefaDAO();
        return $tarefaDAO->getPorId($id);
    }
    public function editar()
    {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];

        $tarefa  = new Tarefa();
        $tarefa->setId($id);
        $tarefa->setTitulo($titulo);
        $tarefa->setDescricao($descricao);

        $tarefaDAO = new TarefaDAO();
        $msg = $tarefaDAO->editar($tarefa);
        $_SESSION['msg'] = $msg;
        header('location: listar_tarefas.php');
    }

    public function excluir()
    {
        // $id = $_POST['id'];
        $id = filter_input(INPUT_GET, 'id');
        $tarefa  = new Tarefa();
        $tarefa->setId($id);

        $tarefaDAO = new TarefaDAO();
        $msg = $tarefaDAO->excluir($id);
        $_SESSION['msg'] = $msg;
        header('location: listar_tarefas.php');
    }
}
