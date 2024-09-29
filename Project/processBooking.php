<?php

include "functions.php";
include 'projheader1.html';

if (isset($_POST['submitdetails'])) {

   

    try {
        $pdo = connecting();
        

        $sql ="SELECT count(*) FROM member WHERE Fname=:fname AND Sname=:sname";

        $result = $pdo->prepare($sql);
        $result->bindvalue(':fname', $_POST['fname']);
        $result->bindvalue(':sname', $_POST['sname']);
        $result->execute();
        if($result->fetchColumn() > 0)
        {
            
            $sql2 ="SELECT * FROM member WHERE Fname=:fname AND Sname=:sname";
            $result2 = $pdo->prepare($sql2);
            $result2->bindvalue(':fname', $_POST['fname']);
            $result2->bindvalue(':sname', $_POST['sname']);
            $result2->execute();


            $row = $result2->fetch();
            $MemID = $row['MemID'];
            $wallet = $row['Wallet'];

            
         

            $sql3 ='SELECT Class.ClassID,Class.Title,Class.price,ClasSTime.Time,classTime.Date,classTime.Capacity FROM Class INNER JOIN classTime ON Class.ClassID = classTime.ClassID WHERE Class.ClassID = :cid';
            $result3 = $pdo->prepare($sql3);
            $result3->bindvalue(':cid', $_POST['id']);
            $result3->execute();

            $row2 = $result3->fetch();
            $Date = $row2['Date'];
            $Time = $row2['Time'];
            $price = $row2['price'];
            $capacity = $row2['Capacity'];
            $ClassID = $row2['ClassID'];

           
            if($capacity == 0){
                echo"Class is full Click<a href='booking.php'> Here</a> to go back";
            }else{

            

            

                $newWallet = $wallet - $price;

                if($wallet < $price){
                    echo"Not enough money in wallet Click<a href='selectUpdate.php'> Here</a> to go add money";
                }else{

                    $newCapacity = $capacity - 1;

                

                    $sql4 = "UPDATE member set Wallet=:cnewwallet WHERE Fname=:fname AND Sname=:sname";
                    $result4 = $pdo->prepare($sql4);
                    $result4->bindvalue(':cnewwallet', $newWallet);
                    $result4->bindvalue(':fname', $_POST['fname']);
                    $result4->bindvalue(':sname', $_POST['sname']);
                    $result4->execute();
                

                    $sql5 = "UPDATE classTime set Capacity=:cnewcapacity WHERE ClassID=:cid";
                    $result5 = $pdo->prepare($sql5);
                    $result5->bindvalue(':cnewcapacity', $newCapacity);
                    $result5->bindvalue(':cid',$ClassID);
                    $result5->execute();

                    $sql6 = "INSERT INTO booking (MemID, ClassID, DateBooked, Date, Time) 
                    VALUES(:MemID, :ClassID, CURDATE(), :Date, :Time)";
                    $result6 = $pdo->prepare($sql6);
                    $result6->bindvalue(':MemID', $MemID);
                    $result6->bindvalue(':ClassID', $ClassID);
                    $result6->bindvalue(':Date', $Date);
                    $result6->bindvalue(':Time', $Time);
           
                    $result6->execute();
                

                    echo "Class has been booked Click<a href='booking.php'> Here</a> to go back";
                

    
                }

            }
        }else{
            echo "Person dosent exist Click<a href='addMember.php'> Here</a> to go become a member";
        }
        }
                catch (PDOException $e){
                $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
        }
    }

?>