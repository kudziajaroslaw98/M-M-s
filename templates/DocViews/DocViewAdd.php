<?php

class DocViewAdd
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <?= Layout::header($params); ?>

        <div class="row d-flex justify-content-center">
            <div class="col-sm-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Upload Document Form</h1>
                    </div>
                    <form class="UploadDoc">
                        <div class="form-group">
                            <label for="UploadDoc">Pick file to Upload and click <strong>Upload</strong></label>
                            <input type="file" class="form-control-file" id="UploadDoc">
                        </div>
                        <div class="form-group">
                            <label for="HardwareNotes">Hardware notes</label>
                            <input type="text" class="form-control" id="HardwareNotes">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-user btn-block form-control-input" id="UploadSubmit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?= Layout::footer() ?>
<?php
        $html = ob_get_clean();
        return $html;
    }
}
