<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add permissions</title>
</head>
<body>
    <h1>Add permissions</h1>
    <form action="addpermissions.php"method="POST">
        <input type="text"placeholder="Enter P_CID" name="P_CID">
        <br><br>
        <input type="text"placeholder="Enter P_Username" name="P_Username">
        <br><br>
        <input type="submit">
</form>
</body>
</html>

<?php
    if(!empty($_POST['P_CID'])&& !empty($_POST['P_Username'])):
        require 'connect.php';
        $sql_insert= "insert into permissions values (:P_CID, :P_Username)";

        $stmt = $conn->prepare($sql_insert);
        $stmt->bindParam(':P_CID', $_POST['P_CID']);
        $stmt->bindParam(':P_Username', $_POST['P_Username']);

        if($stmt->execute()):
                $message = 'Suscessfully add new permissions';
               // header("Location:/business/selectcustomer.php");
        
else:
         $message = 'Fail to add new permissions';
endif;
            echo $message;
            $conn = null;
endif;
            