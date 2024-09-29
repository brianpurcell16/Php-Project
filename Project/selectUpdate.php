<?php
include 'projheader1.html';
include "functions.php";
    try{
        $pdo = connecting();

$sql = 'SELECT * FROM member WHERE STATUS = "A"';
$result = $pdo->query($sql);
?>

<b>Active Members</b><br>
<table border=1>
<tr><th>MemID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Wallet</th></tr>

<?php

while($row = $result->fetch()):
echo '<tr><td>' . $row['MemID'] . '</td><td>' . $row['Fname'] . '</td><td>' . $row['Sname'] . '</td><td>' . $row['Email'] . '</td><td>' . $row['Phone'] . '</td><td>' . $row['Wallet'] . '</td>';
endwhile;
?>
</table>

<?php
}
catch (PDOException $e){
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}

include 'whoToUpdate.html';

?>