<html> 
<body> 

<?php 

require_once __DIR__. '/db_connect.php'; 

// connecting to db 

$db= new DB_CONNECT(); 
$db->connect(); 

// get the product from products table with given pid 

$sqlCommand="SELECT * FROM staffdir"; 

$result =mysqli_query($db->myconn, "$sqlCommand"); 

$htmlDisplay="<h1> Search Results: </h1>"; 

$htmlDisplay= $htmlDisplay. "<table border='1'>"; 

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

    $htmlDisplay = $htmlDisplay."<br> <a href='main.html'> Home </a>";

    echo $htmlDisplay;
}
else {
    echo "<h1> Not found </h1>";
    echo "<br> <a href = 'main.html'> Home </a>";
}

$db->close($db->myconn);

?>

</body>
</html>