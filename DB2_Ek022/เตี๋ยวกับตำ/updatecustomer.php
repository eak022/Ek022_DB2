<?php

if (isset($_POST['F_D_ID'])) {
    require 'connect.php';

    $F_D_ID = $_POST['F_D_ID'];
    $F_Name = $_POST['F_Name'];
    $F_price = $_POST['F_price'];

    echo 'F_D_ID = ' . $F_D_ID;
    echo 'F_Name = ' . $F_Name;
    echo 'F_price = ' . $F_price; 

    
    $stmt = $conn->prepare(
        'UPDATE  food_drink Set F_Name=:F_Name, F_price=:F_price WHERE F_D_ID=:F_D_ID'
    );
    $stmt->bindparam(':F_Name',$_POST['F_Name']);
    $stmt->bindparam(':F_price',$_POST['F_price']);
    $stmt->bindparam(':F_D_ID', $_POST['F_D_ID']);
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
