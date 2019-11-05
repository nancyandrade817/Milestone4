<?php
/*
 * Author: Nancy Andrade
 * Date: September 12, 2019
 * File: loginhandler.php
 *
 * This is a php program that enables the registration page to connect
 * to the data base that was created.
 */
// error reporting support
ini_set('display_errors', '1');
ini_set('display_startuperrors', '1');
error_reporting(E_ALL);
//requires & includes
require_once 'myfuncs.php';
// constants

define('EMPTY_STRING', "");
// these are my global variables that I assigned to this program
$dbName = "activity1";
$tableName = "users";
$message = "";

// failure
if (! isset($_POST['submit'])) 
{
    die("Submission failed, no data");
} // sucess

else { //declarations
    $userName = trim($_POST['UserName']);
    $password = trim($_POST['Password']);
    }

$dbconnect = connect ( $dbName);
if ($dbconnect) {
  
// if users try to submit with not data 
   
   if ($userName === NULL || $userName === EMPTY_STRING) 
    {
       echo "<p> The first name is a <b><em>required</em></b> field 
    and cannot be left blank</p>";
    }// if passowrd is empty
   else if ($password === NULL || $password === EMPTY_STRING) 
   {
     echo "<p> The password is a <b><em>required</em></b> field
    and cannot be left blank</p>";
    } 
    else { // select registered user
        $sql = "SELECT ID, USERNAME, PASSWORD 
                FROM $tableName
                WHERE USERNAME='" . $userName . "'" . "AND PASSWORD='" . $password . "'";
        if ($result = $dbconnect->query ($sql)) 
        {
            $nbrRows = $result->num_rows;
            if ($nbrRows == 1) 
            {
                $row = $result->fetch_assoc();
                setUserID($row['ID']);
                   include('LoginResponse.php'); 
                   // picture code first
                   
//                    echo "<p> Indexed array w. for loop<br>";
//                    for($i = 0; $i < count($cars); $i++) {
//                        echo "$i " . $cars[$i] . "<br>";
//                    }
//                    echo "</p>";
//                    echo "p>Associative array w/ foreach Loop <br>";
//                    foreach ($_POST as $value) {
//                        echo $value . "<br>";
//                    }
//                    echo "</p>";
//                    echo "<p>Associative array w/ different foreach Loop<br>";
//                    foreach ($_POST as $key => $value) {
//                        echo $key . ": " . $value . "<br>"; 
//                    }
//                    echo "</p>";
//                    $products = array(array('Code' => 'TIR',
//                             'Description' => 'Tires',
//                             'Price' => 100),
//                              array('Code' => 'OIL',
//                             'Description' => 'OIL',
//                              'Price' => 10),
//                               array('Code' => 'SPK'),
//                              'Description' 
                     
//                    );
//                        echo "<p>print_r() \$products";
//                        print_r($products);
//                        echo "</p>";
//                        echo "<p>Multidimensional array w/ for & foreach loops<br>";
//                        for ($row =0; $row < count ($products); $row++) {
//                            foreach ($prodcuts[$row] as $key => $value) {
//                                echo $key . ": " . $value . "<br>";
//                            }
//                            echo "<br>";
                           
//                        }
//                        echo "</p>";
                   
            } 
            else if ($nbrRows == 0) 
            {
                $message = "Login failed.";
                include('LoginFailed.php');
            } else if ($nbrRows > 1) 
            
            {
                 $message = "Multiple users found.";
                    include('LoginFailed.php'); 
                   
            }
          }
                                        
     
        }
       
            }
      else {
         $message = "Unknown Error.";
         include('LoginFailed.php'); }                                         
//      echo "<p>Error: " . $dbconnect->error . "</p>";
  
        echo "Database Closing";
    $dbconnect->close ();




?>