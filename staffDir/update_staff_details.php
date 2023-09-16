<html>
<body>

<?php

// check for required fields from posted html form
if (isset($_POST['name']) && isset($_POST['dept']) && isset($_POST['tel']) && isset($_POST['pid']) ) {

//retrieve the values from html form
$pid = $_POST['pid'];
$name = $_POST['name'];
$dept = $_POST['dept'];
$tel = $_POST['tel'];

// include db connect class
require_once __DIR__. '/db_connect.php';
// connecting to db
$myConnection= new DB_CONNECT();
$myConnection->connect();

//if update button is clicked in form submission 
if (isset($_POST['Submit']))
$sqlCommand="UPDATE staffdir SET name='$name', dept='$dept', tel='$tel' WHERE pid='$pid'";

//execute the sql command
$result =mysqli_query($myConnection->myconn, "$sqlCommand");

// check the result 
if ($result) {
// successfully updated into database 
if (isset($_POST['Submit']))
echo "Data updated successfully.";

} 
else {
// failed to update database 
echo "Oops! An error occurred.";
}

$myConnection->close($myConnection->myconn); 
echo "<br><br><a href='main.html'> Home</a>";

} 
else {
    echo "Error occurs";
}

?>
</body>
</html>