<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>php-id-projact</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: #FEF5E7;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>Login Area</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <h4>แก้ไขข้อมูลพนักงาน</h4>
                    <?php
                        $le_id = $_REQUEST['le_id'];
                        if(isset($_GET['submit'])){
                            $le_name = $_GET['le_name'];
                            $le_ln = $_GET['le_ln'];
                            $le_tel = $_GET['le_tel'];
                            $le_date = $_GET['le_date'];
                            $sql = "update lecturer1 set ";
                            $sql .= "le_name='$le_name',le_ln='$le_ln',le_tel='$le_tel',le_date='$le_date' ";
                            $sql .="where le_id='$le_id' ";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "แก้ไขข้อมูลพนักงาน $le_name $le_ln เรียบร้อยแล้ว<br>";
                            echo '<a href="lecturer_list.php">แสดงรายชื่อพนักงานทั้งหมด</a>';
                        }else{
                    ?>
                    <?php
                            include 'connectdb.php';
                            $sql2 = "select * from lecturer1 where le_id='$le_id'";
                            $result2 = mysqli_query($conn,$sql2);
                            $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                            $fle_name = $row2['le_name'];
                            $fle_ln = $row2['le_ln'];
                            $fle_tel = $row2['le_tel'];
                            $fle_date = $row2['le_date'];
                            mysqli_free_result($result2);
                            mysqli_close($conn);
                    ?>
                    <form class="form-horizontal" role="form" name="lecturer_edit" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <input type="hidden" name="le_id" id="le_id" value="<?php echo "$le_id";?>">
                        <div class="form-group">
                            <label for="le_name" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="le_name" id="le_name" class="form-control" 
                                       value="<?php echo $fle_name;?>">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="le_ln" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="le_ln" id="le_ln" class="form-control" 
                                       value="<?php echo $fle_ln;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="le_tel" class="col-md-2 col-lg-2 control-label">เบอร์โทร</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="le_tel" id="le_tel" class="form-control"
                                        value="<?php echo $fle_tel;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="le_date" class="col-md-2 col-lg-2 control-label">วันเข้าทำงาน</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="date" name="le_date" id="le_date" class="form-control"
                                value="<?php echo $fle_date;?>">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div> 
                    </form>
                    <?php
                        }
                    ?>
                </div>    
            </div>
            <div class="row">
            <?php include 'name.php';?>
            </div>
        </div>    
    </body>
</html>