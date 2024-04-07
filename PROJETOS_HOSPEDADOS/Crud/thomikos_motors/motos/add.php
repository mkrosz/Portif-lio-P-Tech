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
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      add();
  }
  include(HEADER_TEMPLATE); 
?>

<h2 class="mt-2">Nova moto</h2>

<form action="add.php" method="post" enctype="multipart/form-data">
    <!-- área de campos do formulário -->
    <hr />
    <div class="row">
      <div class="form-group col-md-3">
        <label for="modelo">Modelo:</label>
        <input type="text" maxlength="255" class="form-control" id="modelo" name="motos[modelo]">
      </div>
  
      <div class="form-group col-md-3">
        <label for="marca">Marca:</label>
        <input type="text" maxlength="255" class="form-control" id="marca" name="motos[marca]">
      </div>
    </div>
    
    <div class="row">
      <div class="form-group col-md-3">
        <label for="motor">Motor:</label>
        <input type="text" maxlength="255" class="form-control" id="tipo" name="motos[motor]">
      </div>

        <div class="form-group col-md-3">
            <label for="dt.cad">data de Cadastro:</label>
            <input type="date" class="form-control" name="motos[dt_cad]">
        </div>
    </div>
      
      <div class="row">
        <div class="form-group col-md-3">
          <label for="foto" >Foto</label>
          <input type="file" maxlength="8" class="form-control" id="foto"  name="foto" src="fotos/semimagem.png">
        </div>
        <div class="form-group col-md-3">
          <label for="img" >Pré-visualização</label>
          <img maxlength="8" class="form-control shadow rounded p-2 mb-2 bg-body" id="imgPreview" src="fotos/semimagem.png">
        </div>
      </div>
      

    <div id="actions" class="row mt-2">
      <div class="col-md-12">
        <button type="submit" class="btn btn-secondary"> <i class="fa-solid fa-sd-card"></i> Salvar</button>
        <a href="index.php" class="btn btn-light"> <i class="fa-solid fa-xmark"></i> Cancelar</a>
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
