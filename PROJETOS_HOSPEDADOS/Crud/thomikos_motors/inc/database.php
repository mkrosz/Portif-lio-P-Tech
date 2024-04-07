<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function open_database() {
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		return $conn;
	} catch (Exception $e) {
		throw new Exception ($e->getMessage());
		return null;
	}
}

function close_database($conn) {
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		throw new Exception ($e->getMessage());	
	}
}

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function find( $table = null, $id = null ) {
  
	$database = open_database();
	$found = null;

	try {
	  if ($id) {
	    $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
	    $result = $database->query($sql);
	    
	    if ($result->num_rows > 0) {
	      $found = $result->fetch_assoc();
	    }
	    
	  } else {
	    
	    $sql = "SELECT * FROM " . $table;
	    $result = $database->query($sql);
	    /*
	    if ($result->num_rows > 0) {
	      $found = $result->fetch_all(MYSQLI_ASSOC);
        */
        /* Metodo alternativo*/
        $found = array();
        while ($row = $result->fetch_assoc()) {
          array_push($found, $row);
        }
	    //}
	  }
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);
	return $found;
}

	/**
	 *  Pesquisa Todos os Registros de uma Tabela
	 */
function find_all( $table ) {
	return find($table);
  }

  	/**
	*  Insere um registro no BD
	*/
function save($table = null, $data = null) {

	$database = open_database();
  
	$columns = null;
	$values = null;
  
	//print_r($data);
  
	foreach ($data as $key => $value) {
	  $columns .= trim($key, "'") . ",";
	  $values .= "'$value',";
	}
  
	// remove a ultima virgula
	$columns = rtrim($columns, ',');
	$values = rtrim($values, ',');
	
	$sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";
  
	try {
	  $database->query($sql);
  
	  $_SESSION['message'] = 'Registro cadastrado com sucesso.';
	  $_SESSION['type'] = 'success';
	
	} catch (Exception $e) { 
	
	  $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
	  $_SESSION['type'] = 'danger';
	} 
  
	close_database($database);
  }

 	/**
 	*  Atualiza um registro em uma tabela, por ID
 	*/
