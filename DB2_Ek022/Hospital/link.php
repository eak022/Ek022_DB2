<html> <head>
<title> Udsanee-Display customer</title>
</head>
<body>
<?php
require "connect.php";
$sql = "SELECT * FROM patient,permissions WHERE patient.P_id = permissions.P_CID";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>
 
<table width="250" border="1">
  <tr>
    <th width="90"> <div align="center">รหัสคนไข้ </th>
    <th width="140"> <div align="center">ชื่อคนไข้ </th>
    <th width="140"> <div align="center">อีเมล์ </th>
  </tr>
 
<?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
 
  <tr>
    <td><a href="detail_link.php?P_id=<?php echo $result["P_id"];?>">
       <?php echo $result["P_id"]; ?></a></td>

    <td><?php echo $result["P_name"]; ?></td>
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