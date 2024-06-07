<?php
require("tarefa.php");
require("tarefa_dao.php");
session_start();
$_SESSION['msg'] = "";

if ($_GET['index'] == 1) {
    header('location: index.php');
} else if ($_GET['listar_tarefa'] == 1) {
    header('location: listar_tarefas.php');
} else if ($_GET['nova_tarefa'] == 1) {
    header('location: nova_tarefa.php');
}


if ($_POST['titulo']) {
    

    $titulo = filter_input(INPUT_POST, 'titulo');
    $descricao = filter_input(INPUT_POST, 'descricao');

    $tarefa  = new Tarefa();

    // Create new person
    $tarefa->setTitulo($titulo);
    $tarefa->setDescricao($descricao);

    $tarefaDAO = new TarefaDAO();
    $msg = $tarefaDAO->salvar($tarefa);
    $_SESSION['msg'] = $msg;
    header("location: nova_tarefa.php");
}
