<?php /*some comment here */
    
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
    //echo "Database Selected <br>";
} else {
    error . mysqli_select_db();
}

//Extract data to be updated
//Passed search query parameter created on line 87 in update_db.php
$Update_Record = $_GET['Update_Id']; 

//ShowQuery selects all the data from the emp_record table in our database
$ShowQuery = "SELECT * FROM emp_record
                WHERE id = '$Update_Record'";

$Update = mysqli_query($conn, $ShowQuery);

while($DataRows = mysqli_fetch_array($Update)) {
    $Update_Id = $DataRows['id'];
    $Ename = $DataRows['ename'];
    $SSN = $DataRows['ssn'];
    $Dept = $DataRows['dept'];
    $Salary = $DataRows['salary'];
    $HomeAddress = $DataRows['homeaddress'];
}

/* if ($Update === true) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} */
    

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Update</title>
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
                        <li><a href="insert_into-db.php" >Data Input</a></li>
                        <li><a href="view_from_db.php">Input Result</a></li>
                        <li><a href="update_db.php" class="active">Update Data</a></li>
                        <li><a href="delete_from_db.php">Delete Data</a></li> 
                    </ul>
                </nav>
            </div>
        </header>

        <h2 id="alert" class="success"><?php echo @$_GET['Update']; ?></h2> <!-- //DevSkim: ignore DS163877 until 2018-11-07  -->

        <div class="container">
            <!-- Employee record form -->
            <form action="update.php?Update_Id=<?php echo $Update_Id; ?>" method="post">
                <fieldset>

                    <label>Employee Name:</label><br>
                        <input type="text" name="Ename" id="" value ="<?php echo $Ename; ?>"><br>

                    <label>Identification Number:</label><br>
                        <input type="text" name="SSN" id="" value="<?php echo $SSN; ?>"><br>

                    <label>Department:</label><br>
                        <input type="text" name="Dept" id="" value="<?php echo $Dept; ?>"><br>

                    <label>Salary:<span class="subscript">*No spaces, no decimals allowed - numeric</span></label><br>
                        <input type="number_format" name="Salary" id="" value="<?php echo $Salary; ?>"><br>

                    <label>Home Address:</label><br>
                        <textarea name="HomeAddress" id="" value=""><?php echo $HomeAddress; ?></textarea><br>

                </fieldset>
                <input type="submit" name="Submit" class="btn" value="Submit Record"><br>
            </form><!-- /employee record form -->

        </div><!-- /container -->

        
        <script src="main.js"></script>    
    </body>

</html>

<?php 
//This PHP block is for editing the data
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
    //echo "Database Selected <br>";
} else {
    error . mysqli_select_db();
}

if (isset($_POST['Submit'])) {
    $Update_Id = $_GET['Update_Id'];
    $Ename = $_POST['Ename'];
    $SSN = $_POST['SSN'];
    $Dept = $_POST['Dept'];
    $Salary = $_POST['Salary'];
    $HomeAddress = $_POST['HomeAddress'];

    $UpdateQuery = "UPDATE emp_record 
                    SET ename='$Ename', ssn='$SSN', dept='$Dept', salary='$Salary', homeaddress='$HomeAddress'
                    WHERE id='$Update_Id'";

    $execute = mysqli_query($conn, $UpdateQuery);
    if ($execute) {
        function Redirect_to($NewLocation)
        {
            header("Location: " . $NewLocation);
            exit;
        }
        Redirect_to("update_db.php?Updated=Record was updated successfully");
    }
}

?>

