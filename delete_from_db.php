<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delete from Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</head>
<body>

    <header>
        <div class="logo">
            <img src="instacom-push-to-talk-solutions-replace-two-way-radio.png" alt="Instacom logo">
        </div>
        <div class="nav">
            <nav>
                <ul>
                   <li><a href="insert_into-db.php">Data Input</a></li>
                   <li><a href="insert_into-db.php">Input Result</a></li> 
                   <li><a href="update_db.php"">Update Data</a></li>
                   <li><a href="delete_from_db.php" class="active">Delete Data</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <h2 class="success"><?php echo @$_GET['Deleted']; ?></h2> <!-- //DevSkim: ignore DS163877 until 2018-11-07  -->

    <table>
        <caption>View from Database</caption>
        <tr>
            <th>ID</th>
            <th>Employee Name</th>
            <th>Identification Number</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Home Address</th>
            <th>Delete</th>
        </tr>

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
        //echo "Connected successfully <br>";

        // Check db selection
        $selected = mysqli_select_db($conn, $dbname);
        if ($selected) {
           // echo "Database Selected <br>";
        } else {
            error . mysqli_select_db();
        }

        //Query variables
        $viewQuery = "SELECT * From emp_record";
        $execute = mysqli_query($conn, $viewQuery);

        while ($Datarows = mysqli_fetch_array($execute)) {
            $Id = $Datarows['id'];
            $Ename = $Datarows['ename'];
            $SSN = $Datarows['ssn'];
            $Dept = $Datarows['dept'];
            $Salary = $Datarows['salary'];
            $HomeAddress = $Datarows['homeaddress']; ?>

            <tr>
                <td><?php echo $Id; ?></td>
                <td><?php echo $Ename; ?></td>
                <td><?php echo $SSN; ?></td>
                <td><?php echo $Dept; ?></td>
                <td><?php echo $Salary; ?></td>
                <td><?php echo $HomeAddress; ?></td>
                <td>
                    <a href="delete.php?Delete=<?php echo $Id;?>">
                        <?php echo "Delete"; ?>
                    </a>
                </td>
            </tr>

        <?php } ?>

        </table>

        <?php 
            //Closing connection when done
            mysqli_close($conn);
    ?>

    <script src="main.js"></script>    
</body>
</html>