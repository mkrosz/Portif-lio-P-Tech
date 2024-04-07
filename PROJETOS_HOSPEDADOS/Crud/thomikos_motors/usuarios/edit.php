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
        <h2 class="mt-2">Atualizar Usuário</h2>
    </header>
    <form action="edit.php?id=<?php echo $usuario['id']; ?>" method="post" enctype="multipart/form-data">
        <!-- área de campos do formulário -->
        <hr>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="nome">Nome:</label>
                <input type="text" maxlength="255" class="form-control" id="nome" name="usuario[nome]"
                    value="<?php echo $usuario['nome']; ?>" style="background-color: #F3F8FF">
            </div>

            <div class="form-group col-md-3">
                <label for="user">Usuário (login):</label>
                <input type="text" maxlength="255" class="form-control" id="user" name="usuario[user]"
                    value="<?php echo $usuario['user']; ?>" style="background-color: #F3F8FF">
            </div>
            <div class="form-group col-md-3">
                <label for="senha">Senha:</label>
                <input type="password" maxlength="255" class="form-control" id="senha" name="usuario[password]"
                value="<?php echo $usuario['password']; ?>" style="background-color: #F3F8FF">
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
                        src="fotos/<?php echo $foto; ?>" alt="Foto do Usuário">
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