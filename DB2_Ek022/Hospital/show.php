<html> <head>
<title> Udsanee-Display customer</title>
</head>
<body>
<?php
require "connect.php";
$sql = "SELECT P_id,P_name,P_debt,P_UserName
FROM patient,permissions WHERE patient.P_id = permissions.P_CID
and  P_debt BETWEEN 1000 AND 3000";
 
$stmt = $conn->prepare($sql);
$stmt->execute();
?>
 
<table width="800" border="1">
  <tr>
    <th width="90"> <div align="center">รหัสผู้ใช้ </th>
    <th width="140"> <div align="center">ชื่อผู้ใช้ </th>
    <th width="120"> <div align="center">ยอดหนี้ </th>
    <th width="100"> <div align="center">อีเมล์ </th>
  </tr>
 
<?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
 
  <tr>
    <td><?php echo $result["P_id"]; ?></td>
    <td><?php echo $result["P_name"]; ?></td>
    <td><?php echo $result["P_debt"]; ?></td>
    <td><?php echo $result["P_UserName"]; ?></td>
  </tr>
 
<?php
  }
?>
 
</table>
 
<?php
$conn = null;
?>
</body>  
</html>