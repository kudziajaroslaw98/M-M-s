<?php

require __DIR__ . '/../../autoload.php';

class Doc
{
    public function deleting($id, $file_to_delete)
    {
        try {
            global $config;
            $connect = new PDO($config['dsn'], $config['username'], $config['password']);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $sql = "DELETE FROM documents WHERE documentID = $id";
            $stmt = $connect->prepare($sql);
            $result = $stmt->execute();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        echo $file_to_delete;
        unlink($file_to_delete);
    }
}

$doc = new Doc();
$id = $_POST["id"];
$fileBefore = __DIR__ . $_POST["path"];
$fileAfter = str_replace('%', ' ', $fileBefore);
$doc::deleting($id, $fileAfter);
header("Location: /M-M-s/index.php?action=doc-show");
