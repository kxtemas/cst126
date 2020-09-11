<?php
/*
 Author: Katie Munoz
 File: myfuncs.php
 Date: 02/18/20
 
 Description:
 An PHP form handler to process user input for registration
 */
// error reporting
ini_set('display_errors','1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


define('HOST_NAME', "localhost");
define('USER_NAME', "root");
define('PASSWORD', "root");
/**
 * @param dbName
 */

function connect($dbName)
{
    $dbConnect = new mysqli(HOST_NAME, USER_NAME, PASSWORD, $dbName);
    if (!$dbConnect)
    {
        echo "<p>Connection error: " . $dbConnect->error . "</p>";
    }
    return $dbConnect;    
}

function setUserID($id) {
    $_SESSION['userID'] = $id;
    
}

function getUserID() {
    return $_SESSION['userID'];
}
?>
