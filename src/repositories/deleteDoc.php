<?php

require __DIR__ . '/../../autoload.php';


$doc = new DocumentsRepository();
$id = $_POST["id"];
$fileBefore = __DIR__ . $_POST["path"];
$fileAfter = str_replace('%', ' ', $fileBefore);
$doc->deleting($id, $fileAfter);
header("Location: /M-M-s/index.php?action=doc-show");
