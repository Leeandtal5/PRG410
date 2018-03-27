<?php
$server="localhost";
$username="root";
$password="";
$db="accounts";
//start connection
$connect=new mysqli($server, $username, $password, $db);
//check connection
if($connect -> connect_error) {
	die("Connection Failed: ". $connect -> connect_error);
}
else{
	echo("Database is Connected");
}
?>