<?php

require_once './Validation.php';

/**
 * This class keep data which was submited to server from form.
 * 
 * @var Validation $validation - instance object of class to validating data. Creating a new instance of this class in constructor.
 * @var array $data - keeps data which were sent from request table like $_GET or $_POST
 * @var bool $isFalse - determines if script it to except the file.
 * @var array $dataFiles - keeps names of file from form, which script is excepted. If @param bool $isFalse is false, then it has no use.
 */
class DataForm
{
    public Validation $validation;
    public array $data;
    public bool $isFile;
    public array $dataFiles;

    /**
     * Constructor of class.
     * @param array $data - default value = array(). 
     * @param bool $isFalse - default value = false.
     * @param array $dataFilesNames - default value = array()
     */
    public function __construct(array $data = array(), bool $isFile = false, array $dataFilesNames = array())
    {
        $this->validation = new Validation();
        $this->data = $data;
        $this->isFile = $isFile;
        $this->dataFiles = $dataFilesNames;
    }

    /**
     * Check if exists data from dataset form.
     * If all values from dataset form exists then automatic remember given all files.
     * @return true
     */
    public function checkExistsData()
    {
        // not exists dataset
        if (empty($this->data)) {
            throw new Exception('Not taken anything data!');
            return false;
        }

        // check each data in dataset
        foreach ($this->data as $key => $value) {
            if (!isset($value)) {
                throw new Exception('Not isset all values!');
            }

            if (empty($value)) {
                throw new Exception('All fields must be fill!');
                return false;
            }

            // remember data
            $this->data[$key] = $value;
        }

        // check files if they were supposed to send
        if ($this->isFile) {
            // check if it is sent anything file names
            if (empty($this->dataFiles)) {
                throw new Exception('Not sent anything file names!');
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
                    throw new Exception('Not sent anything files!');
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
        $this->validation->sanitizeStringArray($this->data);
    }

    /**
     * Check if variable is file type, then check if file is ok and check extention of file.
     * @param file $file
     * @param string $extention default value = 'pdf' 
     * @return bool
     */
    public function checkFile($file, $extention = 'pdf')
    {
        if (empty($file)) {
            throw new Exception('No files to check!');
            return false;
        }

        // if (get_resource_type($file) != 'file') {
        //     return false;
        // }

        if ($this->validation->validateFile($file, $extention) == false) {
            return false;
        }

        return true;
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
            if ($this->checkFile($value, $extention) == false) {
                return false;
            }
        }

        return true;
    }
}
