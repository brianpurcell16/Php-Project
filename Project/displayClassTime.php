<?php
include 'projheader1.html';
include "functions.php";
    try{
        $pdo = connecting();

$sql = 'SELECT * FROM Class WHERE STATUS = "A"';
$result = $pdo->query($sql);
?>

<b>Active Classes</b><br>
<table border=1>
<tr><th>ClassID</th>
<th>Title</th>
<th>Price</th>
<th>Duration(Weeks)</th>
<th>Size</th></tr>

<?php

while($row = $result->fetch()):
echo '<tr><td>' . $row['ClassID'] . '</td><td>' . $row['Title'] . '</td><td>' . $row['price'] . '</td><td>' . $row['Duration'] . '</td><td>' . $row['Size'] . '</td>';
endwhile;
?>
</table>

<?php
}
catch (PDOException $e){
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}

include 'addClassTime.html';

?>