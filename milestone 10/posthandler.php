<?php
/*
 * Author: Katie Munoz
 * File: posthandler.php
 * Date: 02/27/20
 *
 * Description:
 * An PHP form handler to process user input for creating a blog post.
 */
?>
<?php
// error reporting
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// sessions
include ('session.php');
include ('myfuncs.php');
// global variables and constants
$dbName = "activity";
$tableName = "posts";
$userID = getUserID();

define('EMPTY_STRING', "");

if (! isset($_POST['submit'])) {
    die("Submission failed, no data received.");
} else {
    {

    $title = $_POST['Title'];
    $content = $_POST['Content'];
    $title = trim($title);
    $content = trim($content);
}

$dbConnect = connect($dbName);
if ($dbConnect) {
 //   echo "<p>User ID: <br> $userID <br> Title: <br> $title <br> Content: <br> $content </p>";
    if ($title === NULL || $title === EMPTY_STRING) {
        echo "<p>Title is a <em>required</em> field,
            it cannot be a blank</p>";
        
    } else if ($content === NULL || $content === EMPTY_STRING) {
        echo "<p>Content is a <em>required</em> field,
            it cannot be a blank</p>";
        
    } else {
        $sql = "INSERT INTO $tableName (userID_PostsBy, Title, Content)
        VALUES('$userID', '$title', '$content')";
   
        if ($result = $dbConnect->query($sql)) {
            include ('postresponse.php');
        }         
    }
}
   //  echo "Database Closing";
    $dbConnect->close();
}

?>