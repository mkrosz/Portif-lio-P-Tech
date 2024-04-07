<?php

// Função para aplicar destaque ao texto pesquisado
function highlightText($text, $search) {
    // Se a pesquisa estiver vazia, retornar texto original
    if (empty($search)) {
        return $text;
    }

    // Aplicar destaque ao texto pesquisado
    $highlighted = preg_replace("/($search)/i", "<strong style='color: purple;'>$1</strong>", $text);

    return $highlighted;
}