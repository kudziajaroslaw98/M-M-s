<?php

class Validation
{
    private static string $defaultDate = 'Lifeless';

    public static function sanitizeEmail($email)
    {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public static function sanitizeText($text)
    {
        return filter_var($text, FILTER_SANITIZE_STRING);
    }

    public static function sanitizeURL($url)
    {
        return filter_var($url, FILTER_SANITIZE_URL);
    }

    public static function sanitizeInt($number)
    {
        return filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    }

    public static function sanitizeFloat($number)
    {
        return filter_var($number, FILTER_SANITIZE_NUMBER_FLOAT);
    }

    public static function sanitizeStringArray(&$array)
    {
        foreach ($array as $key => &$value) {
            $value = self::sanitizeText($value);
        }

        return $array;
    }

    public static function replaceStr($strToFind, $strToReplace, $strText)
    {
        $strToFind = self::sanitizeText($strToFind);
        $strToReplace = self::sanitizeText($strToReplace);
        $strText = self::sanitizeText($strText);

        return str_replace($strToFind, $strToReplace, $strText);
    }

    /**
     * Check if variable is file type, then check if file is ok and check extention of file.
     * @param file $file
     * @param string $extention default value = 'pdf'
     * @return bool
     */
    public static function checkFile($file, $extention = 'pdf')
    {
        if (empty($file)) {
            throw new InvalidInputExcetion('No files to check!');
            return false;
        }

        // if (get_resource_type($file) != 'file') {
        //     return false;
        // }

        if (self::validateFile($file, $extention) == false) {
            return false;
        }

        return true;
    }

    private static function validateFile($file, $exceptExtention = "pdf")
    {
        // allowed extentions
        $mime_filter = array(
            'image/gif', 'image/jpeg', 'image/png',
            'application/pdf',
            'audio/mpeg', 'audio/mpeg3', 'audio/x-mpeg', 'audio/x-mpeg-3'
        );
        $mime = array();  // array without extension prefix

        // served extention in argument $exceptExtention
        foreach ($mime_filter as $filter) {
            array_push($mime, substr($filter, strpos($filter, '/') + 1));
        }

        // check if given extention exists
        if (in_array($exceptExtention, $mime) === false) {
            throw new InvalidInputExcetion("Not allowed file extention!");
        }

        // remember given extention with prefix
        $typeOfFile = $mime_filter[array_search($exceptExtention, $mime)];

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

    public static function validateLicense($license, $separatorCharacters = "/-")
    {
        // license cannot have spaces
        if (strpos($license, " ") !== false) {
            return false;
        }

        // find separator
        $separator = null;
        $charactersArray = str_split($separatorCharacters);
        foreach ($charactersArray as $char) {
            // license has char
            if (strpos($license, $char) !== false) {
                $separator = $char;
                break;
            }
        }

        // check if separator was finding
        if (is_null($separator)) {
            return false;
        }

        // check length all parts in license
        $license = explode($separator, $license);
        $lenPart = strlen($license[0]);
        foreach ($license as $part) {
            if (strlen($part) != $lenPart) {
                return false;
            }
        }

        return true;
    }

    public static function validateDateAndConvert($date)
    {
        // date can be null
        if (is_null($date)) {
            return $date;
        }

        // change taken string date to date object
        $localDate = strtotime($date);
        if (!$localDate) {
            throw new InvalidArgumentException('Given date has invalid format!');
            return false;
        }

        // convert date object to date array
        $rigthDate = getDate($localDate);
        if (!$rigthDate) {
            throw new InvalidArgumentException('Error procesing given string date to date class!');
            return false;
        }

        // check if date is valid
        if (!checkdate($rigthDate['mon'], $rigthDate['mday'], $rigthDate['year'])) {
            throw new InvalidArgumentException('Given data is not valid date!');
            return false;
        }

        // return date in below format
        return $rigthDate['year'] . "-" . $rigthDate['mon'] . "-" . $rigthDate['mday'];
    }

    public static function checkExistsDir(string $filename)
    {
        if (!is_dir($filename)) {
            return false;
        }

        return true;
    }

    public static function checkExistsFile(string $filename)
    {
        if (!is_file($filename)) {
            return false;
        }

        return true;
    }
}
