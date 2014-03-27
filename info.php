<?php
/**
 * Created by PhpStorm.
 * User: ejwettstein
 * Date: 3/26/14
 * Time: 5:02 PM
 */

require_once "DataReader.php";

// null result for errors and not found
$empty = "{}";

// set output header
header('Content-type: application/json');

// get the code if there is one
$inputCode = "";
if ($_GET["code"]) {
    $inputCode = $_GET["code"];
}

// validate the code, it must be 4 characters long exactly
if (strlen($inputCode) != 4) {
    // empty json object
    echo $empty;
    error_log("Bad input code.");
    exit;
}

$result = null;
try {
    $datasource = new DataReader("data.csv");
    $result = $datasource->getData($inputCode);
} catch (Exception $e)
{
    error_log($e);
}

if ($result != null) {
    echo json_encode($result);
} else {
    echo $empty;
    error_log("No results");
}
