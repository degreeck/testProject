<?php 

    if(isset($_POST["Submit"])) {

        if (empty($_POST["Ename"]) || empty($_POST["SSN"])) {

            echo "<span class='alert'>Please insert Name and SSN</span>";

        } else if (!empty($_POST["Ename"]) && !empty($_POST["SSN"])) {
        
            //declare variables
            $Ename = $_POST["Ename"];
            $SSN = $_POST["SSN"];
            $Dept = $_POST["Dept"];
            $Salary = $_POST["Salary"];
            $HomeAddress = $_POST["HomeAddress"];

            // Create mysqli and db connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "employee_management";

            $conn = new mysqli($servername, $username, $password, $dbname);

            //Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            //echo "Connected successfully <br>";

            //Check db selection
            $selected = mysqli_select_db($conn, $dbname);
            if ($selected) {
                        //echo "Database Selected <br>";
            } else {
                error . mysqli_select_db();
            }

            //data input query
            $sql = ("INSERT INTO emp_record (ename, ssn, dept, salary, homeaddress) 
                        VALUES ('$Ename', '$SSN', '$Dept', '$Salary', '$HomeAddress' )");
                
                // Testing db data input
            if (mysqli_query($conn, $sql)) {
                echo "<span class='alert'>New record created successfully</span>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
        }

    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Insert Into Database</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
        <link href="https://fonts.googleapis.com/css?family=K2D:200|Open+Sans:300" rel="stylesheet">
        
    </head>
    <body>

        <header>
            <div class="logo">
                <img src="instacom-push-to-talk-solutions-replace-two-way-radio.png" alt="Instacom logo">
            </div>
            <div class="nav">
                <nav>
                    <ul>
                    <li><a href="#" class="active">Data Input</a></li>
                    <li><a href="view_from_db.php">Input Result</a></li> 
                    </ul>
                </nav>
            </div>
        </header>

        <div class="container">
            <!-- Employee record form -->
            <form action="insert_into-db.php" method="post">
                <fieldset>

                    <label>Employee Name:</label><br>
                        <input type="text" name="Ename" id="" value =""><br>

                    <label>Identification Number:</label><br>
                        <input type="text" name="SSN" id="" value=""><br>

                    <label>Department:</label><br>
                        <input type="text" name="Dept" id="" value=""><br>

                    <label>Salary:<span class="subscript">*No spaces, no decimals allowed - numeric</span></label><br>
                        <input type="number_format" name="Salary" id="" value=""><br>

                    <label>Home Address:</label><br>
                        <textarea name="HomeAddress" id="" value=""></textarea><br>

                </fieldset>
                <input type="submit" name="Submit" class="btn" value="Submit Record"><br>
            </form><!-- /employee record form -->

        </div><!-- /container -->

        <?php  
        
        ?>
        <script src="main.js"></script>    
    </body>
</html>