function update($table = null, $id = 0, $data = null) {

	$database = open_database();
  
	$items = null;
  
	foreach ($data as $key => $value) {
	  $items .= trim($key, "'") . "='$value',";
	}
  
	// remove a ultima virgula
	$items = rtrim($items, ',');
  
	$sql  = "UPDATE " . $table;
	$sql .= " SET $items";
	$sql .= " WHERE id=" . $id . ";";
  
	try {
	  $database->query($sql);
  
	  $_SESSION['message'] = 'Registro atualizado com sucesso.';
	  $_SESSION['type'] = 'success';
  
	} catch (Exception $e) { 
  
	  $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
	  $_SESSION['type'] = 'danger';
	} 
  
	close_database($database);
  }

 /**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function remove( $table = null, $id = null ) {

	$database = open_database();
	  
	try {
	  if ($id) {
  
		$sql = "DELETE FROM " . $table . " WHERE id = " . $id;
		$result = $database->query($sql);
  
		if ($result = $database->query($sql)) {   	
		  $_SESSION['message'] = "Registro Removido com Sucesso.";
		  $_SESSION['type'] = 'success';
		}
	  }
	} catch (Exception $e) { 
  
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
	}
  
	close_database($database);
  }

  // Pesquisa registros pelo parâmetro $p que foi passado
function filter($table = null, $p = null) {
    $database = open_database();
    $found = null;
    try {
        if ($p) {
            $sql = "SELECT * FROM " . $table . " WHERE " . $p;
            $result = $database->query($sql);
            if ($result->num_rows > 0) {
                $found = array();
                while ($row = $result->fetch_assoc()) {
                    array_push($found, $row);
                }
            } else {
                throw new Exception("Não foram encontrados registros de dados!");
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Ocorreu um erro: " . $e->getMessage();
        $_SESSION['type'] = "danger";
    }
    close_database($database);
    return $found;
}

// Criptografia
function criptografia($senha)
{
    // Aplicando criptografia na senha
    $custo = "08";
    $salt = "CflfllePArK1BJomM0F6aJ";

    // Gera um hash baseado em bcrypt
    $hash = crypt($senha, "$2a$" . $custo . "$" . $salt . "$");
    return $hash; // retorna a senha criptografada
}

function clear_messages() 
{ 
	$_SESSION['message'] = null; 
	$_SESSION['type'] = null;
}

/*
CREATE DATABASE wda_crud;

// Tabela motos dentro do banco wda_crud
CREATE TABLE motos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100) NOT NULL,
    marca VARCHAR(100) NOT NULL,
    motor VARCHAR(50) NOT NULL,
    dt_cad DATE NOT NULL,
    foto VARCHAR(100)
);

INSERT INTO motos (modelo, marca, motor, dt_cad, foto) VALUES
('CBR1000RR', 'Honda', '1000cc', '2022-09-01', 'cbr1000rr.jpg'),
('YZF-R1', 'Yamaha', '1000cc', '2022-08-02', 'yzf-r1.jpg'),
('GSX-R1000', 'Suzuki', '1000cc', '2022-09-03', 'gsx-r1000.jpg'),
('Ninja ZX-10R', 'Kawasaki', '1000cc', '2023-09-04', 'ninja-zx-10r.jpg'),
('Panigale V4', 'Ducati', '1103cc', '2023-09-05', 'panigale-v4.jpg'),
('GSX-R750', 'Suzuki', '750cc', '2022-03-06', 'gsx-r750.jpg'),
('CBR600RR', 'Honda', '600cc', '2023-03-07', 'cbr600rr.jpg'),
('YZF-R6', 'Yamaha', '600cc', '2022-03-08', 'yzf-r6.jpg'),
('Ninja ZX-6R', 'Kawasaki', '636cc', '2023-09-09', 'ninja-zx-6r.jpg'),
('MT-09', 'Yamaha', '847cc', '2023-11-10', 'mt-09.jpg'),
('CB650R', 'Honda', '649cc', '2023-11-11', 'cb650r.jpg'),
('GSX-S750', 'Suzuki', '749cc', '2023-09-12', 'gsx-s750.jpg'),
('Ninja 400', 'Kawasaki', '399cc', '2023-04-13', 'ninja-400.jpg'),
('MT-03', 'Yamaha', '321cc', '2022-02-14', 'mt-03.jpg'),
('CB300R', 'Honda', '286cc', '2023-03-15', 'cb300r.jpg');

// Tabela customers dentro do banco wda_crud
USE wda_crud;

CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    cpf_cnpj VARCHAR(14) NOT NULL,
    birthdate DATE NOT NULL,
    address VARCHAR(200) NOT NULL,
    hood VARCHAR(100),
    zip_code VARCHAR(10) NOT NULL,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    city VARCHAR(100) NOT NULL,
    phone VARCHAR(15),
    mobile VARCHAR(15),
    state VARCHAR(2),
    ie VARCHAR(20)
);

INSERT INTO customers (name, cpf_cnpj, birthdate, address, hood, zip_code, city, phone, mobile, state, ie) VALUES
('João da Silva', '123.456.789-10', '1980-05-15', 'Rua das Flores, 123', 'Centro', '12345-678', 'São Paulo', '(11) 1234-5678', '(11) 98765-4321', 'SP', '123.456.789.001'),
('Maria Oliveira', '987.654.321-10', '1990-08-20', 'Avenida dos Anjos, 456', 'Vila Nova', '54321-876', 'Rio de Janeiro', '(21) 8765-4321', '(21) 98765-1234', 'RJ', '987.654.321.001'),
('Carlos Santos', '456.789.123-20', '1985-03-10', 'Rua das Palmeiras, 789', 'Jardim América', '98765-432', 'Belo Horizonte', '(31) 4567-8901', '(31) 98765-4321', 'MG', '456.789.123.001'),
('Ana Pereira', '321.654.987-30', '1975-11-25', 'Avenida dos Girassóis, 456', 'Centro', '76543-210', 'Brasília', '(61) 9876-5432', '(61) 91234-5678', 'DF', '321.654.987.001'),
('Rafael Silva', '987.123.456-40', '1988-09-05', 'Rua das Acácias, 789', 'Jardim Botânico', '23456-789', 'Curitiba', '(41) 8765-4321', '(41) 98765-1234', 'PR', '987.123.456.001'),
('Patrícia Souza', '654.321.987-50', '1982-06-12', 'Avenida das Rosas, 123', 'Barra da Tijuca', '87654-321', 'Salvador', '(71) 9876-5432', '(71) 91234-5678', 'BA', '654.321.987.001'),
('Gabriel Oliveira', '147.258.369-60', '1995-04-18', 'Rua dos Ipês, 456', 'Centro', '65432-109', 'Fortaleza', '(85) 8765-4321', '(85) 98765-1234', 'CE', '147.258.369.001'),
('Juliana Pereira', '369.258.147-70', '1983-02-28', 'Avenida das Palmeiras, 789', 'Jardim América', '98765-321', 'Recife', '(81) 9876-5432', '(81) 91234-5678', 'PE', '369.258.147.001'),
('Fernando Santos', '258.369.147-80', '1977-10-07', 'Rua das Tulipas, 123', 'Vila Nova', '12345-678', 'Porto Alegre', '(51) 8765-4321', '(51) 98765-1234', 'RS', '258.369.147.001'),
('Luciana Silva', '369.147.258-90', '1998-07-22', 'Avenida das Acácias, 456', 'Jardim Botânico', '87654-321', 'Manaus', '(92) 9876-5432', '(92) 91234-5678', 'AM', '369.147.258.001'),
('Daniel Souza', '147.369.258-00', '1970-12-30', 'Rua dos Lírios, 789', 'Barra da Tijuca', '54321-098', 'Natal', '(84) 8765-4321', '(84) 98765-1234', 'RN', '147.369.258.001'),
('Cristina Oliveira', '258.147.369-10', '1989-01-08', 'Avenida das Orquídeas, 123', 'Centro', '65432-109', 'Florianópolis', '(48) 9876-5432', '(48) 91234-5678', 'SC', '258.147.369.001'),
('Pedro Santos', '147.369.258-20', '1992-11-15', 'Rua dos Girassóis, 456', 'Jardim América', '98765-321', 'Goiania', '(62) 8765-4321', '(62) 98765-1234', 'GO', '147.369.258.001'),
('Mariana Pereira', '369.258.147-30', '1986-08-28', 'Avenida das Violetas, 789', 'Vila Nova', '12345-678', 'São Luis', '(98) 9876-5432', '(98) 91234-5678', 'MA', '369.258.147.001'),
('Gustavo Silva', '258.147.369-40', '1980-05-03', 'Rua dos Cravos, 123', 'Jardim Botânico', '54321-098', 'João Pessoa', '(83) 8765-4321', '(83) 98765-1234', 'PB', '258.147.369.001');

// Tabela usuarios dentro do banco wda_crud
USE wda_crud;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    user VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    foto VARCHAR(100)
);

INSERT INTO usuarios (nome, user, password, foto) VALUES
('Mike Franguelli', 'mike_f', 'senha123', 'mike_franguelli.jpg'),
('Thomas Lopes', 'Thomas_l', 'senha456', 'thomas_lopes.jpg'),
('Admin Geral', 'admin_g', 'senha789', 'admin_geral.jpg');
*/