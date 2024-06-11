<?php
require "controller.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap.min.css" rel="stylesheet" />
    <script src="bootstrap.bundle.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .modal-confirm {
            color: #636363;
            width: 400px;
        }

        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }

        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }

        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }

        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }

        .modal-confirm .modal-body {
            color: #999;
        }

        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }

        .modal-confirm .modal-footer a {
            color: #999;
        }

        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #f15e5e;
        }

        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }

        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
            outline: none !important;
        }

        .modal-confirm .btn-info {
            background: #c1c1c1;
        }

        .modal-confirm .btn-info:hover,
        .modal-confirm .btn-info:focus {
            background: #a8a8a8;
        }

        .modal-confirm .btn-danger {
            background: #f15e5e;
        }

        .modal-confirm .btn-danger:hover,
        .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }

        .trigger-btn {
            /* display: inline-block;
            margin: 100px auto; */
        }
    </style>
</head>

<body>
    <?php include('menu.php'); ?>
    <div class="container">
        <?php

        if (isset($_SESSION['msg'])) {
            echo '<h5>' . $_SESSION['msg'] . '</h5>';
        }
        ?>
    </div>
    <?php
    $controller = new TarefaController();
    $result = $controller->getTodos();

    if ($result) {
    ?>
        <div class="container">
            <table border="1" class="table">
                <thead>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td>
                                <?= $row["id"]; ?>
                            </td>
                            <td>
                                <?= $row["titulo"]; ?>
                            </td>
                            <td>
                                <?= $row["descricao"]; ?>
                            </td>
                            <td>
                                <a href="?controller=TarefaController&method=iniciar_editar&id=<?= $row["id"]; ?>" class="btn btn-primary">Editar</a>
                                <a href="#myModal" class="btn btn-danger trigger-btn" data-toggle="modal">Excluir</a>

                                <script>
                                    $(document).ready(function() {
                                        $('#confirmar').on('click', function(e) {
                                            location.href = "?controller=TarefaController&method=excluir&id=<?= $row["id"]; ?>";
                                            $('#myModal').modal('hide');
                                        })
                                    });
                                </script>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    <?php } ?>
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>
                    <h4 class="modal-title">Deseja excluir?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>A operação não podera ser revertida.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmar">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>

</html>