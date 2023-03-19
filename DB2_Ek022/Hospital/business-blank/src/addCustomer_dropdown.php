<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<title>User Registration</title>
</head>
<body>


<?php
require '____________';

$sql_select = 'select * from country order by CountryCode';
$stmt_s = $conn->prepare(________________________);
________________________

if (isset($_POST['submit'])) {
    
    if (!empty($_POST['customerID']) && !empty($_POST['name'])) {
        echo '<br>' . $_POST['customerID'];
        //require 'connect.php';

        $sql = ____________________________________

        $stmt = $conn->prepare(____________);
        $stmt->bindParam(':customerID', $_POST['customerID']);
        ____________
        ____________
        ____________
        ____________
        ____________
        

        try {
            if (____________):
                $message = 'Successfully add new customer';
            else:
                $message = 'Fail to add new customer';
            endif;
            echo $message;
        } catch (PDOException $e) {
            echo 'Fail! ' . $e;
        }

        $conn = null;
    }

    header(________________________);
}
?>



    <div class="container">
      <div class="row">
        <div class="col-md-4"> <br>
            <h3>ฟอร์มเพิ่มข้อมูลลูกค้า</h3>
            <form  action="________________________" method="____________">

            <input type="text" placeholder="Enter Customer ID" name="customerID"> 
            <br> <br>
            <input type="text" placeholder="Name" name="name">
            <br> <br>
            <input type="date" placeholder="Birthdate" name="birthdate">
            <br> <br>
            <input type="email" placeholder="Email" name="email">
            <br> <br>     
            <input type="number" placeholder="OutStanding debt" name="outstandingDebt">
            <br> <br> 
            <label>Select a country code</label>
                <select name="countrycode">
                    <?php while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $cc['____________']; ?>">
                            <?php echo $cc['____________']; ?>
                        </option>
                    <?php } ?>
                </select>       
            <br> <br>

            <input type="submit" value="Submit" name="submit" />
            </form>
            </div>
        </div>
    </div>
</body>
</html>



