<?php
date_default_timezone_set("America/Sao_Paulo");

$date = date("d/M/Y");

// Lê o conteúdo do README.md
$readme = file_get_contents("README.md");

if ($readme === false) {
    echo "Erro ao ler o arquivo README.md\n";
    exit(1);
}

// Verifica se a data já está atualizada
if (strpos($readme, "Hoje é dia **$date**") !== false) {
    echo "Data já atualizada. Nenhuma alteração necessária.\n";
    exit(0); // Sai sem fazer commit
}

// Atualiza o marcador apenas se a data mudou
$updatedReadme = preg_replace(
    '/<!-- DATE_PLACEHOLDER -->.*<!-- END_DATE_PLACEHOLDER -->/s',
    "<!-- DATE_PLACEHOLDER -->\nHoje é dia **$date**\n<!-- END_DATE_PLACEHOLDER -->",
    $readme
);

if (file_put_contents("README.md", $updatedReadme) === false) {
    echo "Erro ao salvar o arquivo README.md\n";
    exit(1);
}

echo "README.md atualizado com a nova data!\n";
?>
