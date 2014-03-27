<?php
/**
 * Created by PhpStorm.
 * User: ejwettstein
 * Date: 3/26/14
 * Time: 4:39 PM
 */

/**
 * Class DataReader
 *
 * May want to inherit for a base object and use a factory to get the specific access method.
 */
class DataReader {

    private $handle;

    public function __construct($fileName){

    $this->handle =  fopen($fileName, "r");
    if (!$this->handle) {
            throw new Exception("Bad file name: " . $fileName);
    }

    }

    public function getData($universityCode) {
        $universityCode = strtolower($universityCode);
        while ($data = fgetcsv($this->handle, 500, ",")) {
            // this may need validation, can I trust the datasource
            list($code, $name, $url, $logo) = $data;
            if (strtolower($code) === $universityCode) {
                $result = array(name=>$name, url=>$url, logo=>$logo);
                return $result;
            }
        }
        return null;
    }

    function __destruct() {
        fclose($this->handle);
    }
}
