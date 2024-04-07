<?php
// Esse é o logout.php
include("../config.php");

// Verifica se a sessão está ativa antes de destruí-la
if (session_status() === PHP_SESSION_ACTIVE) {
    try {
        session_destroy(); // Destrói a sessão limpando todos os valores salvos

        // Direciona para o index do site
        header("Location: " . BASEURL . "index.php");
        exit; // Garante que nenhum código adicional seja executado após o redirecionamento
    } catch (Exception $e) {
        // Se houver um erro, define uma mensagem de erro na sessão
        session_start(); // Inicia a sessão se não estiver iniciada
        $_SESSION['message'] = "Ocorreu um erro: " . $e->getMessage();
        $_SESSION['type'] = "danger";
        header("Location: " . BASEURL . "index.php"); // Redireciona em caso de erro
        exit;
    }
} else {
    // Se a sessão não estiver ativa, simplesmente redireciona para o index do site
    header("Location: " . BASEURL . "index.php");
    exit;
}
?>
