<?php

require __DIR__ . '\..\..\autoload.php';

class DocController
{
    public static function renderViewAdd()
    {
        echo DocViewAdd::render(array(
            'title' => 'Upload Documents',
            'subtitle' => 'Upload Documents'
        ));
        if(isset($_POST['docSubmit'])){
            DocumentsRepository::insertDoc($_POST);
        }
    }

    public static function renderViewShow($array = null)
    {
        try{
            if(isset($_POST['documentSearch'])){
                if(isset($_POST['search_document_type_asc']) && isset($_POST['search_document_type_desc'])){
                    throw new Exception("Check one option");
                }
                elseif(empty($_POST['search_document_type_asc']) && empty($_POST['search_document_type_desc'])){
                    throw new Exception("Check one option");
                }
                elseif(isset($_POST['search_document_type_asc'])){
                    echo DocViewShow::render(array(
                        'title' => 'Show Documents',
                        'subtitle' => 'Your Documents'
                    ), DocumentsRepository::searchDocs($_POST, 'ASC'));
                }
                else{
                    echo DocViewShow::render(array(
                        'title' => 'Show Documents',
                        'subtitle' => 'Your Documents'
                    ), DocumentsRepository::searchDocs($_POST, 'DESC'));
                }
            }
            else{
                echo DocViewShow::render(array(
                    'title' => 'Show Documents',
                    'subtitle' => 'Your Documents'
                ), DocumentsRepository::showDocs());
            }
        }
        catch(Exception $e){
            echo NotificationHandler::handle("notification-warning", $e->getMessage());
            echo DocViewShow::render(array(
                'title' => 'Show Documents',
                'subtitle' => 'Your Documents'
            ), DocumentsRepository::showDocs());
        }
    }



}
