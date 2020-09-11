<?php
/*
 * Author: Katie Munoz
 * File: utlity.php
 * Date: 02/27/20
 *
 * Description:
 * An PHP form to handle CRUD operations
 */
// error reporting
?>
<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


// global variables and constants
$dbName = "activity";
$tableName = "users";
$posttableName = "posts";

// include ('myfuncs.php');

// getAllUsers($dbName, $tableName);
// echo "<p> print_r \$testArray<br>";
// print_r($testArray);
// echo"</p>";


/**
 * @param dbName
 * @param tableName
 * @param userID
 * @param content
 * @param content
 * @param dbConnect
 * @param sql
 * @param result
 */

function getAllUsers($dbName, $tableName)
{
    $users = array();
    $index = 0;
    $dbConnect = connect($dbName);
    if ($dbConnect) {
        $sql = "SELECT * FROM $tableName";

        if ($result = $dbConnect->query($sql)) {
            echo "<h3>Users</h3>";
            if ($result->num_rows == 0) {
                echo "<p>No users are registered</p>";
            } else {
                echo "<p>$result->num_rows are regsitered.</p>";
                while ($row = $result->fetch_assoc()) {
                    $users[$index] = array($row['userID'],
                    $row['firstName'], $row['lastName']);
                    ++$index;
                }
//                 echo "<p> print_r \$users<br>";
//                 print_r($users);
//                 echo"</p>";
            }
        }
        $dbConnect->close();
 
        return $users;
    }
}

// getAllBlogs($dbName, $posttableName);

function getAllBlogs($dbName, $posttableName)
{
    $blogs = array();
    $index = 0;
    $dbConnect = connect($dbName);
    if ($dbConnect) {
        $sql = "SELECT * FROM $posttableName";
        
        if ($result = $dbConnect->query($sql)) {
           // echo "<h3>Blogs</h3>";
            if ($result->num_rows == 0) {
               // echo "<p>No blogs are posted</p>";
            } else {
//                 echo "<p>$result->num_rows are posted.</p>";
                while ($row = $result->fetch_assoc()) {
                    $blogs[$index] = array($row['userID_PostsBy'],
                        $row['Title'], $row['Content'], 
                        $row['postid']);
                    ++$index;
                }
            }
        }
        $dbConnect->close();
        
        return $blogs;
    }
}
function getUser($dbName, $tableName, $id)
{
    $user = "";
    $dbConnect = connect($dbName);
    if ($dbConnect) {
        $sql = "SELECT * FROM $tableName
            WHERE userID='$id'";        
        if ($result = $dbConnect->query($sql)) {
            if ($result->num_rows != 0) {
               $row = $result->fetch_assoc();
               $user = $row['Username'];
            } 
            else {
                echo"<p>Error:" . $dbConnect->error . "<p>";
//                 echo "<p>$result->num_rows are regsitered.</p>";
//                 while ($row = $result->fetch_assoc()) {
//                     $users[$index] = array($row['userID'],
//                         $row['firstName'], $row['lastName']);
//                     ++$index;
                }
            }
        }
        $dbConnect->close();
        
        return $user;
    }

    function updateBlog ($dbName, $posttableName, $postid, $userID, $content)
    {

        $dbConnect = connect($dbName);
        if ($dbConnect) {
//             echo "dbName: $dbName<br>";
//             echo "tableName: $posttableName<br>";
//             echo "postid: $postid<br>";
//             echo "UserID: $userID<br>";
//             echo "content: $content<br>";
          
            $sql = "UPDATE $posttableName SET userID_LastPosts='" . $userID . "', Content='" . $content . "' WHERE postid='$postid'";
           // echo "<p>$sql</p>";
//             $sql = "SELECT * FROM $tableName
//             WHERE userID='$id'";
            if ($result = $dbConnect->query($sql)) {
                //echo"<p>Update successful</p>";
//                 if ($result->num_rows != 0) {
//                     $row = $result->fetch_assoc();
//                     $user = $row['userName'];
                }
            else {
                echo"<p>Error:" . $dbConnect->error . "</p>";
                    //                 echo "<p>$result->num_rows are regsitered.</p>";
                    //                 while ($row = $result->fetch_assoc()) {
                    //                     $users[$index] = array($row['userID'],
                    //                         $row['firstName'], $row['lastName']);
                    //                     ++$index;
                    }
                
            
            $dbConnect->close();
            
        }
    }
    function deleteBlog ($dbName, $posttableName, $postid)
    {
        
        $dbConnect = connect($dbName);
        if ($dbConnect) {
          
            $sql = "DELETE FROM $posttableName
                         WHERE postid= '$postid'";
            //    echo "<p> $sql</>";
                //             $sql = "SELECT * FROM $tableName
                //             WHERE userID='$id'";
                if ($result = $dbConnect->query($sql)) {
              //      echo"<p>Delete successful</p>";
                    //                 if ($result->num_rows != 0) {
                    //                     $row = $result->fetch_assoc();
                    //                     $user = $row['userName'];
                }
                else {
                    echo"<p>Error:" . $dbConnect->error . "</p>";
                    //                 echo "<p>$result->num_rows are regsitered.</p>";
                    //                 while ($row = $result->fetch_assoc()) {
                    //                     $users[$index] = array($row['userID'],
                    //                         $row['firstName'], $row['lastName']);
                    //                     ++$index;
                }
                $dbConnect->close();
                
        }
    }
    
    function searchBlogs($dbName, $posttableName, $title, $content)
    {
        $blogs = array();
        $index = 0;
        $dbConnect = connect($dbName);
        if ($dbConnect) {
            $sql = "SELECT * FROM $posttableName WHERE title LIKE '%" . $title . "%'
            AND content LIKE '%" . $content . "%'";
            
            if ($result = $dbConnect->query($sql)) {
                // echo "<h3>Blogs</h3>";
                if ($result->num_rows == 0) {
                    echo "<p>No blogs are posted</p>";
                } else {
                    // echo "<p>$result->num_rows are posted.</p>";
                    while ($row = $result->fetch_assoc()) {
                        $blogs[$index] = array(
                            $row['userID_PostsBy'],
                            $row['Title'],
                            $row['Content'],
                            $row['postid']
                        );
                        ++ $index;
                    }
                }
            }
            $dbConnect->close();
            
            return $blogs;
        }
    }
        
?>