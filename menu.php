<div class="container">
    <ul class="dropdown-menu">
        <li><span class="dropdown-item-text">Tarefas</span></li>
        <li class="dropdown-item">
            <a href="controller.php?index=1"> Início </a>
        </li>
        <li class="dropdown-item">
            <a href="controller.php?listar_tarefa=1"> Listar Tarefa </a>
        </li>
        <li class="dropdown-item">
            <a href="controller.php?nova_tarefa=1"> Nova tarefa </a>
        </li>
    </ul>

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tarefas
        </button>
        <ul class="dropdown-menu">
            <li>
                <a class="dropdown-item" href="controller.php?nova_tarefa=1">Nova tarefa</a>
            </li>
            <li>
                <a class="dropdown-item" href="controller.php?listar_tarefa=1">Listar tarefa</a>
            </li>

        </ul>
    </div>
</div>