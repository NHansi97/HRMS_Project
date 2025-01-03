<?php
$dcservername=$dcusername=$dcpass=$dcdbname=$dccondb="";

$dcservername="localhost";
$dcdbname="hrms";
$dcusername="root";
$dcpass="";

$dccondb=mysqli_connect($dcservername,$dcusername,$dcpass,$dcdbname);
if ($dccondb) {
    return $dccondb;
}
   else{
       // if error in the database
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL; 
    exit;
}
?>