<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_management";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Select db
$selected = mysqli_select_db($conn, $dbname);

//SQL to delete record
$Delete_Record_Id = $_GET['Delete'];
$Delete_Query = "DELETE FROM emp_record 
                WHERE id='$Delete_Record_Id'";
$execute = mysqli_query($conn, $Delete_Query);

if($execute) {
    echo '<script>window.open("delete_from_db.php?Deleted=Record Deleted Successfully","_self")</script>';
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>