<?php
    //Connection variables
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "employee_management";

    // Create mysqli and db connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check mysqli connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully <br>";

    // Check db selection
    $selected = mysqli_select_db($conn, $dbname); 
    if($selected) {
        echo "Database Selected <br>";
    } else {
        error.mysqli_select_db();
    }

    //Closing connection when done
    mysqli_close($conn); 
?>
    
