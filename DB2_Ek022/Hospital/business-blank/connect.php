<?php
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbname = "business";

try
{
    $conn = new PDO(____________________________________);  
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);       

} catch (PDOException $e) {
    echo "Sorry! You cannot connect to database";
}
?>