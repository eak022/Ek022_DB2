<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
         <link rel="stylesheet" href="./css/style.css">
        <title>CRUD Customer Information111</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                    <h3>รายชื่อลูกค้า <a href="addFood.php" class="btn btn-info float-end">+เพิ่มข้อมูล</a> </h3>
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead align="center">                        
                            <tr>
                                <th width="10%">รหัสอาหาร</th>
                                <th width="20%">อาหารและเครื่องดื่ม</th>
                                <th width="20%">ราคา</th>
                                <th width="25%">ประเภท</th>
                                <th width="10%">ภาพ</th>
                                <th width="5%">แก้ไข</th>
                                <th width="5%">ลบ</th>
                            </tr>                       
                        </thead>

                        <tbody>
                          <?php
                            require 'connect.php';
                            $sql =  "SELECT * FROM food_drink,menu WHERE food_drink.menu_ID = menu.menu_ID ORDER BY F_D_ID ";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach ($result as $r) { ?>
                            <tr>
                                <td><?= $r['F_D_ID'] ?></td>
                                <td><?= $r['F_Name'] ?></td>
                                <td><?= $r['F_price'] ?></td>
                                <td><?= $r['menu_ID'] ?></td>
                                <td><img src="./image/<?= $r['Image']; ?>" width="50px" height="50" alt="image" onclick="enlargeImg()" id="img1" ></td>
                                <td><a href="updatecustomerForm.php?F_D_ID=<?= $r['F_D_ID'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                <td><a href="deletecustomer.php?F_D_ID=<?= $r['F_D_ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                            </tr>
                          <?php 
                            $conn = null;}
                          ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </body>
</html>