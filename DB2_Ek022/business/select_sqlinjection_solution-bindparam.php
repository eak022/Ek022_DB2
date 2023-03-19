<html >
<head>
    <title>test SQL injection</title>
</head>
<body>
    <h1>test SQL injection</h1>
    <form action="select_sqlinjection_solution-bindparam.php"method="GET">
        <input type="text"placeholder="Enter Customer ID" name="customerID">
        <br><br>
        <input type="submit">
    </form>
</body>
</html>

<?php
if (isset($_GET['customerID']));
echo "<br>". $_GET['customerID'];
require 'connect.php';
$count = 0;
$sql = "SELECT * FROM customer where CustomerID = :customerID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':customerID',$_GET['customerID']);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

echo "<br>**********<br>";

while ($row = $stmt->fetch()){
    echo $row['CustomerID'].''.$row['Name']."<br/>";
    $count++;
}
//echo "count...".$count;
if($count==0)
echo "<br>No data ... <br>";
$conn = null;
?>