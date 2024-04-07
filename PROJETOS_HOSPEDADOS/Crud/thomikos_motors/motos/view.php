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
        <h2>moto
            <?php echo $moto['id']; ?>
        </h2>
    </header>
    <hr>
    <dl class="dl-horizontal">
        <dt>Modelo:</dt>
        <dd>
            <?php echo $moto['modelo']; ?>
        </dd>
        <dt>Marca:</dt>
        <dd>
            <?php echo $moto['marca']; ?>
        </dd>
        <dt>Motor:</dt>
        <dd>
            <?php echo $moto['motor']; ?>
        </dd>
        <dt>Data de Cadastro:</dt>
        <dd>
            <?php echo $moto['dt_cad']; ?>
        </dd>
        <!-- <dt>Data de cadastro:</dt> -->
        <!-- <dd><?php //echo date('d/m/Y', strtotime($moto['data'])); ?></dd> -->
        <dt>Foto:</dt>
        <td>
            <?php
            if (!empty($moto['foto'])) {
                echo "<img src=\"fotos/" . $moto['foto'] . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"70px\">";
            } else {
                echo "<img src=\"fotos/semimagem.png\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"70x\">";
            }
            ?>
        </td>
    </dl>
    <div id="actions" class="row">
        <div class="col-md-12">
            <a href="edit.php?id=<?php echo $moto['id']; ?>" class="btn btn-secondary"><i
                    class="fa-solid fa-pen-to-square"></i> Editar</a>
            <a href="index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
        </div>
    </div>

    <?php include(FOOTER_TEMPLATE); ?>

</body>

</html>