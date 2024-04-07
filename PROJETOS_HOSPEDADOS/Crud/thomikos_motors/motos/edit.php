<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="ICON SCOOTER" href="css/img/scooter.png">
    <title> Thomikos Motors</title>

    <!-- Inclua o jQuery antes de outros scripts -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <?php
    include('functions.php');
    edit();
    include(HEADER_TEMPLATE);
    ?>

    <header>
        <h2 class="mt-2">Atualizar moto</h2>
    </header>
    <form action="edit.php?id=<?php echo $moto['id']; ?>" method="post" enctype="multipart/form-data">
        <!-- área de campos do formulário -->
        <hr>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="modelo">Modelo:</label>
                <input type="text" maxlength="255" class="form-control" id="modelo" name="moto[modelo]"
                    value="<?php echo $moto['modelo']; ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="marca">Marca:</label>
                <input type="text" maxlength="255" class="form-control" id="marca" name="moto[marca]"
                    value="<?php echo $moto['marca']; ?>">
            </div>
        </div>


        <div class="row">
            <div class="form-group col-md-3">
                <label for="motor">Motor:</label>
                <input type="text" maxlength="255" class="form-control" id="motor" name="moto[motor]"
                    value="<?php echo $moto['motor']; ?>">
            </div>

                <div class="form-group col-md-3">
                    <label for="dt_cad">Data de Cadastro:</label>
                    <input type="date" class="form-control" name="motos[dt_cad]" value="<?php echo $moto['dt_cad']; ?>">
                </div>
            </div>

            <div class="row">
                <?php
                $foto = "";
                if (empty($usuario['foto'])) {
                    $foto = "semimagem.jpg";
                } else {
                    $foto = $usuario['foto'];
                }
                ?>
                <div class="form-group col-md-3">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <div class="form-group col-md-3">
                    <label for="pre">Pré-visualização:</label>
                    <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview"
                        src="fotos/<?php echo $foto; ?>" alt="Foto da moto">
                </div>
            </div>

            <div id="actions" class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-sd-card"></i> Salvar</button>
                    <a href="index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
                </div>
            </div>
    </form>

    <?php include(FOOTER_TEMPLATE); ?>
    <script>
        $(document).ready(() => {
            $("#foto").change(function () {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $("#imgPreview").attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>

</body>

</html>