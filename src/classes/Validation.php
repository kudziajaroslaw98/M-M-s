<?php

class Validation
{
    public $mime_filter = array(
        'image/gif', 'image/jpeg', 'image/png',
        'application/pdf',
        'audio/mpeg', 'audio/mpeg3', 'audio/x-mpeg', 'audio/x-mpeg-3'
    );
    private $mime = array();  // array without extension prefix

    public function __construct()
    {
        foreach ($this->mime_filter as $filter) {
            array_push($this->mime, substr($filter, strpos($filter, '/') + 1));
        }
    }

    public function sanitizeEmail($email)
    {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public function sanitizeText($text)
    {
        return filter_var($text, FILTER_SANITIZE_STRING);
    }

    public function sanitizeURL($url)
    {
        return filter_var($url, FILTER_SANITIZE_URL);
    }

    public function sanitizeInt($number)
    {
        return filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    }

    public function sanitizeFloat($number)
    {
        return filter_var($number, FILTER_SANITIZE_NUMBER_FLOAT);
    }

    public function sanitizeStringArray(&$array)
    {
        foreach ($array as $key => &$value) {
            $value = $this->sanitizeText($value);
        }

        return $array;
    }

    public function replaceStr($strToFind, $strToReplace, $strText)
    {
        $strToFind = $this->sanitizeText($strToFind);
        $strToReplace = $this->sanitizeText($strToReplace);
        $strText = $this->sanitizeText($strText);

        return str_replace($strToFind, $strToReplace, $strText);
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
            throw new InvalidInputExcetion('No files to check!');
            return false;
        }

        // if (get_resource_type($file) != 'file') {
        //     return false;
        // }

        if ($this->validateFile($file, $extention) == false) {
            return false;
        }

        return true;
    }

    private function validateFile($file, $exceptExtention = "pdf")
    {
        // check if given extention exists
        if (in_array($exceptExtention, $this->mime) === false) {
            throw new InvalidInputExcetion("Not allowed file extention!");
        }

        // remember given extention with prefix
        $typeOfFile = $this->mime_filter[array_search($exceptExtention, $this->mime)];

        // file error handling
        if ($file['error'] > 0) {
            switch ($file['error']) {
                    // jest większy niż domyślny maksymalny rozmiar podany w pliku konfiguracyjnym
                case 1: {
                        throw new Exception('Size of file is too big!');
                        break;
                    }

                    // jest większy niż wartość pola formularza MAX_FILE_SIZE
                case 2: {
                        throw new Exception('Size of file is too big!');
                        break;
                    }

                    // plik nie został wysłany w całości
                case 3: {
                        throw new Exception('File has been partialy sent!');
                        break;
                    }

                    // plik nie został wysłany
                case 4: {
                        throw new Exception('Has not been sent any file!');
                        break;
                    }

                    //zaginiony folder tymczasowy
                case 6: {
                        throw new Exception('Temporary folder of files not exists!');
                        break;
                    }

                    //błąd zapisu na dysku
                case 7: {
                        throw new Exception('Writing error, no permissions!');
                        break;
                    }

                    //zbyt długi czas zapisu
                case 8: {
                        throw new Exception('Writing error, too long time writing!');
                        break;
                    }

                    // pozostałe błędy
                default: {
                        throw new Exception('Sending error!');
                        break;
                    }
            }

            return false;
        }

        // check file type
        if ($file['type'] != $typeOfFile) {
            throw new Exception('Chosen file has invalid format!');
            return false;
        }

        // all ok
        return true;
    }

    public function validateLicense($license, $characters = "/-")
    {
        if (strpos($license, " ") === false) {
            return false;
        }

        $charactersArray = str_split($characters);
        foreach ($charactersArray as $char) {
            if (in_array($char, $license) === false) {
                return false;
            }
        }

        return true;
    }

    private function findSeparator($data, bool $isNumeric = true)
    {
        $separator = '';
        $splitData = str_split($data);
        foreach ($splitData as $key => $value) {
            if ($isNumeric) {
                if (!is_numeric($value)) {
                    $separator = $value;
                    return $separator;
                }
            } else {
                if (!ctype_alpha($value)) {
                    $separator = $value;
                    return $separator;
                }
            }
        }
    }

    public function validateDate(string $date, string $format = 'Y-m-d')
    {
        // find format separator
        $formatSeparator = $this->findSeparator($format, false);
        $format = explode($formatSeparator, $format);
        if (count($format) != 3) {
            throw new InvalidInputExcetion('Given format date is invalid!');
            return false;
        }

        // find date separator
        $dateSeparator = $this->findSeparator($date, true);
        $date = explode($dateSeparator, $date);
        if (count($date) != 3) {
            throw new InvalidInputExcetion('Given date is invalid!');
            return false;
        }

        // find year, month, day in given date
        $goodDate = array();
        for ($i = 0; $i < count($date); $i++) {
            if (strtoupper($format[$i]) == 'Y') {
                $goodDate[0] = $date[$i];
            } else if (strtoupper($format[$i]) == 'M') {
                $goodDate[1] = $date[$i];
            } else if (strtoupper($format[$i]) == 'D') {
                $goodDate[2] = $date[$i];
            } else {
                throw new InvalidInputExcetion('Given format date is invalid!');
                return false;
            }
        }

        // check date (example: invalid is 31-02-2020)
        if (!checkdate($goodDate[1], $goodDate[2], $goodDate[0])) {
            return false;
        }

        return true;
    }

    public function checkExistsDir(string $filename)
    {
        if (!is_dir($filename)) {
            return false;
        }

        return true;
    }

    public function checkExistsFile(string $filename)
    {
        if (!is_file($filename)) {
            return false;
        }

        return true;
    }
}
