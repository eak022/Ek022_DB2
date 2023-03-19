<html><head>
        <title> Display Selected Customer Information </title>
    </head>
    <body>
        <?php
        if (isset($_GET["P_id"]))
        {
            $strP_id = $_GET["P_id"];
        }
        echo $strP_id;
        
        require "connect.php";
        $sql ="SELECT * FROM patient,permissions WHERE P_id = ?";
        $params = array($strP_id);
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>

<!-- Detail  -->
    <table width="300" border="1">
  <tr>
    <th width="325">รหัสคนไข้</th>
    <td width="240"><?php echo $result["P_id"]; ?></td>
  </tr>

  <tr>
    <th width="130">ชื่อคนไข้</th>
    <td><?php echo $result["P_name"]; ?></td>
  </tr>

  <tr>
    <th width="130">อีเมล์</th>
    <td><?php echo $result["P_UserName"]; ?></td>
  </tr>
 
  </table>

<?php
$conn = null;
?>
    </body>
</html> 