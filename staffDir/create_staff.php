<html>
<body>

<?php

if (isset($_POST["name"]) && isset($_POST["dept"]) && isset($_POST["tel"])) {

$name = $_POST["name"];
$dept = $_POST["dept"];
$tel = $_POST["tel"];

// include db connect class
require_once __DIR__. '/db_connect.php';
// connecting to db
$db= new DB_CONNECT();
$db->connect();

$sqlCommand="INSERT INTO `staffdir` (`name`, `dept`, `tel`) VALUES ('$name', '$dept', '$tel')";
$result =mysqli_query($db->myconn, "$sqlCommand");
if ($result) {
    echo "Product successfully created";
}
else {
    echo "Product creation unsuccessful";
}


$db->close($db->myconn);
}

?>


<br> <a href = "main.html"> Home </a>
</body>
</html>