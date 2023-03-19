<?php

if (isset($_POST['CustomerID'])) {
    require '../connect.php';

    $CustomerID = $_POST['CustomerID'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];

    echo 'CustomerID = ' . $CustomerID;
    echo 'Name = ' . $Name;
    echo 'Email = ' . $Email; 

    
    $stmt = $conn->prepare(
        'UPDATE  Customer Set Name=:Name, Email=:Email WHERE CustomerID=:CustomerID'
    );
    $stmt->bindparam(':Name',$_POST['Name']);
    $stmt->bindparam(':Email',$_POST['Email']);
    $stmt->bindparam(':CustomerID', $_POST['CustomerID']);
    $stmt->execute();

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->rowCount() >= 0) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update customer information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
}
?>
