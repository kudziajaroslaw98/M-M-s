<?php

require __DIR__ . '\..\..\autoload.php';

$doc = new DocumentsRepository();
$doc->insertDoc($_POST);
header("Location: /M-M-s/index.php?action=doc-add");

