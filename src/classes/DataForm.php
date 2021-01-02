<?php

/**
 * This class keep data which was submited to server from form.
 * 
 * @var array $data - keeps data which were sent from request table like $_GET or $_POST
 * @var array $dataIgnores - keeps data nems which will be ignoring in validation data
 * @var bool $isFalse - determines if script it to except the file.
 * @var array $dataFiles - keeps names of file from form, which script is excepted. If @param bool $isFalse is false, then it has no use.
 * @var bool $allFilesOk - determines if all files which were sent from request are valid
 */
class DataForm
{
    public array $data;
    public array $dataIgnores;
    public bool $isFile;
    public array $dataFiles;

    private bool $allFilesOk;

    /**
     * Constructor of class.
     * @param array $data - default value = array(). 
     * @param bool $isFalse - default value = false.
     * @param array $dataFilesNames - default value = array()
     */
    public function __construct(array $data = array(), array $dataIgnores = array(), bool $isFile = false, array $dataFilesNames = array())
    {
        $this->data = $data;
        $this->dataIgnores = $dataIgnores;
        $this->isFile = $isFile;
        $this->dataFiles = $dataFilesNames;

        $this->allFilesOk = false;
    }

    /**
     * Check if exists data from dataset form.
     * If all values from dataset form exists then automatic remember given all files.
     * @return true
     */
    public function checkIfExistsData()
    {
        // not exists dataset
        if (empty($this->data)) {
            throw new InvalidInputExcetion('Not taken anything data!');
            return false;
        }

        // check each data in dataset
        foreach ($this->data as $key => $value) {
            if (!isset($value)) {
                throw new InvalidInputExcetion('Not isset all values!');
            }

            // skip chosen fields
            if (empty($value) && !in_array($key, $this->dataFiles) && !in_array($key, $this->dataIgnores)) {
                // echo $key;
                throw new InvalidInputExcetion('All fields must be fill!');
                return false;
            }
            if (empty($value) && in_array($key, $this->dataIgnores)) {
                $this->data[$key] = null;
                continue;
            }

            // remember data
            $this->data[$key] = $value;
        }

        // check files if they were supposed to send
        if ($this->isFile) {
            // check if it is sent anything file names
            if (empty($this->dataFiles)) {
                throw new InvalidInputExcetion('Not sent anything file names!');
                return false;
            }

            // remember files
            $temp = array();
            $keys_globalFiles = array_keys($_FILES);

            // tests
            // var_dump($keys_globalFiles);
            // var_dump($this->dataFiles);
            // var_dump($_FILES);

            // if user not sent any files
            for ($i = 0; $i < count($this->dataFiles); $i++) {
                $key = $keys_globalFiles[$i];
                if ($this->dataFiles[$i] != $key) {
                    throw new InvalidInputExcetion('Not sent anything files!');
                    return false;
                }
                $temp[$key] = $_FILES[$key];
            }
            $this->dataFiles = $temp;
        }

        return true;
    }

    /**
     * Sanitize remembered data as string.
     * @return void
     */
    public function sanitizeData()
    {
        Validation::sanitizeStringArray($this->data);
    }

    /**
     * Check all remembered files. This function uses function checkFile to check single file.
     * @param string $extention - default value = 'pdf'
     * @return bool
     */
    public function checkAllFiles($extention = 'pdf')
    {
        // if (empty($this->dataFiles)) {
        //     throw new Exception('No files to check!');
        //     return false;
        // }

        foreach ($this->dataFiles as $key => $value) {
            if (Validation::checkFile($value, $extention) == false) {
                return false;
            }
        }

        $this->allFilesOk = true;
        return true;
    }

    public function uploadAllFiles($path = './../data/documents', bool $overwriteExistsFile = false, bool $createIfDirNotExists = false)
    {
        if ($this->isFile && $this->allFilesOk) {
            foreach ($this->dataFiles as $key => $file) {
                $this->uploadFile($file, $path, $overwriteExistsFile, $createIfDirNotExists);
            }
        } else {
            throw new InvalidInputExcetion('Not all files are validating!');
            return false;
        }

        return true;
    }

    public function uploadFile($file, string $dirPath = './../data/documents', bool $overwriteExistsFile = false, bool $createIfDirNotExists = false)
    {
        // check if file with the same name already exists
        if (Validation::checkExistsFile($dirPath . '/' . $file['name'])) {
            if (!$overwriteExistsFile) {
                throw new Exception('Not saved file with the name ' . $file['name'] . '. File with the same name is already exists!');
                return false;
            }
        }

        // check if directory from given path does exists
        if (!Validation::checkExistsDir($dirPath)) {
            // directory does not exists and do not create new directory
            if (!$createIfDirNotExists) {
                throw new InvalidArgumentException('The specified directory does not exists!');
                return false;
            }

            // directory does not exists and create new directory
            if (!mkdir($dirPath, 0755, true)) {
                throw new Exception('Creation error directory.');
                return false;
            }
        }

        // upload file
        if (is_uploaded_file($file['tmp_name'])) {
            if (!move_uploaded_file($file['tmp_name'], $dirPath . '/' . $file['name'])) {
                throw new Exception('Failed to copy the file on server.');
                return false;
            }
        } else {
            throw new Exception('Request error! File has not been saved.');
            return false;
        }

        return true;
    }
}
