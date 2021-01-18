<?php

class DocumentsRepository
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
            throw new Exception(NotificationHandler::handle("notification-danger", $e->getMessage()));
        }
    }

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
            throw new Exception(NotificationHandler::handle("notification-danger", $e->getMessage()));
        }
        echo $file_to_delete;
        unlink($file_to_delete);
    }

    public static function insertDoc($array)
    {
        try {

            global $config;
            $dataForm = new DataForm($array, array('Notes'), true, array('docName'));
            $dataForm->sanitizeData();  // must be before checking, because this replace ignoring values to null if they are empty
            if (!$dataForm->checkIfExistsData()) {
                throw new InvalidInputExcetion('Given data are invalid!');
            }
            if (!$dataForm->checkAllFiles('pdf')) {
                throw new InvalidInputExcetion('Only files in PDF format!');
            }

            // helping local variables
            $filename = $dataForm->dataFiles['docName']['name'];
            $filenameNoWhitespace = str_replace(' ', '%', $filename);
            $dictonaryPath = '/../../data/documents';


            // check if directory path is existing
            //if (!Validation::checkExistsDir($dictonaryPath)) {
            //    throw new InvalidArgumentException('Existing directory path does not exists!');
            //}

            $document = new Document();

            // helping local variable
            $filenameWithPath = __DIR__ . '/../../data/documents/' . $filenameNoWhitespace;

            // name without __DIR__ to store in database
            $fileNameToDb = '/../../data/documents/' . $filenameNoWhitespace;

            // set invoice object

            $document->setUploadTime(null)->setLastModificationTime(null)->setNotes($dataForm->data['docDescription'])->setFilePath($fileNameToDb)->setEditor($_SESSION['uid']);

            // check existing chosen file
            if (Validation::checkExistsFile($filenameWithPath)) {
                throw new InvalidInputExcetion('document with the same name already exists!');
            }

            // check inserting to db
            $connect = new PDO($config['dsn'], $config['username'], $config['password']);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $sql = "INSERT INTO documents VALUES (:documentID, :uploadTime, :lastModificationTime, :notes, :filePath, :editor)";
            $stmt = $connect->prepare($sql);

            $result = $stmt->execute(array(
                'documentID' => "",
                'uploadTime' => $document->getUploadTime(),
                'lastModificationTime' => $document->getLastModificationTime(),
                'notes' => $document->getNotes(),
                'filePath' => $document->getFilePath(),
                'editor' => $document->getEditor(),
            ));
            if (!$result) {
                throw new PDOException('Request processing error.');
            }

            // upload file on server
            $dataForm->uploadDoc($dataForm->dataFiles['docName'], $dictonaryPath);

            // all OK
            echo 'document has been added.';
        } catch (Exception $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public static function showDocs()
    {
        try {
            global $config;
            $connect = new PDO($config['dsn'], $config['username'], $config['password']);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $sql = "SELECT * FROM documents";
            $stmt = $connect->prepare($sql);
            $result = $stmt->execute();

            $documents = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $document = new Document();

                $document->setDocumentID($row['documentID'])
                    ->setUploadTime($row['uploadTime'])
                    ->setLastModificationTime($row['lastModificationTime'])
                    ->setNotes($row['notes'])
                    ->setFilePath($row['filePath'])
                    ->setEditor($row['editor']);
                array_push($documents, $document);
            }
            return $documents;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }
    public static function searchDocs($array, $type)
    {
        try {
            global $config;
            $name = Validation::sanitizeText($array['search_document_name']);
            $connect = new PDO($config['dsn'], $config['username'], $config['password']);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            if ($type == 'ASC') {
                $sql = "SELECT * FROM documents WHERE filePath LIKE :filePath ORDER BY uploadTime ASC";
            } else {
                $sql = "SELECT * FROM documents WHERE filePath LIKE :filePath ORDER BY uploadTime DESC";
            }
            $stmt = $connect->prepare($sql);
            $stmt->bindValue(":filePath", '%' . $name . '%');
            $stmt->execute();
            //$stmt->debugDumpParams();
            $documents = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $document = new Document();
                $document->setDocumentID($row['documentID'])
                    ->setUploadTime($row['uploadTime'])
                    ->setLastModificationTime($row['lastModificationTime'])
                    ->setNotes($row['notes'])
                    ->setFilePath($row['filePath'])
                    ->setEditor($row['editor']);
                array_push($documents, $document);
            }

            return $documents;
        } catch (Exception $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }
}
