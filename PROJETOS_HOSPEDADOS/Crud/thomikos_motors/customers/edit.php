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
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2 class= "mt-2">Atualizar Cliente</h2>

<form action="edit.php?id=<?php echo $customer['id']; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome / Razão Social</label>
      <input type="text"  maxlength="255" class="form-control" name="customer['name']" value="<?php echo $customer['name']; ?>" style="background-color: #F3F8FF">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">CNPJ / CPF</label>
      <input type="text" maxlength="14" class="form-control" name="customer['cpf_cnpj']" value="<?php echo $customer['cpf_cnpj']; ?>" style="background-color: #F3F8FF">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Data de Nascimento</label>
      <input type="text" class="form-control" name="customer['birthdate']" value="<?php echo $customer['birthdate']; ?>" style="background-color: #F3F8FF">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-5">
      <label for="campo1">Endereço</label>
      <input type="text" maxlength="255" class="form-control" name="customer['address']" value="<?php echo $customer['address']; ?>" style="background-color: #F3F8FF">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Bairro</label>
      <input type="text" maxlength="100" class="form-control" name="customer['hood']" value="<?php echo $customer['hood']; ?>" style="background-color: #F3F8FF">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">CEP</label>
      <input type="text" maxlength="8" class="form-control" name="customer['zip_code']" value="<?php echo $customer['zip_code']; ?>" style="background-color: #F3F8FF">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Data de Cadastro</label>
      <input type="text" class="form-control" name="customer['created']" disabled value="<?php echo $customer['created']; ?>" style="background-color: #F3F8FF">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-5">
      <label for="campo1">Município</label>
      <input type="text" maxlength="100" class="form-control" name="customer['city']" value="<?php echo $customer['city']; ?>" style="background-color: #F3F8FF">
    </div>

    <div class="form-group col-md-2">
      <label for="campo2">Telefone</label>
      <input type="text" maxlength="11" class="form-control" name="customer['phone']" value="<?php echo $customer['phone']; ?>" style="background-color: #F3F8FF">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Celular</label>
      <input type="text" maxlength="11" class="form-control" name="customer['mobile']" value="<?php echo $customer['mobile']; ?>" style="background-color: #F3F8FF">
    </div>

    <div class="form-group col-md-1">
      <label for="campo3">UF</label>
      <input type="text" maxlength="2" class="form-control" name="customer['state']" value="<?php echo $customer['state']; ?>" style="background-color: #F3F8FF">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Inscrição Estadual</label>
      <input type="text" maxlength="12" class="form-control" name="customer['ie']" value="<?php echo $customer['ie']; ?>" style="background-color: #F3F8FF">
    </div>

  </div>
  <div id="actions" class="row mt-2">
    <div class="col-md-12">
      <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-sd-card"></i> Salvar</button>
      <a href="index.php" class="btn btn-light"><i class="fa-solid fa-xmark"></i> Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
</body>
</html>