<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
    <style>
    .hr {
      margin-top: 1rem;
    }
  </style>
    		
        <hr class="hr">
        </main> <!-- /container -->

    <footer class="container">
        <?php $hoje = new DateTime("now", new DateTimeZone("America/Sao_Paulo")); ?>
        <p>&copy;2023 a <?php echo $hoje->format("Y");?> - Mike Willy Franguelli & Thomas Lourenço Lopes de Castro</p>
    </footer>

    <script src="<?php echo BASEURL; ?>js/jquery-3.7.0.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/popper.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/awesome/all.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/main.js"></script>

    </body>
</html>
