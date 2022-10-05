<?php
########### PARAMETRES ################

### PROD ###
		     		      
//$dbname = "db728418576";
//$user   = "dbo728418576";
//$pass   = "Webnum42!";
//$host   = "db728418576.db.1and1.com";
//$port   = "3306";
//$char   = "utf8";
// MySQL 5.5

### DEV WAMP ###

$dbname = "mondisneyland";
$user   = "root";
$pass   = "";
$host   = "localhost";
$port   = "3306";
$char   = "utf8";

### DEV MAMP ###

//$dbname = "mondisneyland";
//$user   = "root";
//$pass   = "root";
//$host   = "localhost";
//$port   = "3306";
//$char   = "utf8";
		     		      	
#######################################

try
{
    $db = new pdo('mysql:host='.$host.';port='.$port.';dbname='.$dbname.';charset='.$char.'', $user, $pass, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ));
}
catch(PDOException $pe)
{
    echo $pe->getMessage();
}