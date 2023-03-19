<?php


if (isset($_GET["CountryName"])) 
{
    $strCountryName = $_GET["CountryName"];

    echo "<br>" . "strCountryName = " .$strCountryName;    

    $sql = "SELECT * FROM country where CountryName  LIKE '%" . $strCountryName . "%'";

    echo "<br>" . " sql = " .$sql . "<br>";


require "connect.php";
$sql = "SELECT * FROM country where CountryName  LIKE '%" . $strCountryName . "%'";
$params = array($strCountryName );
$stmt = $conn->prepare($sql);
$stmt->execute($params);
// $result =$stmt->fetchAll();
// print_r($result);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<table width="300" border="1">
<tr>
<th width="325">รหัสประเทศ</th>
<td><?php echo $result["CountryCode"]; ?></td>
</tr>

<tr>
<th width="130">ชื่อประเทศ</th>
<td><?php echo $result["CountryName"]; ?></td>
</tr>


</table>

