<?php


include 'projheader1.html';
include 'functions.php';



if (isset($_POST['submitdetails'])) {

    try {


        $classid = $_POST['classid'];

        $date = $_POST['date'];

        $time = $_POST['time'];

        $capacity = $_POST['capacity'];

        $pdo = connecting();
    
        $sql = "INSERT INTO classTime (ClassID,Date,Time,Capacity) VALUES(:ClassID, :Date, :Time, :Capacity)";
    
        $stmt = $pdo->prepare($sql);
    
        $stmt->bindValue(':ClassID', $classid);
    
        $stmt->bindValue(':Date', $date);

        $stmt->bindValue(':Time', $time);

        $stmt->bindValue(':Capacity', $capacity);

        $sql2 = "SELECT * FROM classTime WHERE ClassID = :id";

        $stmt2 = $pdo->prepare($sql2);

        $stmt2->bindValue(':id', $classid);

        $stmt2->execute();

        if($stmt2->fetchColumn() > 0){
            echo"Class time already exists for this class try another Click<a href='displayClassTime.php'> Here</a> to go back";
        }
        else{

            $stmt->execute();
    
            echo "Added  Click<a href='displayClassTime.php'> Here</a> to go back";
        }
    
    
    
    
    }
    
    catch (PDOException $e) {
    
        $title = 'An error has occurred';
    
        $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    
    }
    
}

?>