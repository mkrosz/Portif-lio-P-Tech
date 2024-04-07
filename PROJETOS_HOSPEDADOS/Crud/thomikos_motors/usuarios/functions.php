<?php
include("../config.php");
include(DBAPI);

$usuarios = null;
$usuario = null;

/**
 * Listagem de usuarios
 */
function index()
{
    global $usuarios;
    if (!empty($_POST['usuarios'])) {
        $usuarios = filter("usuarios", "nome like '%" . $_POST['usuarios'] . "%'");
    } else {
        $usuarios = find_all("usuarios");
    }
}

// Upload de imagens
function upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo){
    try {
        $nomearquivo = basename($arquivo_destino); // nome do arquivo
        $uploadOk = 1;

        // ... (remova a verificação do tipo_arquivo aqui)

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            throw new Exception("Desculpe, mas o arquivo não pode ser enviado.");
        } else {
            // Se tudo estiver OK, tentamos fazer o upload do arquivo
            if (move_uploaded_file($nome_temp, $arquivo_destino)) {
                $_SESSION['message'] = "O arquivo " . htmlspecialchars($nomearquivo) . " foi armazenado.";
                $_SESSION['type'] = "success";
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
        $_SESSION['type'] = "danger";
    }
}


// Cadastro de usuarios

function add()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['usuarios'])) {
        try {
            $usuario = $_POST['usuarios'];

            if (!empty($_FILES["foto"]["name"])) {
                // Upload da foto
                $pasta_destino = "fotos/";
                $arquivo_destino = $pasta_destino . basename($_FILES["foto"]["name"]);
                $nomearquivo = basename($_FILES["foto"]["name"]);

                // Executa o upload da foto
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $arquivo_destino)) {
                    $usuario['foto'] = $nomearquivo;
                } else {
                    throw new Exception("Falha no upload da foto.");
                }
            }

            save('usuarios', $usuario);

            $_SESSION['message'] = "usuario adicionada com sucesso.";
            $_SESSION['type'] = "success";

            header('Location: index.php');
            exit();
        } catch (Exception $e) {
            $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
            $_SESSION['type'] = "danger";
        }
    }
}

// Atualização/Edição de usuarios
function edit()
{
    try {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            // Mensagem de depuração            

            if (!empty($_POST['usuario'])) {
                $usuario = $_POST['usuario'];

                // Mensagem de depuração
                echo "Debug: Dados Recebidos do Formulário - usuario: " . print_r($usuario, true) . "<br>";

                if (!empty($_FILES["foto"]["name"])) {
                    // Upload da foto
                    $pasta_destino = "fotos/";
                    $arquivo_destino = $pasta_destino . basename($_FILES["foto"]["name"]);
                    $nomearquivo = basename($_FILES["foto"]["name"]);

                    // Mensagem de depuração
                    echo "Debug: Upload da foto. Pasta destino: $pasta_destino, Arquivo destino: $arquivo_destino, Nome do arquivo: $nomearquivo<br>";

                    $resolucao_arquivo = getimagesize($_FILES["foto"]["tmp_name"]);
                    $tamanho_arquivo = $_FILES["foto"]["size"];
                    $nome_temp = $_FILES["foto"]["tmp_name"];
                    $tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION));

                    // Mensagem de depuração
                    echo "Debug: Informações do arquivo - Resolução: $resolucao_arquivo, Tamanho: $tamanho_arquivo, Nome temporário: $nome_temp, Tipo: $tipo_arquivo<br>";

                    // Adicione a função upload com mensagens de depuração
                    upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);

                    // Mensagem de depuração
                    echo "Debug: Upload concluído<br>";

                    $usuario['foto'] = $nomearquivo;
                }

                // Atualiza os dados da usuario no banco
                update('usuarios', $id, $usuario);

                // Mensagem de depuração
                echo "Debug: Dados da usuario atualizados no banco de dados<br>";

                header('Location: index.php');
            } else {
                global $usuario;
                $usuario = find("usuarios", $id);
            }
        } else {
            header("Location: index.php");
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Aconteceu um erro: ". $e->getMessage();
        $_SESSION['type'] = "danger";
    }
}

// Visualização de uma usuario
function view($id = null)
{
    global $usuario;
    $usuario = find("usuarios", $id);
}


// Exclusão de um usuário
function delete($table, $id) {
    $link = open_database();
    try {
        $sql = "DELETE FROM {$table} WHERE id = {$id}";
        $result = $link->query($sql);
        close_database($link);
        return $result;
    } catch (Exception $e) {
        close_database($link);
        throw new Exception($e->getMessage());
    }
}
?>
