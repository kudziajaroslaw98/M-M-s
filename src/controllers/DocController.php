<?php

class DocController
{
    public static function renderViewAdd()
    {
        echo DocViewAdd::render(array(
            'title' => 'Upload Documents',
            'subtitle' => 'Upload Documents'
        ));
        if(isset($_POST['docSubmit'])){
            self::insertDoc($_POST);
        }
    }

    public static function renderViewShow($array = null)
    {
        if(isset($_POST['documentSearch'])){
            echo DocViewShow::render(array(
                'title' => 'Show Documents',
                'subtitle' => 'Your Documents'
            ), self::searchDocs($_POST));
        }
        else{
            echo DocViewShow::render(array(
                'title' => 'Show Documents',
                'subtitle' => 'Your Documents'
            ), self::showDocs());
        }
    }

    public static function insertDoc($array){
        try{

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
                $dictonaryPath = './../data/documents';


                // check if directory path is existing
                if (!Validation::checkExistsDir($dictonaryPath)) {
                    throw new InvalidArgumentException('Existing directory path does not exists!');
                }

                $document = new Document();

                // helping local variable
                $filenameWithPath = $dictonaryPath . '/' . $filename;

                // set invoice object

                $document->setUploadTime(null)->setLastModificationTime(null)->setNotes($dataForm->data['docDescription'])->setFilePath($filenameWithPath);

                // check existing chosen file
                if (Validation::checkExistsFile($filenameWithPath)) {
                    throw new InvalidInputExcetion('document with the same name is already exists!');
                }

                // check inserting to db
                $connect = new PDO($config['dsn'], $config['username'], $config['password']);
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $sql = "INSERT INTO documents VALUES (:documentID, :uploadTime, :lastModificationTime, :notes, :filePath)";
                $stmt = $connect->prepare($sql);

                $result = $stmt->execute(array(
                    'documentID' => "",
                    'uploadTime' => $document->getUploadTime(),
                    'lastModificationTime' => $document->getLastModificationTime(),
                    'notes' => $document->getNotes(),
                    'filePath' => $document->getFilePath(),
                ));
                if (!$result) {
                    throw new PDOException('Request processing error.');
                }

                // upload file on server
                // $dataForm->uploadFile($dataForm->dataFiles['docName'], $dictonaryPath);

                // all OK
                echo 'document has been added.';

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function showDocs(){
        try{
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
                        ->setFilePath($row['filePath']);
                array_push($documents, $document);
            }
            return $documents;
        } catch (PDOException $e) {
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }

    public static function searchDocs($array){
        try{
            global $config;
            $name = Validation::sanitizeText($array['search_document_name']);
            $connect = new PDO($config['dsn'], $config['username'], $config['password']);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $sql = "SELECT * FROM documents WHERE filePath LIKE :filePath";
            $stmt = $connect->prepare($sql);

            $result = $stmt->execute(array(
                'filePath' => "./../data/documents/".$name . '%'
            ));
            $documents = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $document = new Document();
                $document->setDocumentID($row['documentID'])
                        ->setUploadTime($row['uploadTime'])
                        ->setLastModificationTime($row['lastModificationTime'])
                        ->setNotes($row['notes'])
                        ->setFilePath($row['filePath']);
                array_push($documents, $document);
            }

            return $documents;

        }catch(Exception $e){
            echo NotificationHandler::handle("notification-danger", $e->getMessage());
        }
    }
}
