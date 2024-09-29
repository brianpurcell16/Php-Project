<?php

include 'projheader1.html';
include 'addClass.html';
include "functions.php";





if (isset($_POST['submitdetails'])) {


    try {

        $title = $_POST['title'];

        $price = $_POST['price'];

        $start = $_POST['start'];

        $size = $_POST['size'];

        $pdo = connecting();
    
        $sql = "INSERT INTO class (Title,price,Duration,Size) VALUES(:title, :price,:duration, :size)";
    
        $stmt = $pdo->prepare($sql);
    
        $stmt->bindValue(':title', $title);
    
        $stmt->bindValue(':price', $price);

        $stmt->bindValue(':duration', $start);

        $stmt->bindValue(':size', $size);
    
        $stmt->execute();
    
        echo "Added try doing another";
    
    
    
    }
    
    catch (PDOException $e) {
    
        $title = 'An error has occurred';
    
        $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    
    }
    
}


?>