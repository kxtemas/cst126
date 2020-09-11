<?php 
/* 
  Author: Katie Munoz
  File: registerandler.php
  Date: 01/21/20
  
  Description:
  An PHP form handler to process user input for registration  
  */
?>
<?php 
// error reporting
ini_set('display_errors','1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// global variables and constants
$dbName = "activity";

define('HOST_NAME', "localhost");
define('USER_NAME', "root");
define('PASSWORD', "root");
define('EMPTY_STRING', "");

if (!isset($_POST['submit']))
{
    die("Submission failed, no data received.");
}
else 
{
    {
        $eMail = $_POST['eMail'];
        $phoneNumber = $_POST['phoneNumber'];
        $Password = $_POST['Password'];
        $confirmPassword = $_POST['confirmPassword'];
        
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $firstName = trim($firstName);
        $lastName = trim($lastName);
        
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
        $Username = trim($Username);
        $Password = trim($Password);
    
}
    $dbConnect = new mysqli(HOST_NAME, USER_NAME, PASSWORD, $dbName);
if (!$dbConnect)
        {
    echo "<p>Connection error: " . $dbConnect->error . "</p>";
        }
    else{
//     // select database 
//     if (mysqli_select_db($dbConnect, $dbName)) 
//         {
//    // success    
//           echo "<p> Successfully select the " . $dbName .
//           " database. </p>";
         // echo "<p>" . $firstName . " " . $lastName . "" . "</p>";
    if($firstName === NULL || 
         $firstName === EMPTY_STRING) 
        {
         echo "<p>First name is a <em>required</em> field,
                it cannot be a blank</p>";
        }
    else if ($lastName === NULL ||
                  $lastName === EMPTY_STRING)
        {
         echo "<p>Last name is a <em>required</em> field,
                it cannot be a blank</p>";
        }
    else {
         $tableName = "Users";
         
         $sql = "INSERT INTO $tableName (firstName, lastName, Username, Password, confirmPassword, eMail, phoneNumber)
         VALUES('$firstName', '$lastName', '$Username', '$Password', '$confirmPassword', '$eMail', '$phoneNumber')";
    if ($result = $dbConnect->query($sql)) {
             //echo "<p>Congratulations sir or m'am, you are now registered!</p>";
        include ('loginhandler.php');
        }
   else {
            echo "<p> Error:"
             . $dbConnect->error . "</p>";
            }
        
          }
       }
//     else 
//         {
//          echo "<p> Could not select the " . $dbName . 
//           " database: " . mysqli_errno($dbConnect) . "</p>";
//         }
         echo "Database Closing";
             $dbConnect->close();
 } 
?>