<?php




/*$db_name = 'api';
$db_host = 'localhost:3306';
$db_user = 'root';
$db_password = '';
*/

$db_name = 'api';
$db_host = 'localhost:3306';
$db_user = 'root';
$db_password = '$uP0rT3@22';


$pdo = new PDO("mysql:dbname=".$db_name.";host".$db_host,$db_user,$db_password);
 

?>