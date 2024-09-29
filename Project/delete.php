<?php

include 'projheader1.html';
include "deleteFrom.html";
include "functions.php";




if (isset($_POST['submitdetails'])) { 
try { 
$pdo = connecting();
$sql = 'SELECT count(*) FROM Member where MemID = :MemID';
$result = $pdo->prepare($sql);
$result->bindValue(':MemID', $_POST['MemID']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM Member where MemID = :MemID';
    $result = $pdo->prepare($sql);
    $result->bindValue(':MemID', $_POST['MemID']); 
    $result->execute();
    while ($row = $result->fetch()) { 
        echo ' Are you sure you want to delete ??' . $row['Fname'] . ' ' . $row['Sname']  . 
	  '<form action="deletecustomer.php" method="post">
            <input type="hidden" name="id" value="'.$row['MemID'].'"> 
            <input type="submit" value="yes delete" name="delete">
        </form>';
    }
}
else {
      print "No rows matched the query.";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}

}

?>
