<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="ICON SCOOTER" href="css/img/scooter.png">
    <title> Thomikos Motors</title>

	<style>
        /* Seus estilos CSS existentes */
        
        .pagination-wrapper {
            margin-top: 10px;
            text-align: center;
        }

        .pagination ul.pagination {
            list-style: none;
            padding: 0;
        }

        .pagination ul.pagination li {
            display: inline-block;
            margin-right: 5px;
        }

        .pagination ul.pagination li a.page-link {
            background-color: white;
            color:  #8a2be2;
            border: 1px solid  #8a2be2;
            padding: 6px 12px;
            border-radius: 3px;
            text-decoration: none;
        }

        .pagination ul.pagination li a.page-link:hover {
            background-color:  #8a2be2;
            color: white;
        }

        .pagination ul.pagination li.active a.page-link {
            background-color:  #8a2be2;
            color: white;
            border: 1px solid  #8a2be2;
        }

        /* Estilo para a linha da tabela */
        .table-pagination tr.active-row td {
            background-color:  #8a2be2 !important;
            color: white;
        }
    </style>
</head>

<body>
	<?php
	include("functions.php");
	index();
	include(HEADER_TEMPLATE);
	?>

	<header class="mt-3">
		<div class="row">
			<div class="col-sm-6">
				<h2>Clientes</h2>
			</div>
			<div class="col-sm-6 text-end h2">
				<a class="btn btn-secondary" href="add.php"><i class="fa-solid fa-user-plus"></i> Novo Cliente</a>
				<a class="btn btn-light" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
			</div>
		</div>
	</header>
	<form name="filtro" action="index.php" method="post">
		<div class="row">
			<div class="form-group col-md-4">
				<div class="input-group mb-3">
					<input type="text" class="form-control" maxlength="80" name="customers"
						placeholder="consultar cliente..." required>
					<button type="submit" class="btn btn-secondary"><i class='fas fa-search'></i> Consultar</button>
				</div>
			</div>
		</div>
	</form>

	<?php if (!empty($_SESSION['message'])): ?>
		<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
					aria-hidden="true">&times;</span></button>
			<?php echo $_SESSION['message']; ?>
		</div>
		<?php clear_messages(); ?>
	<?php endif; ?>

	<hr>

	<table class="table table-hover">
		<thead>
			<tr>
				<th style="background-color: #F3F8FF">ID</th>
				<th width="30%" style="background-color: #F3F8FF">Nome</th>
				<th style="background-color: #F3F8FF">CPF/CNPJ</th>
				<th style="background-color: #F3F8FF">Telefone</th>
				<th style="background-color: #F3F8FF">Atualizado em</th>
				<th style="background-color: #F3F8FF">Opções</th>
			</tr>
		</thead>
        <tbody>
            <?php
            // Lógica de paginação
            $itens_por_pagina = 5;
            $total_clientes = count($customers);
            $total_paginas = ceil($total_clientes / $itens_por_pagina);

            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            $indice_inicial = ($page - 1) * $itens_por_pagina;
            $indice_final = $indice_inicial + $itens_por_pagina;

            $clientes_pagina = array_slice($customers, $indice_inicial, $itens_por_pagina);

            // Exibindo os clientes da página atual
			if ($clientes_pagina): ?>
                <?php foreach ($clientes_pagina as $key => $customer): ?>
                    <tr class="<?php echo ($page == $key + 1) ? 'active-row' : ''; ?>">
					<tr>
						<td style="background-color: #F3F8FF">
							<?php echo $customer['id']; ?>
						</td>
						<td style="background-color: #F3F8FF">
							<?php echo $customer['name']; ?>
						</td>
						<td style="background-color: #F3F8FF">
							<?php echo formataCpfCnpj($customer['cpf_cnpj']); ?>
						</td>
						<td style="background-color: #F3F8FF">
							<?php echo formatatel($customer['phone']); ?>
						</td>
						<td style="background-color: #F3F8FF">
							<?php echo formatadata($customer['modified'], "d/m/Y - H:i:s"); ?>
						</td>
						<td class="actions text-start" style="background-color: #F3F8FF">
							<a href="view.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-light"><i
									class="fa fa-eye"></i> Visualizar</a>
							<a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary"><i
									class="fa-solid fa-file-pen"></i> Editar</a>
							<a href="delete.php?id=" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#delete-modal"
								data-customer="<?php echo $customer['id']; ?>">
								<i class="fa fa-trash"></i> Excluir
							</a>
						</td>
					</tr>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Nenhum registro encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Links de paginação -->
	<div class="pagination">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $total_paginas; $i++) : ?>
                <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                    <a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </div>

    <?php
    include('modal.php');
    include(FOOTER_TEMPLATE);
    ?>
</body>

</html>
