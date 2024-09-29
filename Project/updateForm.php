<?php
include 'projheader1.html';
include "functions.php";
try {
$pdo = connecting();

$sql ="SELECT count(*) FROM member WHERE MemID=:cid";

$result = $pdo->prepare($sql);
$result->bindvalue(':cid', $_POST['id']);
$result->execute();
if($result->fetchColumn() > 0)
{
    $sql = 'SELECT * FROM member WHERE MemID = :cid';
    $result = $pdo->prepare($sql);
    $result->bindValue(':cid', $_POST['id']);
    $result->execute();

    $row = $result->fetch();
    $id = $row['MemID'];
    $fname = $row['Fname'];
    $sname = $row['Sname'];
    $email = $row['Email'];
    $phone = $row['Phone'];
    $wallet = $row['Wallet'];

}

else{
    print "Now rows matched the query. Try Again Click<a href='selectUpdate.php'> Here</a> to go back";
}}
catch (PDOException $e){
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}

include 'updateDetails.html';
?>
