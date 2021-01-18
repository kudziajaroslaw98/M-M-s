<?php

require __DIR__ . '\..\..\autoload.php';

$doc = new DocumentsRepository();
$doc->insertDoc($_POST);
header("Location: ./../../index.php?action=doc-add");
