<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link rel="stylesheet" href="css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
    <link rel="ICON SCOOTER" href="css/img/scooter.png">
    <title> Thomikos Motors</title>
    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
            font-size: 17px;
            background-color: #F3F8FF;
        }

        .btn-secondary {
            color: #FFFFFF;
            background-color: #8a2be2;
            border-color: #8a2be2;
        }

        .btn-secondary:hover {
            color: #FFFFFF;
            background-color: #6a1b9a;
            border-color: #6a1b9a;
        }

        .btn-light {
            color: #8a2be2;
            background-color: #fefefe;
            border-color:  #8a2be2;
        }

        .btn-light:hover {
            color: #8a2be2;
            background-color: #F9F7F7;
            border-color: #8a2be2;
        }

        .btn-dark {
            color: #ffffff;
            background-color: #191825;
            border-color: #191825;
        }

        .btn-dark:hover {
            color: #ffffff;
            background-color: #22092C;
            border-color: #22092C;
        }

        header,
        #actions {
            margin-top: 10px;
        }

        #nav-right {
            position: absolute;
            right: 200px;
        }
            .tamanho img {
                width: 24px; 
                height: 24px; 
                filter: invert(100%);
                margin-left: 2px;
                margin-right: 5px;
                margin-bottom: 3px;
            }
    </style>

    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-xxl navbar-dark fixed-top" style=" background-color: #8a2be2">
        <div class="container-fluid">
            <div class="tamanho">
                <img width="64" height="64" src="https://img.icons8.com/pastel-glyph/64/000000/scooter--v2.png" alt="scooter--v2"/>
            </div>
            <a class="navbar-brand" style="color: #ffffff;" href="<?php echo BASEURL; ?>"> Thomikos Motors </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            style="color: #ffffff;" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user-group" style=" color: #ffffff"></i> Clientes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers/add.php"><i
                                        class="fa-solid fa-user-plus" style=" color: #000000"></i> Adicionar Cliente</a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers/"><i
                                        class="fa-solid fa-users" style=" color: #000000"></i> Gerenciar Clientes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color: #ffffff;" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-warehouse" style=" color: #ffffff"></i> Motos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>motos/add.php"> <i
                                        class="fa-solid fa-plus" style=" color: #000000"></i> Adicionar Moto</a></li>
                            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>motos/index.php"> <i
                                        class="fa-solid fa-motorcycle" style=" color: #000000"></i> Gerenciar Motos</a>
                            </li>
                        </ul>
                    </li>
                        <!-- Excluir ess usúário antes de enviar-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"  style="color: #ffffff;" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user" style=" color: #ffffff"></i> Usuários
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios/add.php"><i
                                        class="fa-solid fa-user-pen" style=" color: #000000"></i>Adicionar Usuário</a></li>
                            <li><a class="dropdown-item"  href="<?php echo BASEURL; ?>usuarios/"><i
                                        class="fa-solid fa-users-gear" style=" color: #000000"></i> Gerenciar Usuários</a></li>
                        </ul>
                    </li>
                        <!-- Até aqui-->
                    <?php if (isset($_SESSION['user'])): //Verifica se está logado ?>
                        <?php if ($_SESSION['user'] == "admin"): //Verifica se está logado como admin ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" style="color: #ffffff;" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user" style=" color: #ffffff"> Usuários
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios/add.php"><i
                                                class="fa-solid fa-user-pen" style="color: #000000"></i> Adicionar Usuário</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios/"><i
                                                class="fa-solid fa-users-gear" style="color: #000000"> Gerenciar Usuários</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <li class="nav-item" id="nav-right">
                        <?php if (isset($_SESSION['user'])): ?>
                            <a class="nav-link" style="color: #ffffff;" href="<?php echo BASEURL; ?>inc/logout.php">
                                Bem-vindo
                                <?php echo $_SESSION['user'] ?> <i class="fa-solid fa-person-walking-arrow-right">

                                </i> Desconectar
                            </a>
                        <?php else: ?>
                            <a class="nav-link" style="color: #ffffff;" href="<?php echo BASEURL; ?>inc/login.php">
                                <i class="fa-solid fa-users" style="color: #ffffff;"></i> Login
                            </a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">