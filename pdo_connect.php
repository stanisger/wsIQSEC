<?php

$servername 	= "localhost";
$username 		= "root";
$password 		= "";
$dbname			= 'iqsec_activacion';
$con=0;

try{

    $dbh = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $con = 1;
}
catch(PDOException $e)
{
    	echo $e->getMessage();
}
