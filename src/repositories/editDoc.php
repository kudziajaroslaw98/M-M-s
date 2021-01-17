<?php

require __DIR__ . '/../../autoload.php';

class Doc
{
    public function editing($id, $notes, $mod, $editor)
    {
        try {
            global $config;
            $connect = new PDO($config['dsn'], $config['username'], $config['password']);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $sql = "UPDATE documents SET notes = '$notes', lastModificationTime = '$mod', editor = '$editor' WHERE documentID=$id";
            $stmt = $connect->prepare($sql);
            $result = $stmt->execute();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

$doc = new Doc();
$id = $_POST["id"];
$newNotes = $_POST["notes"];
$mod = date("Y-m-d H:i:s", time());
$editor = $_COOKIE["username"];
$doc->editing($id, $newNotes, $mod, $editor);
header("Location: /M-M-s/index.php?action=doc-show");
