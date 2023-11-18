<?php


require_once('constants.php');

try {
   
    $DbConn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

    
    $DbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $DbConn->exec('SET NAMES utf8');

   
    echo 'Connected to the database successfully!';
} catch (PDOException $e) {
    
    echo 'Connection failed: ' . $e->getMessage();
}

?>
