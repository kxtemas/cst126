<?php
/*
 * Author: Katie Munoz
 * File: loginhandler.php
 * Date: 02/26/20
 *
 * Description:
 * An PHP form handler to process user's login information from MyPHPAdmin.
 */
?>
<?php
// error reporting
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// global variables and constants
$dbName = "activity";
$message = "";

define('EMPTY_STRING', "");

include ('myfuncs.php');

if (! isset($_POST['submit'])) {
    die("Submission failed, no data received.");
} else {
    {
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
        $Username = trim($Username);
        $Password = trim($Password);
    }

    $dbConnect = mysqli_connect(HOST_NAME, USER_NAME, PASSWORD);
    if (! $dbConnect) {
        echo "<p>Connection error: " . mysqli_connect_error() . "</p>";
    }
    // select database
    if (mysqli_select_db($dbConnect, $dbName)) {
        // success

        // username cannot be empty
        if ($Username === NULL || $Username === EMPTY_STRING) {
            echo "<p>User name is a <em>required</em> field,
                it cannot be a blank</p>";
        } // password cannot be empty
        else if ($Password === NULL || $Password === EMPTY_STRING) {
            echo "<p>Password is a <em>required</em> field,
                it cannot be a blank</p>";
        } 
        else {
            $tableName = "Users";
            // Look up the data in the databsase and see if it is valid.

            $sql = "SELECT userID, Username, Password
             FROM $tableName 
             WHERE Username='" . $Username . "' AND Password= '" . $Password . "'";

            if ($result = mysqli_query($dbConnect, $sql)) {
                // if user login matches to any info on database
                $nbrRows = mysqli_num_rows($result);
                if ($nbrRows == 1) {
                    $row = $result->num_rows;
                    setUserID($row['userID']);
                    include ('loginresponse.php');
                } else if ($nbrRows == 0) {
                    $message = "<p><em>Login failed :( </em></p>
                 Invalid User Name or Password. <br>
                 Please register or try again.";
                    include ('loginfailed.php');
                    include ('index.html');
                } else {
                    $message = "<p><em>There are multiple users with
                       same login information.</em></p>";
                    include ('loginfailedm3.php');
                }
            } 
            else {
                echo "<p> Error:" . mysqli_error($dbConnect) . "</p>";
            }
        }
    } // if failed
    else {
        echo "<p> Could not select the " . $dbName . " database: " . mysqli_errno($dbConnect) . "</p>";
    }
    // if success

    mysqli_close($dbConnect);
}
?>