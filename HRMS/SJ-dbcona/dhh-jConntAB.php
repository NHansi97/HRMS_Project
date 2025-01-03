<?php
$tdservername=$tdusername=$tdpass=$tddbname=$tdconton="";
$tdservername="localhost";
$tdusername="root";
$tdpass="";
$tddbname="hrms";
$tdconton=mysqli_connect($tdservername,$tdusername,$tdpass,$tddbname);

if($tdconton){
    return $tdconton;
}
else {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error: ",mysql_connect_error() . PHP_EOL;
    exit;
    
}
?>


