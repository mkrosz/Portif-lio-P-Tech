<?php

include ('../PHP/conexão.php');
include ('../PHP/destaque.php');
//include ('../PHP/direciona_pag.php');

$pesquisa = $mysqli->real_escape_string($_GET['busca']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../CSS/style.php">
    <title>Pesquisa</title>
    <style>
    </style>
</head>

<body>
    <header>
        <nav class="navigation">
            <a href="../index.html" class="logo">P<span>ortifóli</span>O</a>
            <ul class="nav-menu">
                <li class="nav-item"><a href="../HEADER/sobreMim.html">Sobre mim</a></li>
                <li class="nav-item"><a href="../HEADER/menu.html">Menu</a></li>
                <li class="nav-item"><a href="../HEADER/contato.html">Contatos</a></li>
                <li class="search-icon"></li>
            </ul>
            <div class="menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>

    <h2>Pesquisar</h2>
    <div class="container">
        <div class="icon">
            <i class='bx bx-search'></i>
        </div>

        <div class="barra-pesquisa">
            <li class="search-box">
                <form class="form" action="../HEADER/pesquisa.php" method="get">
                    <input class="search-input" name="busca"
                        value="<?php if (isset($_GET['busca'])) echo $_GET['busca']; ?>" type="text"
                        placeholder="Pesquisa...">
                </form>
                <table class="<?php echo $table_class; ?>" style="border: 1px">
                    <tr>
                        <th class="th-start">Título</th>
                        <th>Subtítulo</th>
                        <th>Descrição</th>
                        <th class="th-end"></th>
                    </tr>
                    <?php
                    if (!isset($_GET['busca'])) {
                        ?>
                        <tr>
                            <td colspan="3">Digite algo para pesquisar...</td>
                        </tr>
                        <?php
                    } else {
                        $sql_code = "SELECT * FROM pesquisador WHERE titulo LIKE '%$pesquisa%' OR subtitulo LIKE '%$pesquisa%' OR descricao LIKE '%$pesquisa%'";
                        $sql_query = $mysqli->query($sql_code) or die("Erro ao consultar!" . $mysqli->error);

                        if ($sql_query->num_rows == 0) {
                            ?>
                            <tr>
                                <td colspan="3">Nenhum resultado encontrado...</td>
                            </tr>
                            <?php
                        } else {
                            while ($dados = $sql_query->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo highlightText($dados['titulo'], $pesquisa); ?></td>
                                    <td><?php echo highlightText($dados['subtitulo'], $pesquisa); ?></td>
                                    <td><?php echo highlightText($dados['descricao'], $pesquisa); ?></td>
                                    <td><a href="<?php echo $dados['destino']; ?>?id=<?php echo $dados['id']; ?>" class="ver-mais">Ver mais</a></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
                </table>
            </li>
        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>
