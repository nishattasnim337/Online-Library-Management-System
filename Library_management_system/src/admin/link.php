<?php

$host="localhost";
$dbuser="root";
$dbpass="";
$dbname="libraryms";
$dblink=mysqli_connect("$host","$dbuser","$dbpass","$dbname");
if(!$dblink)
{
	die("connection failed: ".mysqli_connect_error());


}
else
{
	//echo "Database connected";
}

?>
