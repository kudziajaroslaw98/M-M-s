<?php

require __DIR__ . '/../../autoload.php';


$doc = new DocumentsRepository();
$id = $_POST["id"];
$newNotes = $_POST["notes"];
$mod = date("Y-m-d H:i:s", time());
$editor = $_SESSION['uid'];
$doc->editing($id, $newNotes, $mod, $editor);
header("Location: ./../../index.php?action=doc-show");
