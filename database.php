<?php 

$HOST = "localhost";
$USER = "admin";
$PASSWORD = "1";
$DB = "mydb";

$connection = new mysqli($HOST, $USER, $PASSWORD, $DB);
$connection -> query("SET NAMES 'utf8'");
?>