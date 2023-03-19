<html> <head>
<title> selectpermissions</title>
</head>
<body>
<?php
require "connect.php";
$sql = "SELECT * FROM permissions"
;
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<table width="800" border="1">
  <tr>
    <th width="90"> <div align="center">P_CID </th>
    <th width="140"> <div align="center">P_Username </th>
    
  </tr>

<?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

  <tr>
    <td>   
    <a href="detailcountry.php?CountryCode=<?php echo $result["CountryCode"]; ?>">       
        <?php echo $result["CountryCode"]; ?>
         
    </td>

    <td>
        <?php echo $result["CountryName"]; ?>
    </td>

   
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