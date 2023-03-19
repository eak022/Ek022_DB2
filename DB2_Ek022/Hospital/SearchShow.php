<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Hospital</title>
</head>
<body>
<?php
require "connect.php";
if (isset($_GET["P_name"])) 
{
    $strP_name = $_GET["P_name"];
    echo "<br>" . "strP_name = " .$strP_name;
    $sql = "SELECT * FROM patient,permissions where P_name LIKE '%" . $strP_name . "%' AND patient.P_id = permissions.P_CID";
    echo "<br>" . " sql = " .$sql . "<br>";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($result);
}
?>
</br>
    <table width="300" border="3">
  <tr>
    <th width="325">รหัส</th>
    <td width="240"><?php echo $result["P_id"]; ?></td>
  </tr>

  <tr>
    <th width="130">ชื่อผู้ใช้ </th>
    <td><?php echo $result["P_name"]; ?></td>
  </tr>

  <tr>
    <th width="130">ยอดหนี้ </th>
    <td><?php echo $result["P_debt"]; ?></td>
  </tr>

  <tr>
    <th width="130">อีเมล </th>
    <td><?php echo $result["P_UserName"]; ?></td>
  </tr>
  </table>
</body>
</html>

