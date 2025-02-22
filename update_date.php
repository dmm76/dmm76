<?php
date_default_timezone_set("America/Sao_Paulo");

$date = date("d/M/Y");
$time = date("G:i:s T");

// Leia o conteúdo do README.md
$readme = file_get_contents("README.md");

// Atualize o marcador especial com a data e hora
$updatedReadme = preg_replace(
    '/<!-- DATE_PLACEHOLDER -->.*<!-- END_DATE_PLACEHOLDER -->/',
    "<!-- DATE_PLACEHOLDER -->\nHoje é dia **$date** e a hora é **$time**\n<!-- END_DATE_PLACEHOLDER -->",
    $readme
);

// Salve o arquivo atualizado
file_put_contents("README.md", $updatedReadme);

echo "README.md atualizado com sucesso!\n";
?>
