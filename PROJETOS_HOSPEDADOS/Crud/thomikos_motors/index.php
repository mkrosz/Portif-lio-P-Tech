<?php 
    include "config.php"; 
    include DBAPI; 
	include(HEADER_TEMPLATE); 
    $db = open_database(); 
?>
<style>
    .btn{
        width:210px;
    }
    .dash{
        margin-top: 2rem;
    }
</style>
        <a class="navbar-brand" href="index.php"></a>
        <h1 class="dash">Dashboard <i class="fa-solid fa-star"></i></h1>
       
        <hr>

        <?php if ($db) : ?>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-2 col-xl-3 mb-2 p-0">
                <a href="customers/add.php" class="btn btn-secondary">
                    <div class="row">
                        <div class="col-xs-12 text-center p-0">
							<i class="fa-solid fa-user-plus fa-5x"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <p>Novo Cliente</p>
                        </div>
                    </div>
                </a>
            </div>

              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-2 col-xl-3 mb-2 p-0">
                <a href="customers/index.php" class="btn btn-light">
                    <div class="row">
                        <div class="col-xs-12 text-center p-0">
                        <i class="fa-solid fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <p>Clientes</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
		
		 <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-2 col-xl-3 mb-2 p-0">
                <a href="motos/add.php" class="btn btn-secondary">
                    <div class="row">
                        <div class="col-xs-12 text-center p-0">
                        <i class="fa-solid fa-plus fa-5x"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <p>Nova Moto</p>
                        </div>
                    </div>
                </a>
            </div>

              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-2 col-xl-3 mb-2 p-0">
                <a href="motos/index.php" class="btn btn-light">
                    <div class="row">
                        <div class="col-xs-12 text-center p-0">
                        <i class="fa-solid fa-motorcycle fa-5x"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <p>Motos</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-2 col-xl-3 mb-2 p-0">
                <a href="usuarios/add.php" class="btn btn-secondary">
                    <div class="row">
                        <div class="col-xs-12 text-center p-0">
                        <i class="fa-solid fa-user-pen fa-5x"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <p>Novo Usuário</p>
                        </div>
                    </div>
                </a>
            </div>

              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-2 col-xl-3 mb-2 p-0">
                <a href="usuarios/index.php" class="btn btn-light">
                    <div class="row">
                        <div class="col-xs-12 text-center p-0">
                        <i class="fa-solid fa-users-gear fa-5x"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <p>Usuários</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <?php if (isset($_SESSION['user'])) : ?>
        <?php if ($_SESSION['user'] == "admin") : ?>
            <div class="row" id="actions">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-2 col-xl-3 mb-2 p-0">
                <a href="usuarios/add.php" class="btn btn-secondary">
                    <div class="row">
                        <div class="col-xs-12 text-center p-0">
                        <i class="fa-solid fa-user-pen fa-5x"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <p>Novo Usuário</p>
                        </div>
                    </div>
                </a>
            </div>

              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-2 col-xl-3 mb-2 p-0">
                <a href="usuarios/index.php" class="btn btn-light">
                    <div class="row">
                        <div class="col-xs-12 text-center p-0">
                        <i class="fa-solid fa-users-gear fa-5x"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <p>Usuários</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>
<?php else: ?>
    <?php if (!empty($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
            <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!<br>
            <?php echo $_SESSION['message']; ?></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php clear_messages(); ?>
    <?php endif; ?>
<?php endif; ?>
<?php include(FOOTER_TEMPLATE); ?>