<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Details Form</title>
</head>
<body>

    <h2>Author Details Form</h2>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $authorId = $_POST["authorId"];
        $authorFullName = $_POST["authorFullName"];
        $authorEmail = $_POST["authorEmail"];
        $authorAddress = $_POST["authorAddress"];
        $authorBiography = $_POST["authorBiography"];
        $authorDateOfBirth = $_POST["authorDateOfBirth"];
        $authorSuspended = isset($_POST["authorSuspended"]) ? 1 : 0; 

        
        if (empty($authorId) || empty($authorFullName) || empty($authorEmail) || empty($authorAddress) || empty($authorBiography) || empty($authorDateOfBirth)) {
            echo "<p style='color: red;'>Please fill out all fields</p>";
        } else {
        
            echo "<p>Author ID: $authorId</p>";
            echo "<p>Author Full Name: $authorFullName</p>";
            echo "<p>Author Email: $authorEmail</p>";
            echo "<p>Author Address: $authorAddress</p>";
            echo "<p>Author Biography: $authorBiography</p>";
            echo "<p>Author Date of Birth: $authorDateOfBirth</p>";
            echo "<p>Author Suspended: " . ($authorSuspended ? 'Yes' : 'No') . "</p>";

            
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="authorId">Author ID:</label>
        <input type="text" id="authorId" name="authorId">

        <br>

        <label for="authorFullName">Author Full Name:</label>
        <input type="text" id="authorFullName" name="authorFullName">

        <br>

        <label for="authorEmail">Author Email:</label>
        <input type="email" id="authorEmail" name="authorEmail">

        <br>

        <label for="authorAddress">Author Address:</label>
        <input type="text" id="authorAddress" name="authorAddress">

        <br>

        <label for="authorBiography">Author Biography:</label>
        <textarea id="authorBiography" name="authorBiography"></textarea>

        <br>

        <label for="authorDateOfBirth">Author Date of Birth:</label>
        <input type="date" id="authorDateOfBirth" name="authorDateOfBirth">

        <br>

        <label for="authorSuspended">Author Suspended:</label>
        <input type="checkbox" id="authorSuspended" name="authorSuspended">

        <br>

        <input type="submit" value="Submit">
    </form>

    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $authorFullName = $_POST["authorFullName"];
    $authorEmail = $_POST["authorEmail"];
    $authorAddress = $_POST["authorAddress"];
    $authorBiography = $_POST["authorBiography"];
    $authorDateOfBirth = $_POST["authorDateOfBirth"];
    $authorSuspended = isset($_POST["authorSuspended"]) ? 1 : 0;

    
    if (empty($authorFullName) || empty($authorEmail) || empty($authorAddress) || empty($authorBiography) || empty($authorDateOfBirth)) {
        echo "<p style='color: red;'>Please fill out all fields</p>";
    } else {
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "authordb";

        $conn = new mysqli($servername, $username, $password, $dbname);

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "INSERT INTO authorstb (AuthorFullName, AuthorEmail, AuthorAddress, AuthorBiography, AuthorDateOfBirth, AuthorSuspended)
                VALUES ('$authorFullName', '$authorEmail', '$authorAddress', '$authorBiography', '$authorDateOfBirth', '$authorSuspended')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Data inserted successfully</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        
        $conn->close();
    }
}
?>


</body>
</html>
