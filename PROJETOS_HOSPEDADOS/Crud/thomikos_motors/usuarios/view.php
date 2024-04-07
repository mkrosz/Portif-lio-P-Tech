<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="ICON SCOOTER" href="css/img/scooter.png">
    <title> Thomikos Motors</title>
</head>

<body>

    <?php
    include('functions.php');
    if (!isset($_SESSION))
        session_start();

    $id = $_GET['id'];
    view($id);
    include(HEADER_TEMPLATE);
    ?>

    <header>
        <h2>usuario
            <?php echo $usuario['id']; ?>
        </h2>
    </header>
    <hr>
    <dl class="dl-horizontal">
        <dt>Nome:</dt>
        <dd>
            <?php echo $usuario['nome']; ?>
        </dd>
        <dt>Usuário (Login):</dt>
        <dd>
            <?php echo $usuario['user']; ?>
        </dd>
        <dt>Senha:</dt>
        <dd>
            <?php echo $usuario['password']; ?>
        </dd>
        <!-- <dt>Data de cadastro:</dt> -->
        <!-- <dd><?php //echo date('d/m/Y', strtotime($usuario['data'])); ?></dd> -->
        <dt>Foto:</dt>
        <td>
            <?php
            if (!empty($usuario['foto'])) {
                echo "<img src=\"fotos/" . $usuario['foto'] . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"70px\">";
            } else {
                echo "<img src=\"fotos/semimagem.png\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"70x\">";
            }
            ?>
        </td>
    </dl>
    <div id="actions" class="row">
        <div class="col-md-12">
            <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-secondary"
                style="position: fixed; bottom: 20px; right: 150px;"><i class="fa-solid fa-pen-to-square"></i>
                Editar</a>
            <a href="index.php" class="btn btn-light" style="position: fixed; bottom: 20px; right: 50px;"><i
                    class="fa-solid fa-rotate-left"></i> Voltar</a>
        </div>
    </div>

    <?php include(FOOTER_TEMPLATE); ?>

</body>

</html>