<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" ENCTYPE="multipart/form-data">
        <input type="text" name="mytext" id="mytext">
        <input type="file" name="myfile" id="myfile">
        <input type="submit" value="Submit!">
    </form>
    <hr>
</body>

<?php

try {
    require_once './DataForm.php';

    $data = new DataForm($_POST, true, array('myfile'));
    $data->checkExistsData();
    $data->sanitizeData();
    if ($data->checkAllFiles('pdf') == false) {
        throw new Exception('Only files in PDF format!');
    }

    echo 'File is OK.<br>';

    if (!$data->uploadAllFiles('documents', true, true)) {
        echo 'Upload file error.';
    }

    echo 'All OK';
} catch (Exception $e) {
    echo $e->getMessage();
}

?>

</html>