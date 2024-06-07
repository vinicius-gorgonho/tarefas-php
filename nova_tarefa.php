<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap.min.css" rel="stylesheet" />
    <script src="bootstrap.bundle.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


</head>

<body>
    <?php include('menu.php'); ?>
    <?php session_start() ?>

    <?php
    if (isset($_SESSION['msg'])) {
        echo '<h5>' . $_SESSION['msg'] . '</h5>';
    }
    ?>
    <div class="container">
        <form action="controller.php" method="POST">
            <input type="text" name="titulo" />
            <input type="text" name="descricao" />
            <input type="submit" value="Cadastrar Tarefa">
        </form>
    </div>
</body>

</html>