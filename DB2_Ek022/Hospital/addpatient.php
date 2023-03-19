<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add patient</title>
</head>
<body>
    <h1>Add patient</h1>
    <form action="addpatient.php"method="POST">
        <input type="text"placeholder="Enter P_ID" name="P_ID">
        <br><br>
        <input type="text"placeholder="Enter P_name" name="P_name">
        <br><br>
        <input type="date" name="P_DOB">
        <br><br>
        <input type="text"placeholder="Enter P_debt" name="P_debt">
        <br><br>
        <input type="submit">
</form>

<?php
    //if(!empty($_POST['CustomerID'])&& !empty($_POST['Name'])&& !empty($_POST['Birthdate'])
    //&& !empty($_POST['Email'])&& !empty($_POST['CountryCode'])&& !empty($_POST['OutstandingDebt'])):
    if(!empty($_POST['P_ID'])):
        //echo 'eak';
        require 'connect.php';
        $sql_insert= "insert into patient values (:P_ID, :P_name, :P_DOB, :P_debt)";

        $stmt = $conn->prepare($sql_insert);
        $stmt->bindParam(':P_ID', $_POST['P_ID']);
        $stmt->bindParam(':P_name', $_POST['P_name']);
        $stmt->bindParam(':P_DOB', $_POST['P_DOB']);
        $stmt->bindParam(':P_debt', $_POST['P_debt']);
        
        if($stmt->execute()):
           // echo 'eak2';
                $message = 'Suscessfully add new patient';
                //header("Location:/business/selectcustomer.php");
                
        else:
            $message = 'Fail to add new patient';
        endif;
        echo $message;
        $conn = null;
    endif;
            