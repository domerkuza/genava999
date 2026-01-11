<?php
$host = 'localhost';
$dbname = 'geneva';
$username = 'root';
$password = '';
try{
$connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}
catch(PDOException $e)
{
die("Impossible de se connecter a la base de donnee $dbname:".$e->getMessage());
}
?>
