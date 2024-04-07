<?php

	include("../config.php");
	include(DBAPI);

	$customers = null;
	$customer = null;

	/**
	 *  Listagem de Clientes
	 */
	
	function index() {
		global $customers;
		if (!empty($_POST['customers'])) {
			$customers = filter("customers", "name like '%" . $_POST['customers'] . "%'");
		} else {
			$customers = find_all("customers");
		}
	}

	/**
	 *  Cadastro de Clientes
	 */

	function add() {

		if (!empty($_POST['customer'])) {
		  
		  $today = 
			new DateTime("now", new DateTimeZone("America/Sao_Paulo"));
	  
		  $customer = $_POST['customer'];
		  $customer['modified'] = $customer['created'] = $today->format("d-m-Y");
		  
		  save("customers", $customer);
		  header("location: index.php");
		}
	  }

	  
/**
 *	Atualizacao/Edicao de Cliente
 */
function edit()
{

	$now = date_create("now", new DateTimeZone("America/Sao_Paulo"));

	if (isset($_GET['id'])) {

		$id = $_GET['id'];

		if (isset($_POST['customer'])) {

			$customer = $_POST['customer'];
			$customer['modified'] = $now->format("Y-m-d H:i:s");

			update("customers", $id, $customer);
			header("location: index.php");
		} else {

			global $customer;
			$customer = find("customers", $id);
		}
	} else {
		header("location: index.php");
	}
}

	/**
	 *  Visualização de um Cliente
	 */
	function view($id = null) {
		global $customer;
		$customer = find("customers", $id);
	}

/**
 *  Formatação de data
 */
function formatadata($data, $formato)
{
	$dt = new DateTime($data, new DateTimeZone("America/Sao_Paulo"));
	return $dt->format($formato); // "d/m/Y H:i:s"
}

			/**
	 *  Formatação de CEP
	 */
	function formatacep($cep) {
		return substr($cep, 0, 5) . "-" . substr($cep, 5);
	}

	function formatatel($tel) {
		return substr($tel, 0,0) . "(" . substr($tel, 0, 2) . ")" . substr($tel, 2, 5) . "-" . substr($tel, 7);
	}

	function formataCpfCnpj($cpfCnpj) {
		// Verifica se o documento é um CPF ou CNPJ
		$tamanhoDocumento = strlen($cpfCnpj);
	
		if ($tamanhoDocumento == 11) { // CPF
			return substr($cpfCnpj, 0, 3) . "." . substr($cpfCnpj, 3, 3) . "." . substr($cpfCnpj, 6, 3) . "-" . substr($cpfCnpj, 9);
		} elseif ($tamanhoDocumento == 14) { // CNPJ
			return substr($cpfCnpj, 0, 2) . "." . substr($cpfCnpj, 2, 3) . "." . substr($cpfCnpj, 5, 3) . "/" . substr($cpfCnpj, 8, 4) . "-" . substr($cpfCnpj, 12);
		} else {
			// Documento inválido ou de formato desconhecido
			return "Formato de documento inválido";
		}
	}

	/**
	 *  Exclusão de um Cliente
	 */
	function delete($id = null) {

		global $customer;
		$customer = remove("customers", $id);
	
		header('location: index.php');
	}
?>