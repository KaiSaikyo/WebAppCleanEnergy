<html> 

<body> 

<?php 

//embed html codes in php 

$htmlDisplay="<h1> Search Results: </h1>"; 

//add table to html page 

$htmlDisplay= $htmlDisplay. "<table border='1'>"; 

//check that user has entered pid in the html form submission 
if (isset($_POST["pid"])) { 

//get the pid from http post 

$pid = $_POST['pid']; 

// include db connect class 

require_once __DIR__. '/db_connect.php'; 

// connecting to db 

$db= new DB_CONNECT(); 
$db->connect(); 

// get the product from staffdir table with given pid 

$sqlCommand="SELECT * FROM staffdir WHERE pid = $pid"; 

$result =mysqli_query($db->myconn, "$sqlCommand"); 

// printing html table headers 

$htmlDisplay = $htmlDisplay ."<th> pid </th><th> name </th> <th> dept </th> <th> tel </th>"; 

// check for empty result 

if (mysqli_num_rows($result) > 0) { 

// looping through all results and display every product in each row of the table. 

foreach($result as $row) 

{ 

$htmlDisplay = $htmlDisplay ."<tr> <td>".$row["pid"]. "</td>"; 

$htmlDisplay = $htmlDisplay ."<td>".$row["name"]. "</td>"; 

$htmlDisplay = $htmlDisplay ."<td>".$row["dept"]. "</td>"; 

$htmlDisplay = $htmlDisplay ."<td>".$row["tel"]. "</td></tr>"; 

}
$htmlDisplay = $htmlDisplay. "</table>";
$htmlDisplay =$htmlDisplay."<br> <a href='main.html'> Home </a>";
echo $htmlDisplay;
}
else {
    echo "<h1> Not found </h1>";
    echo "<br> <a href = 'main.html'> Home </a>";
}

$db->close($db->myconn);

}
?>

</body>
</html>