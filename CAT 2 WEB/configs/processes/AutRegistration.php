<?php
require_once('../configs/DbConn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];


    try {
         
        $stmt = $DbConn->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);   
        $stmt->bindParam('email', $email);

        
        $stmt->execute();

        echo 'User registration successful!';
    } catch (PDOException $e) {
        
        echo 'registration failed: ' . $e->getMessage();
    }
}

?>
