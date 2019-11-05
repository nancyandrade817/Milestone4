<?php
/*
 * Author: Nancy Andrade
 * Date: September 12, 2019
 * File: utility.php
 *
 * This is a php program that will display all users upon requests
 */
// error reporting support

ini_set('display_errors', '1');
ini_set('display_startuperrors', '1');
error_reporting(E_ALL);
// includes & requires
require_once 'myfuncs.php';
// global variables 

$dbName = "activity1";
$tableName = "users";

// $testArray = getAllUsers($dbName, $tableName);
// //echo <p>print_r() \$testArray";
// //print_r($tesArray)
/**
 * @param dbName
 * @param tableName
 */

function getAllUsers($dbName, $tableName) {
    $users = array();
    $index = 0; 
    $dbconnect = connect ( $dbName );
    
    if ($dbconnect->connect_error)  
    {
            echo "<p>Connection error; " . $dbconnect->connect_error() . "</p>";
    } 
    else 
    {
        $sql = "SELECT ID, FirstName, LastName FROM $tableName ";
        if ($result = $dbconnect->query($sql)) 
         {
           echo "<h3>Users</h3";
           if ($result->num_rows === 0) 
                { 
                    echo "<p>No users are registered.</p>";
            
                }
           
            else { 
                
                echo "<p>" . $result->num_rows . " users are registered.</p>";
                while ($row= $result->fetch_assoc())
                {
                    $users[$index] = array($row['ID'], $row['FirstName'], 
                    $row['LastName']);
                    ++$index; 
                }
//                 echo "<p>print_r() \$users";
//                 print_r($users);
//                 echo "</p>";
            }
                
                    }
                    else {
                        echo "<p> Error: " . $dbConnect->error . "</p>";
                    }
                    }
    
       // echo "Database Closing";
        $dbconnect->close();
       return $users;
    }
        
                                        

?>
