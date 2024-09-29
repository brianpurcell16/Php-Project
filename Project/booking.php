<?php
include 'projheader1.html';
include "functions.php";
    try{

    $pdo = connecting();

$sql = 'SELECT Class.ClassID,Class.Title,Class.price,ClassTime.Time,classTime.Date,classTime.Capacity FROM class INNER JOIN classTime ON Class.ClassID = classTime.ClassID WHERE STATUS = "A"';
$result = $pdo->query($sql);
?>

<b>Active Classes</b><br>
<table border=1>
<tr><th>ClassID</th>
<th>Title</th>
<th>Price</th>
<th>Time</th>
<th>Date</th>
<th>Capacity</th></tr>

<?php

while($row = $result->fetch()):
echo '<tr><td>' . $row['ClassID'] . '</td><td>' . $row['Title'] . '</td><td>' . $row['price'] . '</td><td>' . $row['Time'] . '</td><td>' . $row['Date'] . '</td><td>' . $row['Capacity'] . '</td>';
endwhile;
?>
</table>

<?php
}
catch (PDOException $e){
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}

include 'whatToBook.html';

?>