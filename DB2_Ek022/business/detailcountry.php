<html><head>
    <title> Display Selected Customer Information</title>
</head>
<body>
<?php
        if (isset($_GET["CountryCode"]))
        {
            $strCountryCode = $_GET["CountryCode"];
        }
        echo $strCountryCode;

        require "connect.php";
        $sql ="SELECT * FROM country WHERE CountryCode = ?";
        $params = array($strCountryCode);
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
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
<?php
$conn = null;
?>
</body>
</html>