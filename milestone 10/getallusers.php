<?php
/*
 Author: Katie Munoz
 File: getallusers.php
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

    $dbConnect = mysqli_connect(HOST_NAME, USER_NAME, PASSWORD);
    
    echo "<h2>Milestone 7 </h2>";
if (!$dbConnect)
        {
        echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
        exit ();
            }
            else
            {
        // select database 
        if (mysqli_select_db($dbConnect, $dbName)) 
            {
         // success    
              echo "<p> Successfully select the " . $dbName .
              " database. </p>";
             $tableName = "Users";
             $sql = "SELECT * FROM $tableName";
        if ($result = mysqli_query($dbConnect, $sql)) 
                {
                 echo "<h3>Users</h3>";
                 if(mysqli_num_rows($result)>0) {
//                      echo "<p> Number of users are registrered in
//                      table <strong>$tableName</strong>" 
//                      . mysqli_num_fields($result). "</p>";
                 $rowNbr = 0;
                 // so basicallu this will allow the code to find the information put into the rows to execute their information onto the localhost browser.
                 while($row = mysqli_fetch_assoc($result)) {
                     // combined assignment OPERATOR: $rowNbr = $rowNbr + 1 ---shortcut to do $rowNbr++ instead
                     // $rowNbr allows it to add itself and a '1' everytime it loops
                     $rowNbr++;
                     echo "<strong>$rowNbr</strong> " .$row['userID'] . " " . 
                     $row ['firstName'] . " " . $row['lastName'] . " " . "<br>";
                     
                 }
                 
                 }
                 else {
                     echo "<p> No users are registrered in 
                     table <strong>$tableName</strong>/p>";
                     
                 }
                     
                 }
                 
        else {
                echo "<p> Error:"
                 . mysqli_error($dbConnect) . "</p>";
        }

            }
          
        else 
            {
             echo "<p> ERROR: Could not select the " . $dbName . 
              " database: " . mysqli_errno($dbConnect) . "</p>";
            }
             echo "<br> Database Closing";
             mysqli_close($dbConnect);
            }

    ?>