<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title> patient </title>
    <style type="text/css">
        img {
            transition: transform 0.25s ease;
        }

        img:hover {
            -webkit-transform: scale(1.5);
            /* or some other value */
            transform: scale(1.5);
        }
    </style>


</head>

<body>
    <?php
    require 'connect.php';

    $sql_select = 'select * from tbl_patient WHERE pid';
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();

    if (isset($_POST['submit'])) {
        //if ((isset($_POST['customerID']) && isset($_POST['name'])) != null)
        if (!empty($_POST['pid']) && !empty($_POST['pname']) ) {
            echo '<br>' . $_POST['pid'];

            $uploadFile = $_FILES['pimage']['name'];
            $tmpFile = $_FILES['pimage']['tmp_name'];
            echo " upload file = " . $uploadFile;
            echo " tmp file = " . $tmpFile;

            $sql = "insert into tbl_patient 
							values (:pid, :pname, :pgender, :pimage)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':pid', $_POST['pid']);
            $stmt->bindParam(':pname', $_POST['pname']);
            $stmt->bindParam(':pgender', $_POST['pgender']);
            $stmt->bindParam(':pimage', $uploadFile);
            echo "pimage = " . $uploadFile;


            $fullpath = "./image/" . $uploadFile;
            echo " fullpath = " . $fullpath;
            move_uploaded_file($tmpFile, $fullpath);

            echo '
                <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

            try {
                if ($stmt->execute()) :
                    //$message = 'Successfully add new customer';
                    echo '
                        <script type="text/javascript">        
                        $(document).ready(function(){
                    
                            swal({
                                title: "Success!",
                                text: "Successfuly add customer",
                                type: "success",
                                timer: 2500,
                                showConfirmButton: false
                            }, function(){
                                    window.location.href = "index.php";
                            });
                        });                    
                        </script>
                    ';
                else :
                    $message = 'Fail to add new food';
                endif;
                // echo $message;
            } catch (PDOException $e) {
                 echo 'Fail! ' . $e;
            }
            $conn = null;
        }
    }
    ?>




    <div class="container">
        <div class="row">
            <div class="col-md-4"> <br>
                <h3>ฟอร์มเพิ่มข้อมูล</h3>
                <form action="addp.php" method="POST" enctype="multipart/form-data">
                    <!-- ศึกษาเพิ่มเติมการอัปโหลดไฟล์ https://www.w3schools.com/php/php_file_upload.asp -->
                    <input type="text" placeholder="Enter pid" name="pid" required>
                    <br> <br>
                    <input type="text" placeholder="pname" name="pname" required>
                    <br> <br>
                    <label>Select a country code</label>
                    <select name="pgender">
                        <?php while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $cc['pgender']; ?>">
                                <?php echo $cc['pgender']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <br> <br> 
                    แนบรูปภาพ:
                    <input type="file" name=pimage required>
                    <br><br>
                    <input type="submit" value="Submit" name="submit" />
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
       
    </script>



</body>

</html>