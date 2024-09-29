<?php


include 'projheader1.html';
include 'addMemberform.html';

include 'functions.php';

//PUT REPATED SQL IN FUNCTION

if (isset($_POST['submitdetails'])) {

    try {

        $fname = $_POST['fname'];

        $sname = $_POST['sname'];

        $DOB = $_POST['dob'];

        $email = $_POST['email'];

        $phone = $_POST['phone'];

        $pdo = connecting();
    
        $sql = "INSERT INTO member (Fname,Sname,DOB,Email,Phone,DateRegistered) VALUES(:fname, :sname, :DOB, :email, :phone, CURDATE())";
    
        $stmt = $pdo->prepare($sql);
    
        $stmt->bindValue(':fname', $fname);
    
        $stmt->bindValue(':sname', $sname);

        $stmt->bindValue(':DOB', $DOB);

        $stmt->bindValue(':email', $email);

        $stmt->bindValue(':phone', $phone);
    
        $stmt->execute();
    
    
    
    }
    
    catch (PDOException $e) {
    
        $title = 'An error has occurred';
    
        $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    
    }
    
}

    ?>