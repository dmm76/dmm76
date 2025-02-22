<?php
date_default_timezone_set("America/Sao_Paulo");

$date = date("d/M/Y");
$time = date("G:i:s T");

// Lê o conteúdo do README.md
$readme = file_get_contents("README.md");

if ($readme === false) {
    echo "Erro ao ler o arquivo README.md\n";
    exit(1);
}

// Substitui o marcador especial com a data e hora
$updatedReadme = preg_replace(
    '/<!-- DATE_PLACEHOLDER -->.*<!-- END_DATE_PLACEHOLDER -->/s',
    "<!-- DATE_PLACEHOLDER -->\nHoje é dia **$date** e a hora é **$time**\n<!-- END_DATE_PLACEHOLDER -->",
    $readme
);

if ($updatedReadme === null) {
    echo "Erro ao substituir o conteúdo do README.md\n";
    exit(1);
}

// Salva o arquivo atualizado
$result = file_put_contents("README.md", $updatedReadme);

if ($result === false) {
    echo "Erro ao salvar o arquivo README.md\n";
    exit(1);
}

echo "README.md atualizado com sucesso!\n";
?>
