<?php
session_start();
include('functions.php');

$id = $_GET['id'];

if ($id) {
    try {
        // Obtém o nome do arquivo da foto antes de excluir o registro
        $moto = find("motos", $id);
        $nomeArquivo = $moto['foto'];

        // Exclui o registro da moto
        delete('motos', $id);

        // Exclui o arquivo de imagem associado
        if (!empty($nomeArquivo) && file_exists("fotos/" . $nomeArquivo)) {
            unlink("fotos/" . $nomeArquivo);
        }

        $_SESSION['message'] = "moto excluída com sucesso!";
        $_SESSION['type'] = 'success';
    } catch (Exception $e) {
        $_SESSION['message'] = "Erro ao excluir a moto: " . $e->getMessage();
        $_SESSION['type'] = 'danger';
    }
}

// Limpa o buffer de saída
ob_clean();

header('Location: index.php');
exit();
?>
