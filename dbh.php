<?php
//uložení přihlašovacích údajů k DB do proměnných
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "let";

//připojení do DB
$db = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName); //vytvoření objektu třídy mysqli
?>