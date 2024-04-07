<?php
include ('../PHP/conexão.php');

// Verifica se o ID foi passado e é válido
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $mysqli->real_escape_string($_GET['id']);

    // Consulta para buscar as informações detalhadas
    $sql_code = "SELECT * FROM pesquisador WHERE id = '$id'";
    $sql_query = $mysqli->query($sql_code) or die("Erro ao consultar: " . $mysqli->error);

    // Verifica se encontrou o item
    if($sql_query->num_rows > 0) {
        $detalhes = $sql_query->fetch_assoc();
        // Aqui você pode exibir as informações como preferir
        echo "Título: " . $detalhes['titulo'] . "<br>";
        echo "Subtítulo: " . $detalhes['subtitulo'] . "<br>";
        echo "Descrição: " . $detalhes['descricao'] . "<br>";
        // Adicione mais campos conforme necessário
    } else {
        echo "Item não encontrado.";
    }
} else {
    echo "ID não fornecido.";
}