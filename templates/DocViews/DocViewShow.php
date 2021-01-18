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
                                <input type="search" placeholder="Type the name of a document here" id="search_document_name" name="search_document_name" class='form-control search_user'>
                            </div>
                            <div class='row'>
                                <p>Order: </p>
                            </div>
                            <div class='row'>
                                <div class='row col-2 d-flex justify-content-center'>
                                    <input type="checkbox" id="search_document_type2" name="search_document_type_desc" class='form-control search_user' value="Najnowszego">
                                    <label for="search_document_type_desc">Newest first</label>
                                </div>
                                <div class='row col-2  d-flex justify-content-center'>
                                    <input type="checkbox" id="search_document_type1" name="search_document_type_asc" class='form-control search_user' value="Najstarszego">
                                    <label for="search_document_type_asc">Oldest first</label>
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
                foreach ($documents as $document) {
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

    private static function renderRow(Document &$document)
    {
        $userReposiotory = new UserRepository();
        $user = $userReposiotory->findById($document->getEditor());

        $fileName = substr($document->getFilePath(), 22);
        $notes = $document->getNotes();
        $id = $document->getDocumentID();
        $filePath = $document->getFilePath();
        $modification = $user->getFirstName() . ' ' . $user->getLastName();

        echo '
            <a href="./data/documents/' . str_replace('%', ' ', $fileName) . '" target="_blank">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto mr-2">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>

                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    ' . substr(str_replace('%', ' ', $fileName), 0, -4) . '
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">' . substr(str_replace('%', ' ', $fileName), 0, -4) . '</div>
                                    </div>
                                </div>
                                </a>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h4 mb-0 mr-3">' . $notes . '</div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <form action="./src/repositories/editDoc.php"  method= ' . "POST" . '>
                                            <input type = hidden value = ' . $id . ' name="id">
	                                        <input class="form-control form-control-sm" type="text" placeholder="Edit notes" name="notes">                                             
                                            <button type="submit" id="DocEdit" class="btn btn-primary btn-sm mt-2"><i class="far fa-edit"></i></button>
                                        </form>
                                        <form action="./src/repositories/deleteDoc.php"  method= ' . "POST" . '>
                                            <input type = hidden value = ' . $id . ' name="id">
                                            <input type = hidden value = ' . $filePath . ' name="path">
                                            <button type="submit" id="DocDelete" class="btn btn-primary btn-sm mt-2""><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <h6>Last modification by: ' . $modification . '</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        ';
    }
}
