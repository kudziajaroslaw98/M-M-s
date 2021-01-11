<?php

class DocViewShow
{
    public static function render(array $params = array(), $documents)
    {
        ob_start();
?>
        <?= Layout::header($params); ?>

        <div class="InvoicesFound card">
        <div class='card-header'>
            <div class="row">
                <div class='col-6'>
                    <form method="post">
                        <div class='row'>
                            <label for="search_document_name">Document Name: </label>
                            <input type="search" placeholder="Document Name" id="search_document_name" name="search_document_name" class='form-control search_user' value="documentName">
                        </div>
                        <div class='row'>
                            <p>Pliki od: </p>
                        </div>
                        <div class='row'>
                            <div class='row col-2 d-flex justify-content-center'>
                                <input type="checkbox" id="search_document_type2" name="search_document_type_desc" class='form-control search_user' value="Najnowszego">
                                <label for="search_document_type_desc">Najnowszego</label>
                            </div>
                            <div class='row col-2  d-flex justify-content-center'>
                                <input type="checkbox" id="search_document_type1" name="search_document_type_asc" class='form-control search_user' value="Najstarszego">
                                <label for="search_document_type_asc">Najstarszego</label>
                            </div>
                        </div>
                        <div class='row justify-content-center'>
                            <div class="form-group  col-8">
                                <input type="submit" class="btn btn-primary btn-user btn-block form-control-input mt-2" id="DocumentName" name="documentSearch">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <h5 class="card-header">Found Documents</h5>
            <div class="card-body">
        <?php
            foreach($documents as $document){
                self::renderRow($document);
            }
        ?>
            </div>

        </div>

        <?= Layout::footer() ?>
<?php
        $html = ob_get_clean();
        return $html;
    }

    private static function renderRow(Document &$document){

        $fileName = substr($document->getFilePath(),20);
        echo '
            <a href="'.$fileName.'" target="_blank">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto mr-2">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>

                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    '.substr($fileName,0,-4).'
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">'.$fileName.'</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        ';

    }
}
