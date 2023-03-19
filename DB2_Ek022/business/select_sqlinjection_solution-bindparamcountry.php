<html >
<head>
    <title>test SQL injection</title>
</head>
<body>
    <h1>test SQL injection</h1>
    <form action="select_sqlinjection_solution-bindparamcountry.php"method="GET">
        <input type="text"placeholder="Enter CountryName" name="CountryName">
        <br><br>
        <input type="submit">
    </form>
</body>
</html>

<?php
if (isset($_GET['CountryName']));
echo "<br>". $_GET['CountryName'];
require 'connect.php';
$count = 0;
$sql = "SELECT * FROM country where CountryName = :CountryName";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':CountryName',$_GET['CountryName']);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

echo "<br>**********<br>";

while ($row = $stmt->fetch()){
    echo $row['CountryName'].''.$row['Name']."<br/>";
    $count++;
}
//echo "count...".$count;
if($count==0)
echo "<br>No data ... <br>";
$conn = null;
?>